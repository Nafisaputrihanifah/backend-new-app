<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;

class UserController extends Controller
{
    public function user(Request $request)
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch(Exception $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['error' => 'token_invalid'],400);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error' => 'token_expired'],401);
            }
             else{
                return response()->json(['error' => 'token_not_foung'],401);
            }
        }
       
        return new UserResource($user) ;
    }
}
