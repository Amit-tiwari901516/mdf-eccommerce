<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\BulkPrice;
use App\Models\SelectOption;
use Illuminate\Http\Request;
use App\Models\DrawerProduct;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\DrawerWishlist as Wishlist;
use App\Models\User;
use Illuminate\Support\Str;

class DrawerOrderController extends Controller
{

    public function summary()
    {
        $cities = City::distinct()->get(['city']);
        $basicData = session('basicDetail');
        $billingDetails = session('billingDetails');
        $summaryBillingDetails = session('summaryBillingDetails');
        $items = (is_null(session('items')) ? [] : session('items'));
        $comman_options_total = $basicData['bottom_thickness_grain_direction_price'] + $basicData['back_notch_drill_undermount_slide_price'] + $basicData['front_notch_undermount_slide_price'] + $basicData['bracket_price'];

        // return $summaryBillingDetails;
        return view('summary', compact('basicData', 'items', 'billingDetails', 'comman_options_total', 'cities', 'summaryBillingDetails'));
    }

    public function cart()
    {
        $cities = City::distinct()->get(['city']);
        $basicData = session('basicDetail');
        $additionalNote = session('additionalNote');
        $items = (is_null(session('items')) ? [] : session('items'));
        // return $items;

        $comman_options_total = $basicData['bottom_thickness_grain_direction_price'] + $basicData['back_notch_drill_undermount_slide_price'] + $basicData['front_notch_undermount_slide_price'] + $basicData['bracket_price'];

        if (!is_null($items) & count($items) > 0) {
            $total_items =   array_sum(array_map(function ($order) {
                return $order['quantity'];
            }, $items));

            $price = array_sum(array_map(function ($order) use ($comman_options_total) {
                return round($order['price'] * $order['quantity'], 2) + $order['product_price'] + $comman_options_total;
            }, $items));
        } else {
            $total_items = [];

            $price = null;
        }


        return view('cart', compact('basicData', 'items', 'total_items', 'price', 'cities', 'comman_options_total', 'additionalNote'));
    }


    public function placeOrder(Request $request)
    {

        // return $request;
        $request->validate([
            'unit' => ['required'],
            'bottom_thickness_grain_direction' => ['required'],
            'back_notch_drill_undermount_slide' => ['required'],
            'front_notch_undermount_slide' => ['required'],
            'logo_branded' => ['required'],
            'bracket' => ['required'],
            'product' => ['required'],
            'height' => ['required'],
            'width' => ['required'],
            'depth' => ['required'],
        ]);


        $data = $this->createOrderSesion($request);
        $path = '/cart';
        if (!empty($request->wishlist_name)) {
            Wishlist::create([
                'user_id' => auth()->id(),
                'name' => $request->wishlist_name,
                'data' => $data
            ]);

            $path = '/';
        } else {
            session($data);
        }


        return redirect($path);
    }


    public function placeOrderEdit()
    {

        $basicDetail = session('basicDetail');
        $items = session('items');
        $products = DrawerProduct::all();
        $bottomThickness  = SelectOption::where('for', 0)->get();
        $backNotch  = SelectOption::where('for', 1)->get();
        $frontNotch  = SelectOption::where('for', 2)->get();
        $bracket  = SelectOption::where('for', 3)->get();

        return view('orderedit', compact('basicDetail', 'items', 'products', 'bracket', 'frontNotch', 'backNotch', 'bottomThickness'));
    }

    public function placeOrderUpdate(Request $request)
    {

        $path = '/cart';

        $data = $this->createOrderSesion($request);
        if (!empty($request->wishlist_name)) {
            Wishlist::create([
                'user_id' => auth()->id(),
                'name' => $request->wishlist_name,
                'data' => $data
            ]);

            session()->forget('basicDetail');
            session()->forget('items');
            session()->forget('billingDetails');
            session()->forget('additional_note');
            session()->forget('summaryBillingDetails');

            $path = '/';
        } else {
            session($data);
        }


        return redirect($path)->withSuccess('Order Updated Successfully!');
    }


