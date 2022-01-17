<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Validator;
use Hash;
use Str;
use Auth;
class UserController extends Controller
{ 
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'login'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails()){
            return resp([
                'status'=>false,
                'message'=>$validator->errors()
            ],422,'Invalid Auth');
        }
        if(is_null($user=User::where('login',$request->login)->first()) || !Hash::check($request->password,$user->password)){
            return resp([
                'status'=>false,
                'message'=>'Incorrect login or password'
            ],404,'Invalid Auth');
        }
        $token=Str::random(50);
        $user->api_token=$token;
        $user->save();

        return resp([
            'status'=>true,
            'token'=>$token
        ],200,'Success auth');
    }


    public function signup(Request $request){
        $validator = Validator::make($request->all(),[
            'login'=>'required|unique:users',
            'first_name'=>'required',
            'surname'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return resp([
                'status'=>false,
                'message'=>$validator->errors()
            ],422,'Invalid registration');
        }
        $token=Str::random(50);
         $user=User::create([
            'login'=>$request->login,
            'first_name'=>$request->first_name,
            'surname'=>$request->surname,
            'password'=>Hash::make($request->password)
        ]);
        
       
        

        return resp([
            'id'=>$user->id
        ],200,'Success register');
    }
    public function logout(Request $request) {
        Auth::logout();
        $user=User::where('api_token',$request->bearerToken())->first();
        $user->api_token=null;
        $user->save();

        return resp([
            'status'=>true,
            
        ],200,'logout');
        
      }

      public function search(Request $request){
        $DataUsers  = $request->search;
        $pieces = explode(" ", $DataUsers);
        $get_seacrh=User::where('first_name','like','%'.$pieces[0].'%')
                        ->orwhere('surname','like','%'.$pieces[1].'%')
                        ->get();// code...
        $body=UserResource::collection($get_seacrh);
        
        return resp($body,200,'user info');
      }

}
