<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        //check email
        $user  = User:: where('email',$request['email'])->first();
        if(!$user ||  !Hash::check($request['password'],$user->password))
        {
            return response ([
                'message' => 'Bad cred'
            ],401);
        }

        $token =$user->createToken('api_token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        return response($response,201);
    }

}
