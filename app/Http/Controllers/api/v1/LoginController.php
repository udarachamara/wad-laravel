<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(AuthRequest $request){
        
        $login = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(!Auth::attempt($login)){
            return response(['message' => 'Invalid login credentials']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user'=> Auth::user(), 'access_token'=> $accessToken]);
    }

}