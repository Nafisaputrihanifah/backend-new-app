<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentis = $request->only('email',  'password');


        if(!$token = auth()->attempt($credentis)){
            return response()-> json(['error' => 'invalid_creadentials ']);
        };

        return response()->json([
            'data ' => $credentis,
            'token' => $token
        ]);


        //  return (new UserCollection($request->user()))
        // ->additional(['meta' => [
        //     'token' => $token,
        // ]]);
    }
}
