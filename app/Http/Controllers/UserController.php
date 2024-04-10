<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email' => ['required', 'unique:users,user_email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = new User();

        $user->user_email            =   $request->email;
        $user->user_pass             =   Hash::make($request->password);
        $user->user_phone            =   $request->phone;
        $user->user_billing_fname    =   $request->billing_fname;
        $user->user_billing_lname    =   $request->billing_lname;
        $user->user_billing_company  =   $request->billing_company;
        $user->user_billing_po       =   $request->billing_po;
        $user->user_billing_tax      =   $request->billing_tax;
        $user->user_billing_address  =   $request->billing_address;
        $user->user_billing_city     =   $request->billing_city;
        $user->user_billing_postal   =   $request->billing_postal;
        $user->user_billing_email    =   $request->billing_email;
        $user->user_billing_phone    =   $request->billing_phone;

        DB::beginTransaction();
        try {

            $user->save();


            DB::commit();

            return back()->withSuccess('New User has been Created Successfully!');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withErrors('Somthing Unexpected Happened! Please Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'unique:users,user_email,' . $user->user_id . ',user_id']
        ]);

        $user->user_email            =   $request->email;
        $user->user_phone            =   $request->phone;
        $user->user_billing_fname    =   $request->billing_fname;
        $user->user_billing_lname    =   $request->billing_lname;
        $user->user_billing_company  =   $request->billing_company;
        $user->user_billing_po       =   $request->billing_po;
        $user->user_billing_tax      =   $request->billing_tax;
        $user->user_billing_address  =   $request->billing_address;
        $user->user_billing_city     =   $request->billing_city;
        $user->user_billing_postal   =   $request->billing_postal;
        $user->user_billing_email    =   $request->billing_email;
        $user->user_billing_phone    =   $request->billing_phone;

        try {

            $user->update();

            return redirect()->back()->withSuccess('User has been updated');
        } catch (\Exception $error) {
            return back()->withErrors('Somthing Unexpected Happened! please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->withSuccess('User has been removed');
    }
}
