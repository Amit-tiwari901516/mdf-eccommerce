<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function update(Request $request)
    {
        Custom::whereId(1)->update(
            [
                // 'code' => $request->code,
                'online_sequence_code' => $request->online_sequence_code,
                'sales_order_code' => $request->sales_order_code,
                'purchase_order_code' => $request->purchase_order_code,
                'packing_slip_code' => $request->packing_slip_code,
                'markup_price' => $request->markup_price
            ]
        );
        return back()->withSuccess('Data Updated Succesfully');
    }
}
