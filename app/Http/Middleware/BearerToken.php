<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
class BearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token= $request->bearerToken();
        foreach(User::all() as $user){
            if($user->api_token==$token){
                auth()->login($user);
            }
            if(!auth()->check()){
                return resp([
                    'message'=> 'UnAuth'
                ],401,'UnAuth');
            }
            
        } 
       

        return $next($request);
    }
}
