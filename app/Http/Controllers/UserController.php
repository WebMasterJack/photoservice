<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Str;
class UserController extends Controller
{ 
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'login'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails() || is_null($user=User::where('login',$request->login)->first()) || !Hash::check($request->password,$user->password)){
            return resp([
                'status'=>false,
                'message'=>'Invalid Auth'
            ],401,'Invalid Auth');
        }
        $token=Str::random(50);
        $user->api_token=Hash::make($token);
        $user->save();

        return resp([
            'status'=>true,
            'token'=>$token
        ],200,'Success auth');
    }
}