    public function createOrderSesion($request)
    {

        $logoFilePath = '';
        // save logo image
        if ($request->hasfile('brand_logo')) {
            $file = $request->brand_logo;
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/logos'), $filename);
            $logoFilePath = 'public/images/logos/' . $filename;
        }

        $item = [];

        // Create Order
        foreach ($request['product'] as $key => $value) {
            $logoDesignPath = '';
            $width = $request['width'][$key] +  $request['width_in'][$key];
            $height =  $request['height'][$key] +  $request['height_in'][$key];
            $depth =  $request['depth'][$key] +  $request['depth_in'][$key];

            if ($request->unit == 'mm') {
                $width = round($request['width'][$key] * 0.03937008, 2);
                $height =  round($request['height'][$key] * 0.03937008, 2);
                $depth =  round($request['depth'][$key] * 0.03937008, 2);
            }


            $data = BulkPrice::select(['width', 'height', 'depth', 'price'])->distinct()->get()->toArray();

            $filtered = array_filter($data, function ($x) use ($height) {
                return $x['height'] >= $height;
            });

            $filtered = array_filter($data, function ($x) use ($width) {
                return $x['width'] >= $width;
            });


            $filtered = array_filter($data, function ($x) use ($depth) {
                return $x['depth'] >= $depth;
            });

            try {
                $price = (float)head($filtered)['price'];
            } catch (\Throwable $th) {
                $price = 0;
            }

            // save design
            if (is_array($request['design']) > 0) {
                $file = $request['design'][$key] ?? null;
                if (!is_null($file)) {
                    $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/design'), $filename);
                    $logoDesignPath = 'public/images/design/' . $filename;
                }
            }

            $product = DrawerProduct::where('id', $request['product'][$key])->select('image', 'price', 'name', 'code')->first();

            $item[] = [
                'id' => $request['id'][$key],
                'drawer_product_id' => $request['product'][$key],
                'product_image' => $product->image,
                'product_name' => $product->name,
                'product_code' => $product->code,
                'width' => $width,
                'height' => $height,
                'depth' => $depth,
                'note' => (is_array($request['note']) > 0) ? $request['note'][$key] : '',
                'price' => $price,
                'product_price' => $product->price,
                'design' => $logoDesignPath,
                'quantity' => $request['quantity'][$key],
                'additional_width' => $request->additional_width,
                'additional_height' => $request->additional_width,
                'additional_depth' => $request->additional_depth,
            ];
        }
        $logo_branded_code = '';
        if (Str::contains($request->logo_branded, 'ESX')) {
            $logo_branded_code = 'ESX';
        } else if (Str::contains($request->logo_branded, 'ESI')) {
            $logo_branded_code = 'ESI';
        } else {
            $logo_branded_code = 'None';
        };


        // storing data into session
        $basicData = [
            'unit' => $request->unit,
            'bottom_thickness_grain_direction_id' => $request->bottom_thickness_grain_direction,
            'bottom_thickness_grain_direction_option' => $this->getSelectedOptionsValues($request->bottom_thickness_grain_direction, 'option'),
            'bottom_thickness_grain_direction_price' => $this->getSelectedOptionsValues($request->bottom_thickness_grain_direction, 'price'),
            'bottom_thickness_grain_direction_code' => $this->getSelectedOptionsValues($request->bottom_thickness_grain_direction, 'code'),
            'back_notch_drill_undermount_slide_id' => $request->back_notch_drill_undermount_slide,
            'back_notch_drill_undermount_slide_option' => $this->getSelectedOptionsValues($request->back_notch_drill_undermount_slide, 'option'),
            'back_notch_drill_undermount_slide_price' => $this->getSelectedOptionsValues($request->back_notch_drill_undermount_slide, 'price'),
            'back_notch_drill_undermount_slide_code' => $this->getSelectedOptionsValues($request->back_notch_drill_undermount_slide, 'code'),
            'front_notch_undermount_slide_id' => $request->front_notch_undermount_slide,
            'front_notch_undermount_slide_option' => $this->getSelectedOptionsValues($request->front_notch_undermount_slide, 'option'),
            'front_notch_undermount_slide_price' => $this->getSelectedOptionsValues($request->front_notch_undermount_slide, 'price'),
            'front_notch_undermount_slide_code' => $this->getSelectedOptionsValues($request->front_notch_undermount_slide, 'code'),
            'bracket_id' => $request->bracket,
            'bracket_option' => $this->getSelectedOptionsValues($request->bracket, 'option'),
            'bracket_price' => $this->getSelectedOptionsValues($request->bracket, 'price'),
            'bracket_code' => $this->getSelectedOptionsValues($request->bracket, 'code'),

            'logo_branded' => $request->logo_branded,
            'logo_branded_code' => $logo_branded_code,
            'brand_logo' => $logoFilePath
        ];

        return ['basicDetail' => $basicData, 'items' => $item];
    }

