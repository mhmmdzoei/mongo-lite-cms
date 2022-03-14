<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\response_error;
use App\Models\user;
use View;
use Validator;
use Session;

class AdminAuthentication extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $data = array("error"=> "");
        return View::make("admin/login")->with($data);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            "username" => 'required|string|min:5|max:25',
            "password" => 'required|string|min:5|max:25'
        ]);

        if ($validator->fails()) {
            return (new response_error())->get_c_response($validator->errors()->first(),422);
        }

        $user = user::where('username', $request->input('username'))->where('is_active','1')->first();

        $isValid = false;

        if($user && isset($user->salt) && isset($user->password)){
            $req_password = generatePassword($user->salt,$request->input('password'));
            if($user->password == $req_password) $isValid = true;
        }

        if($isValid){
            Session::put('mlc_admin_token', $user->id);
            Session::save();
            return redirect()->route('admin_contents');
        }else{
            $data = array("error"=> "The username or password is wrong.");

            return View::make("admin/login")->with($data);
        }
    }

    public function signout(Request $request){
        $request->session()->flush();
        return redirect()->route('admin_login');
    }

}
