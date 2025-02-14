<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    

    protected function redirectTo( $request)
   {
    if (!$request->expectsJson()) {
        if(Route::is("admin.*")){
            return route("adminlogin");
        } 
         else{
            return route("login"); 
         }
    }

    return null;
}

}