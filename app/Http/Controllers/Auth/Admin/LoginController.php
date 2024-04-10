<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authentication(Request $request)
    {

        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        if ($admin = Admin::where('email', $request->email)->first()) {

            if (Hash::check($request->password, $admin->password)) {

                Auth::guard('admin')->login($admin, is_null($request->remember_me) ? false : true);

                return redirect('/dashboard')->withSuccess('Account Authenticated Successfully!');
            } else {
                return back()->withErrors('Password is Incorrect!');
            }
        } else {
            return back()->withErrors('Account not found!');
        }
    }
}
