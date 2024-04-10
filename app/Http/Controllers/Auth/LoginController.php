<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login()
    {
        if (auth()->user()) {
            return redirect('account');
        }

        return view('login');
    }

    public function authentication(Request $request)
    {

        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        if ($user = User::where('user_email', $request->email)->first()) {

            // if (Hash::check($request->password, $user->user_pass)) {
            if ($user->user_pass === md5($request->password)) {

                Auth::login($user, is_null($request->remember_me) ? false : true);

                return redirect('/account')->withSuccess('Account Authenticated Successfully!');
            } else {
                return back()->withErrors('Password is Incorrect!');
            }
        } else {
            return back()->withErrors('Account not found!');
        }
    }
}
