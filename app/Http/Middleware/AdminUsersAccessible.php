<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\webservice;
use App\Models\user;
use App\Models\account;
use App\Models\response_error;
use Session;


class AdminUsersAccessible
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


        if (!Session::has('mlc_admin_token'))
        {
            return redirect()->route('admin_login');
        }


        $mlc_admin_token = Session::get('mlc_admin_token');
        $finded_user = user::find($mlc_admin_token);


        if(!$finded_user){
            return redirect()->route('admin_login');
        }


        $request->attributes->add(['user' => $finded_user]);
        return $next($request);

    }
}
