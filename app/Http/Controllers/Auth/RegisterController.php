<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        if (auth()->user()) {
            return redirect('account');
        }

        return view('register');
    }

    public function registeration(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'integer'],
            'email' => ['required', 'email', 'unique:users,user_email'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        try {

            $user = new User();

            $user->user_billing_fname = $request->first_name;
            $user->user_billing_lname = $request->last_name;
            $user->user_phone = $request->phone;
            $user->user_email = $request->email;
            // $user->user_pass  = Hash::make($request->password);
            $user->user_pass  = md5($request->password);

            $user->save();

            return $this->authentication($user);
        } catch (\Exception $error) {
            return dd($error);
            return back()->withErrors('Something Unexpected Happened! Please Try Again.');
        }
    }

    public function authentication($user)
    {
        if ($user = User::where('user_email', $user->user_email)->first()) {

            if ($user->user_pass == $user->user_pass) {

                Auth::login($user);

                return redirect('/account')->withSuccess('Account Authenticated Successfully!');
            }
        } else {
            return back()->withErrors('Account not found!');
        }
    }
}
