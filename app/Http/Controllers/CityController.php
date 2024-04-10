<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Imports\CityImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(10);
        return view('admin.cities.list', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => ['required'],
            'courier' => ['required'],
            'min' => ['required'],
            'zero' => ['required'],
            'five_hundred' => ['required'],
            'one_thousend' => ['required'],
            'two_thousend' => ['required'],
            'five_thousend' => ['required'],
            'ten_thousend' => ['required'],

        ]);

        try {
            City::create([
                'city' => $request->city,
                'courier' => $request->courier,
                'min' => $request->min,
                'zero' =>  $request->zero,
                '500' => $request->five_hundred,
                '1000' => $request->one_thousend,
                '2000' => $request->two_thousend,
                '5000' => $request->five_thousend,
                '10000' => $request->ten_thousend,

            ]);

            return back()->withSuccess('New City is added Successfully');
        } catch (\Exception $th) {
            return back()->withErrors('Something went wrong! please try again');
        }
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        try {
            City::whereId($id)->update([
                'city' => $request->city,
                'courier' => $request->courier,
                'min' => $request->min,
                'zero' =>  $request->zero,
                'five_hundred' => $request->five_hundred,
                'one_thousend' => $request->one_thousend,
                'two_thousend' => $request->two_thousend,
                'five_thousend' => $request->five_thousend,
                'ten_thousend' => $request->ten_thousend,
            ]);

            return back()->withSuccess('Details are updated Successfully');
        } catch (\Exception $th) {
            return back()->withErrors('Something went wrong! please try again');
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            City::whereId($id)->delete();
            return back()->withSuccess('Details are updated Successfully');
        } catch (\Exception $th) {
            return back()->withErrors('Something went wrong! please try again');
        }
    }

    // import data from excel file
    public function import(Request $request)
    {

        $request->validate([
            'file' => ['mimes:xls,csv,xlsx', 'required']
        ]);

        try {
            City::query()->truncate();
            Excel::import(new CityImport, $request->file);

            Storage::deleteDirectory('import/');
            return back()->withSuccess('Data Imported Successfully!');
        } catch (\Exception $error) {
            return back()->withErrors('Something Unexpected Happned! Please Try Again');
        }
    }
}
