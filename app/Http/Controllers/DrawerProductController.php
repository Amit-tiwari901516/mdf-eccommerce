<?php

namespace App\Http\Controllers;

use App\Models\DrawerProduct;
use App\Models\ProductImage;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class DrawerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DrawerProduct::all();

        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'code'  => ['required', 'unique:drawer_products,code'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png']
        ]);

        $image = null;
        // save image
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/product'), $filename);
            $image = 'public/images/product/' . $filename;
        }

        $product =  new DrawerProduct();

        $product->name =  $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->description = $request->description;
        $product->image = $image;

        DB::beginTransaction();

        try {

            $product->save();

            DB::commit();

            return back()->withSuccess('New Product Added Successfully!');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withErrors('Somthing Unexpected Happened! Please Try Again');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(DrawerProduct $product)
    {

        return view('admin.products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(DrawerProduct $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrawerProduct $product)
    {

        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'code'  => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg']
        ]);

        $image = null;
        // save image
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/product'), $filename);
            $image = 'public/images/product/' . $filename;
        } else {
            $image = $product->image;
        }

        $old_image = public_path() . $product->image;
        if (file_exists($old_image)) {
            unlink($old_image);
        }

        $product->name = $request->name;
        $product->price =  $request->price;
        $product->code = $request->code;
        $product->type = $request->type;
        $product->description =  $request->description;
        $product->image = $image;

        try {

            $product->update();

            return back()->withSuccess('Product Updated Successfully!');
        } catch (\Exception $e) {
            return $e;
            return back()->withErrors('Somthing Unexpected Happened! Please Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrawerProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrawerProduct $product)
    {

        $old_image = public_path() . 'public' . $product->image;
        if (file_exists($old_image)) {
            unlink($old_image);
        }
        try {
            foreach ($product->orders as $order) {
                $order->delete();
            }
            $product->delete();

            return back()->withSuccess('Product Removed Successfully!');
        } catch (\Exception $error) {
            return dd($error);

            return back()->withErrors('Something Unexpected Happened! Please try again');
        }
    }

    /**
     * Increase Price
     */
    public function increasePrice(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'price' => 'required'
        ]);



        try {

            foreach ($request->id as $id) {
                $product = DrawerProduct::find($id);
                $price = $product->price + ($product->price * $request->price) / 100;
                $product->update(['price' => $price]);
            }
            return back()->withSuccess('Price updated Successfully!');
        } catch (\Exception $error) {
            return back()->withErrors('Something Unexpected Happened! Please try again ');
        }
    }
}
