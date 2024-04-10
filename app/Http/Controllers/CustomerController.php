<?php

namespace App\Http\Controllers;

use Svg\Tag\Rect;
use App\Models\User;
use App\Models\DrawerOrder;
use App\Models\DrawerPayment;
use App\Models\DrawerWishlist as Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $orders =  DrawerOrder::with('items', 'items.product')->where('user_id', auth()->id())->get();
        $payments = DrawerPayment::where('user_id', auth()->id())->get();
        $user = User::findOrFail(auth()->id());
        $wishlists = Wishlist::where('user_id', auth()->id())->get();
        $totalWishlists = $wishlists->count();
        return view('account', compact('orders', 'payments', 'user', 'wishlists', 'totalWishlists'));
    }

    public function billingDetailsUpdate(Request $request)
    {
        $data = [
            'user_billing_fname' => $request->first_name,
            'user_billing_lname' => $request->last_name,
            'user_billing_company' => $request->company,
            'user_billing_po' => $request->po,
            'user_billing_tax' => $request->tax,
            'user_billing_address' => $request->address,
            'user_billing_city' => $request->city,
            'user_billing_postal' => $request->postal_code,
            'user_billing_phone' => $request->phone,
            'user_billing_email' => $request->email,
            'user_billing_country' => $request->country,
        ];

        try {

            User::find(auth()->id())->update($data);

            return back()->withSuccess('Your Details are updated');
        } catch (\Exception $th) {
            return back()->withErrors('Something Went Wrong! PLease Try Again!');
        }
    }

    public function basicDetailsUpdate(Request $request)
    {
        $request->validate([
            'password' => ['confirmed'],
        ]);

        $user = User::find(auth()->id());
        $user->user_name = $request->user_name;
        $user->user_phone = $request->user_phone;

        if (!empty($request->old_password)) {
            if (!Hash::check($request->old_password, auth()->user()->user_pass)) {
                return back()->withErrors('Incorrect Old Password!');
            }
            $user->user_pass = Hash::make($request->password);
        }

        try {
            $user->update();

            return back()->withSuccess('Your Details has been Updated!');
        } catch (Exception $th) {
            return back()->withErrors('Something Went Wrong! Please try again!');
        }
    }
}
