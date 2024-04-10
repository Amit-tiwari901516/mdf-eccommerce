<?php

namespace App\Http\Controllers;

use App\Models\BulkPrice;
use Illuminate\Http\Request;
use App\Imports\PricesImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class BulkPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prices = BulkPrice::paginate(10);
        return view('admin.prices.list', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = new BulkPrice();
        $price->specie = $request->specie;
        $price->thickness = $request->thickness;
        $price->width = $request->width;
        $price->height = $request->height;
        $price->depth = $request->depth;
        $price->price = $request->price;
        $price->save();

        return back()->withSuccess('Data Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  BulkPrice::findOrFail($id);
        return view('admin.prices.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        BulkPrice::whereId($id)->update([
            'specie' => $request->specie,
            'thickness' => $request->thickness,
            'width' => $request->width,
            'height' => $request->height,
            'depth' => $request->depth,
            'price' => $request->price
        ]);;


        return back()->withSuccess('Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = BulkPrice::findOrFail($id);
        $price->delete();

        return back()->withSuccess('Data Deleted Successfully!');
    }

    public function show($id)
    {
    }

    // import data from excel file
    public function importPrices(Request $request)
    {

        $request->validate([
            'file' => ['mimes:xls,csv,xlsx', 'required']
        ]);

        try {
            BulkPrice::query()->truncate();
            Excel::import(new PricesImport, $request->file);

            Storage::deleteDirectory('import/');
            return back()->withSuccess('Data Imported Successfully!');
        } catch (\Exception $error) {
            return back()->withErrors('Something Unexpected Happned! Please Try Again');
        }
    }
}
