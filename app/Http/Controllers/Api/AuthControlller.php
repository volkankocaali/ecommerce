<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthControlller extends Controller
{
    public function login(LoginRequest $request){
        $request->validated();;
        $data = $request->only('email','password');

        if(!Auth::attempt($data)){
            throw ValidationException::withMessages([
                'email' => ['Girilen kimlik bilgileri geçersizdir']
            ]);
        }

        $user = User::where('email',$request->email)
            ->first();

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken,
            'user' => $user,
        ]);

    }
    public function register(RegisterRequest $request){
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken,
            'user' => $user
        ]);
    }
}
