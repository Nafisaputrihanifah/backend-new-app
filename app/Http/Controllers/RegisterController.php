<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
// use App\models\Register;
use App\Http\Request\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $user =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $respon = [
            'status' => 'berhasil',
            'data' => $user,
        ];
        return response()->json($respon,200);
    }
}
