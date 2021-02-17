<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckUploadID
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->front_extension === NULL){
            return redirect()->route('id.verify');
        }elseif(auth()->user()->verified_id === "0"){
            return redirect()->route('id.verify');
        }
        return $next($request);
    }
}
