<?php

namespace App\Http\Controllers\Api;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller 
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "email"=> "required",
            "password"=> "required",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $credentials = $request->only("email","password");

        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda Salah'
            ],400);
        }

        return response()->json([
            'success'=> true,
            'user' => auth()->user(),
            'token' => $token
        ],200);
    }
}
