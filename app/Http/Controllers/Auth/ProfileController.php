<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.profile');
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed']
        ]);

        $hash_password = Hash::make($request->password);
        // $hash_password = md5($request->password);
        $user->user_pass = $hash_password;

        try {
            $user->update();

            return back()->withSuccess('Password Changed Successfully');
        } catch (Exception $th) {
            return back()->withErrors('Something Unexpected Happend! please try again');
        }
    }
}
