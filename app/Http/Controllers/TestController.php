<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\DrawerWishlist as Wishlist;
use App\Models\City;

class TestController extends Controller
{
    public function index()
    {
        // dd([
        //     'billing_details' => session('billingDetails'),
        //     'basic_details' => session('basicDetail'),
        //     'items' => session('items')
        // ]);
        // $details = [
        //     'title' => 'Mail from Dovtaildrawers.com',
        //     'body' => 'This is for testing email using smtp'
        // ];

        // $data = collect([
        //     'firstName' => 'Archit',
        //     'lastName'  => 'Patel',
        //     'salesLink'  => 'google.com'
        // ]);

        // Mail::to('archi1999patel@gmail.com')->send(new MyTestMail($details, $data));
        // session()->forget('basicDetail');
        // session()->forget('items');
        // session()->forget('billingDetails');
        // $products = DrawerProduct::all();
        // return view('test', compact('products'));

        $data = session('basicDetail');
        dd($data);

        // $basicData = session('basicDetail');
        // $billingDetails = session('billingDetails');
        // $items =  session('items');

        // $pdf = PDF::loadView('pdf.slip', compact('basicData', 'billingDetails', 'items'))->setOptions(['defaultFont' => 'sans-serif']);;
        // $filename =  'bs.pdf';
        // return $pdf->save(public_path() . '/pdf/slip/' . $filename)->stream();

        // $text = 'ignore everything except this (1)';
        // preg_match('#\((.*?)\)#', $text, $val);


        // $number = intval($val[1] ?? 0) + 1;
        // return $number;

        // $name = Wishlist::where('name', 'test')->where('user_id', 1)->latest()->pluck('name')->first();
        // if (!is_null($name)) {
        //     preg_match('#\((.*?)\)#', $name, $val);


        //     $number = intval($val[1] ?? 0) + 1;

        //     return response()->json(
        //         [
        //             'success' => true,
        //             'number' => $number
        //         ]
        //     );

        // $('#__orderForm').submit();
        // }

        // return false;

        return session('billingDetails');
    }
}
