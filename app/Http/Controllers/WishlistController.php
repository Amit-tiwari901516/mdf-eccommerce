<?php

namespace App\Http\Controllers;

use App\Models\DrawerWishlist as Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function removeItem(Request $request)
    {
        if (is_null($request->wishlist)) {
            return back()->withErrors('Something Went Wrong! Please Try Again');
        }

        if (count($request->wishlist) == 0) {
            return back()->withError('Nothing Selected to remove');
        }

        $ids = $request->wishlist;
        try {
            Wishlist::whereIn('id', $ids)->delete();
            return back()->withSuccess('Wishlist Removed Successfully!');
        } catch (\Exception $th) {
            return back()->withErrors('Something Went Wrong! Please Try Again');
        }
    }

    public function continueOrder($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        session($wishlist->data);
        // return session('additionalNote');
        // return session('summaryBillingDetails');

        return redirect('cart');
    }
}
