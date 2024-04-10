<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Models\Item;
use App\Models\DrawerOrder;
use App\Models\DrawerPayment;
use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller\CreateTransactionController;
use Illuminate\Support\Facades\DB;

class PaymentLogController extends Controller
{
    // start page form after start
    public function pay(Request $request)
    {
        // return $request;
        $request->validate([
            'city' => ['required']
        ]);
        $data = [
            'city' => $request->city,
            'subtotal' => $request->subtotal,
            'taxes' => $request->taxes,
            'cart_total' => $request->cart_total,
            'delivery_fee' => $request->delivery_fee,
            'courier' => $request->courier,
        ];
        $old_data = session('billingDetails');
        $new_data = array_merge($old_data, $data);
        session(['billingDetails' => $new_data]);
        // return session('billingDetails');

        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        if (is_null(session('basicDetail')) && is_null(session('billingDetails'))) {
            return redirect('/cart');
        }

        return view('pay', compact('months'));
    }

    public function handleonlinepay(Request $request)
    {
        $input = $request->input();
        $data = [
            'card_ending' => substr($request->cardNumber, -4),
        ];
        $old_data = session('billingDetails');
        $new_data = array_merge($old_data, $data);
        session(['billingDetails' => $new_data]);

        /* Create a merchantAuthenticationType object with authentication details
        retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();

        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['expiration-year'] . "-" . $input['expiration-month']);
        $creditCard->setCardCode($input['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $message_text = $tresponse->getMessages()[0]->getDescription() . ", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success_msg";

                    $order_id = str_pad(date('dmyhsi') + 1, 8, "0", STR_PAD_LEFT);


                    DrawerPayment::create([
                        'user_id' => auth()->id(),
                        'order_id' => $order_id,
                        'amount' => $input['amount'],
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'message' => $tresponse->getMessages()[0]->getDescription(),
                        'name_on_card' => trim($input['owner']),
                        'quantity' => session('billingDetails')['quantity'],
                        'address' => $input['address'],
                        'city' => $input['city'],
                        'postal_code' => $input['postal_code'],
                        'country' => $input['country'],
                        'state' => $input['state'],
                    ]);
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";

                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $message_text = 'There were some issue with the payment. Please try again later.';
                $msg_type = "error_msg";

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    $msg_type = "error_msg";
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error_msg";
                }
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error_msg";
        }

        if ($msg_type == 'error_msg') {
            return back()->withErrors($message_text);
        }


        // Create Order
        $this->createOrder($input['amount'], $order_id);

        // remove order if exists in wishlist
        // $this->removeOrderFromWishlist();

        // Flush All Session Data
        $request->session()->forget('basicDetail');
        $request->session()->forget('items');
        $request->session()->forget('billingDetails');
        session()->forget('additional_note');
        session()->forget('summaryBillingDetails');

        $storage = true;

        $order = DrawerOrder::where('order_id', $order_id)->first();
        $user = Auth::user();
        $name = $user->user_billing_fname . ' ' . $user->user_billing_lname;
        $email = $user->user_email;
        $company = $user->user_billing_company;
        $po = $user->user_billing_po;
        $data = [
            'name'      => $name,
            'company'      => $company,
            'po'      => $po,
            'order_id'      => $order_id,
            'subject'   => 'Sales Order',
            'date' => $order->created_at,
            'email'     => $email,
            'pdf_path'     => url('/') . '/' . $order->sales_invoice,
        ];

        Mail::send('email.customerEmail', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject($data['subject']);
        });

        $data1 = [
            'subject'   => 'Purchase Order',
            'title'     => 'Purchase Order',
            'body'      => $name . 'order placed successfully',
            'email'     => 'desciple2000@gmail.com',
            // 'email'     => 'faisalnafees739@gmail.com',
            'sales_pdf_path'     => url('/') . '/' . $order->sales_invoice,
            'purchase_pdf_path'     => url('/') . '/' . $order->invoice,
        ];

        Mail::send('email.adminEmail', $data1, function ($message) use ($data1) {
            $message->to($data1['email'], $data1['body'])->subject($data1['subject']);
        });

        return redirect('/')->withSuccess('Order Placed Successfully!')->with('storage', $storage);
    }

    public function createOrder($total, $order_id)
    {
        $data = [
            'basicDetail' => session('basicDetail'),
            'items' => session('items'),
            'billingDetails' => session('billingDetails')
        ];

        $orderData = [
            'order_id' => $order_id,
            'user_id' => auth()->id(),
            'unit' => session()->get('basicDetail.unit'),
            'bottom_thickness_grain_direction' => session()->get('basicDetail.bottom_thickness_grain_direction_option'),
            'back_notch_drill_undermount_slide' =>  session()->get('basicDetail.back_notch_drill_undermount_slide_option'),
            'front_notch_undermount_slide' => session()->get('basicDetail.front_notch_undermount_slide_option'),
            'bracket' => session()->get('basicDetail.bracket_option'),
            'logo_branded' => session()->get('basicDetail.logo_branded'),
            'brand_logo' => session()->get('basicDetail.brand_logo'),
            'status' => 2,
            'invoice' => PdfController::createPurchaseInvoice($order_id),
            'sales_invoice' => PdfController::createSalesInvoice($order_id),
            'slip' => PdfController::createSlip($order_id),
            'total' => $total,
            'shipping_first_name' => session('billingDetails')['shipping_first_name'],
            'shipping_last_name' => session('billingDetails')['shipping_last_name'],
            'shipping_email' => session('billingDetails')['shipping_email'],
            'shipping_phone' => session('billingDetails')['shipping_phone'],
            'shipping_city' => session('billingDetails')['shipping_city'],
            'shipping_country'  => session('billingDetails')['shipping_country'] ?? null,
            'shipping_postal_code'  => session('billingDetails')['shipping_postal_code'],
            'shipping_address'  => session('billingDetails')['shipping_address'],
            'reference_no' => session('billingDetails')['reference_number'],
            'data' => $data
        ];


        $order =  DrawerOrder::create($orderData);

        foreach (session('items') as $item) {

            Item::create([
                'drawer_order_id' => $order->id,
                'drawer_product_id' => $item['drawer_product_id'],
                'height' => $item['height'],
                'height_in' => $item['additional_height'],
                'width' => $item['width'],
                'width_in' => $item['additional_width'],
                'depth' => $item['depth'],
                'depth_in' => $item['additional_depth'],
                'price' => $item['price'],
                'note' => $item['note'],
                'design' => $item['design'],
                'quantity' => $item['quantity'],
            ]);
        }
    }
}
