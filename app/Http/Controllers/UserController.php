<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register,logout']]);
    // }

    public function register(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required |min:6 '
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => "user not add successfully"]);
        }
        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        // dd($user);
        return response()->json(['message' => "user add successfully", 'user' => $user]);
    }



    public function login(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required |min:6 '
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if (!$token = auth()->attempt($validator->validated())) {

            return response()->json(['error' => "unauthorised"]);
        }

        return $this->respondWithToken($token);
    }

    public function profile()
    {

        return response()->json(auth()->user());
        // return $this->respondWithToken(auth()->refresh());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expire_at' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}