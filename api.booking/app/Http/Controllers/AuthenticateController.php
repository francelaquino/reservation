<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AppHttpRequests;
use AppHttpControllersController;
use Tymon\JWTAuthExceptions\JWTException;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
   

   public function authenticate(Request $request)
    {
    	//$credentials=array('email' =>  '1','password'=>'1');
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));


    }
}
