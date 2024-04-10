<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('forgetpassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,user_email']
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetpassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('resetpassword', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $verify_email = DB::table('password_resets')
            ->where([
                'token' => $request->token
            ])
            ->first();

        if (!$verify_email) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        // $user = User::where('user_email', $verify_email->email)
        //     ->update(['user_pass' => Hash::make($request->password)]);
        $user = User::where('user_email', $verify_email->email)
            ->update(['user_pass' => md5($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}