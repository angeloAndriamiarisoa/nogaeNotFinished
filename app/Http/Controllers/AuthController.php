<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function authenticate (Request $request) 
    {
     

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd(auth()->user());
        
        $user = User::where('email', $request->email)->first();
        // dd(Auth::attempt(["email" => $request->email, "password" => $request->password]));
        if($user != null){
            // if(Hash::check($request->password, $user->password)){
                if(Auth::attempt($credentials)){  
                    // dd(auth()->user());
                    // dd(Auth::user());    
                    // Auth::login($user);
                return response()->json([
                    'token' => $user->createToken(time())->plainTextToken,
                    'userData' => $user
                ]); 
            }
            else{
                // dd(Auth::user());    
                

                return response()->json([
                    'error' => ['email' => "", 'password' => 'wrong password']
                ]);
            }  
        }
        return response()->json([
            'error' => ['email' => 'wrong email', 'password' => ""]
        ]);
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return response()->json([
        //         'response' => 'success'
        //     ], 200);
        // }
 
        // return response()->json([
        //     'response' => 'errors'
        // ]);
        // dd($request);
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);
     
        // $user = User::where('email', $request->email)->first();
     
        // if (! $user || ! Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
     
        // return $user->createToken($request->email)->plainTextToken;
        
    }

    public function logOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();


        // auth()->logout();   
        
        // dd(Auth::logout());

        // $request->session()->invalidate();
 
        // $request->session()->regenerateToken();
    }
}