    public function checkoutForm()
    {
        if (is_null(session('basicDetail'))) {
            return redirect('/cart');
        }

        $user = auth()->user();
        $billingDetails = session('billingDetails');


        return view('checkout', compact(['user', 'billingDetails']));
    }

    public function checkout(Request $request)
    {
        // return session('billingDetails')['city'];
        // if (!session('billingDetails')) {
        // }

        if (!session('billingDetails')) {
            $data = [
                'city' => $request->city,
                'additional_note' => $request->additional_note,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'total_cubic_measurement' => $request->total_cubic_measurement,
                'total_weight_kg' => $request->total_weight_kg,
                'total_weight_lbs' => $request->total_weight_lbs,
                'comman_options_total' => $request->comman_options_total,
                'subtotal' => $request->subtotal,
                'taxes' => $request->taxes,
                'cart_total' => $request->cart_total,
                'delivery_fee' => $request->delivery_fee,
                'courier' => $request->courier,
            ];

            session(['billingDetails' => $data]);
            $old_data = session('billingDetails');
            $new_data = array_merge($old_data, $data);
            session(['billingDetails' => $new_data]);
        } else {
            $data = [
                'city' => session('billingDetails')['city'],
                'additional_note' => $request->additional_note,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'total_cubic_measurement' => $request->total_cubic_measurement,
                'total_weight_kg' => $request->total_weight_kg,
                'total_weight_lbs' => $request->total_weight_lbs,
                'comman_options_total' => $request->comman_options_total,
                'subtotal' => session('billingDetails')['subtotal'],
                'taxes' => session('billingDetails')['taxes'],
                'cart_total' => session('billingDetails')['cart_total'],
                'delivery_fee' => session('billingDetails')['delivery_fee'],
                'courier' => session('billingDetails')['courier'],
            ];

            session(['billingDetails' => $data]);
            $old_data = session('billingDetails');
            $new_data = array_merge($old_data, $data);
            session(['billingDetails' => $new_data]);
        }

        session(['additional_note' => $request->additional_note]);

        return redirect('/checkout');
    }

    public function payment(Request $request)
    {
        // return $request;
        $user = auth()->user();
        // return $user;

        $request->validate([
            'reference_number' => ['required'],
            'billing_company' => ['required'],
            'billing_first_name' => ['required'],
            'billing_last_name' => ['required'],
            'billing_phone' => ['required'],
            'billing_email' => ['required'],
            'billing_address' => ['required'],
            'billing_city' => ['required'],
            'billing_postal_code' => ['required'],
            'billing_country' => ['required'],
            'shipping_first_name' => ['required'],
            'shipping_last_name' => ['required'],
            'shipping_email' => ['required'],
            'shipping_phone' => ['required'],
            'shipping_address' => ['required'],
            'shipping_city' => ['required'],
            'shipping_postal_code' => ['required'],
        ]);

        $user->user_billing_company = $request->billing_company;
        $user->user_billing_fname = $request->billing_first_name;
        $user->user_billing_lname = $request->billing_last_name;
        $user->user_billing_phone = $request->billing_phone;
        $user->user_billing_email = $request->billing_email;
        $user->user_billing_address = $request->billing_address;
        $user->user_billing_city = $request->billing_city;
        $user->user_billing_postal = $request->billing_postal_code;
        $user->user_billing_country = $request->billing_country;
        $user->save();

        $data = [
            'reference_number' => $request->reference_number,
            'shipping_first_name' => $request->shipping_first_name,
            'shipping_last_name' => $request->shipping_last_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_postal_code' => $request->shipping_postal_code,
            'shipping_country' => $request->shipping_country,
            'billing_first_name' => $request->billing_first_name,
            'billing_last_name' => $request->billing_last_name,
            'billing_email' => $request->billing_email,
            'billing_phone' => $request->billing_phone,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_postal_code' => $request->billing_postal_code,
            'billing_country' => $request->billing_country,
        ];
        // return $data;
        if (!session('summaryBillingDetails')) {

            $summary = [
                'city' => '',
                'subtotal' => '', //
                'taxes' => '',
                'cart_total' => '',
                'delivery_fee' => '',
                'courier' => '',
            ];
            session(['summaryBillingDetails' => $summary]);
        }

        // return session('summaryBillingDetails');
        $old_data = session('billingDetails');
        if ($old_data) {

            $new_data = array_merge($old_data, $data);
            session(['billingDetails' => $new_data]);
        } else {
            session(['billingDetails' => $data]);
        }

        $billingDetails = session('billingDetails');

        return redirect('/summary');
    }

