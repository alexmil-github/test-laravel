<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginApiController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where([
            'email' => $request->email,
        ])->first();


        if($user && Hash::check($request->password, $user->password)){
            $user->remember_token = Str::random(16);
            $user->save();

            return [
                'token' => $user->remember_token
            ];
        }

        return [
          'errors' => 'Email or password incorrect'
        ];


    }

    public function logout()
    {

        $user = Auth::user();
        $user->remember_token = null;
        $user->save();

        return [
            'message' => 'logout'
        ];
    }
}
