<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    //
    public function login(Request $request){
        if($request->has('email') && $request->has('password')){
            $email = $request->input('email');
            $password = $request->input('password');
            if($email == '' || $password == ''){
                return response()->json(['message' => 'Please enter email and password'],401);
            }else{
                $user = User::where('email',$email)->first();
                if($user){
                    if(Hash::check($password,$user->password)){
                        $token = $user->createToken('MyApp')->accessToken;
                        return response()->json(['token' => $token],200);
                    }else{
                        return response()->json(['message' => 'Password is incorrect'],401);
                    }
                }else{
                    return response()->json(['message' => 'User not found'],401);
                }
            }
        }else{
            return response()->json(['message' => 'Please enter email and password'],401);
        }
    }

    public function logout(){
        /** Logout Api */
        $user = auth()->user();
        $user->tokens->each(function($token, $key){
            $token->delete();
        });
    }

}