    public function getSelectedOptionsValues($id, $value)
    {
        if ($value == 'price') {

            return SelectOption::find($id)->$value ?? 0;
        }
        return SelectOption::find($id)->$value ??  $id;
    }

    public function removeItem($id)
    {
        $items = session()->pull('items', []); // Second argument is a default value

        $items  = array_filter($items, function ($item) use ($id) {
            if ($item['id'] == $id) {
                unset($item);
                return;
            }
            return $item;
        });



        session()->put('items', $items);
        return back()->withSuccess('Item Has been removed from the cart');
    }

    // calculate delivery fee
    public function deliveryFee(Request $request)
    {
        // session('summaryBillingDetails')['cart_total'] = '';
        $data = [
            'cart_total' => null,
        ];
        $old_data = session('summaryBillingDetails');
        $new_data = array_merge($old_data, $data);
        session(['summaryBillingDetails' => $new_data]);

        // $sessionEncode = json_encode(session('billingDetails'));
        // $sessionDecode = json_decode($sessionEncode, true);
        $city = $request->city;
        // $weight = $sessionDecode['total_weight_lbs'];
        $weight = session('billingDetails')['total_weight_lbs'];
        $air_factor  = $weight * 2.452256944;
        $couriers = City::where('city', $city)->get();
        $bourassa_price = 0;
        $bourret_price = 0;

        foreach ($couriers as $courier) {

            $minimum = $courier->min;
            $step = $courier->zero * $air_factor / 100;
            $next_step = 0;

            if (500 >= $air_factor) {
                $next_step = $courier['500'] * 500 / 100;
            }
            if (1000 >= $air_factor && 500 <= $air_factor) {
                $next_step = $courier['1000'] * 1000 / 100;
            }
            if (2000 >= $air_factor && 1000 <= $air_factor) {
                $next_step = $courier['2000'] * 2000 / 100;
            }
            if (5000 >= $air_factor && 2000 <= $air_factor) {
                $next_step = $courier['5000'] * 5000 / 100;
            }
            if (10000 >= $air_factor && 5000 <= $air_factor) {
                $next_step = $courier['10000'] * 10000 / 100;
            }


            if ($courier->courier == 'BOURASSA') {
                $bourassa_price = $next_step + $next_step * 17.60 / 100;
            }
            $bourret_price =  $next_step + $next_step * 17.90 / 100;
        }

        $best_price = min($bourassa_price, $bourret_price);

        $price = $request->price;
        $delivery_fee = round($best_price, 2);
        $subtotal = $price + $delivery_fee;
        $taxes = $subtotal * 13 / 100;
        $cart_total = $subtotal + $taxes;
        $courier = 'BOURRET';

        if ($best_price == $bourassa_price) {
            $courier = 'BOURASSA';
        }

        $data = [
            'deliveryFee' => $delivery_fee,
            'subtotal' => round($subtotal, 2),
            'taxes' => round($taxes, 2),
            'cartTotal' => round($cart_total, 2),
            'courier' => $courier
        ];

        return json_encode($data);
    }

    public function backCart(Request $request)
    {
        return 1;
    }
}
