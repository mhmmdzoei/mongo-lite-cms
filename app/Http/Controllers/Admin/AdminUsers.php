<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\response_error;
use App\Models\user;
use App\Models\content;

use Illuminate\Support\Str;
use View;
use Validator;
use Session;

class AdminUsers extends Controller
{
    private $default_username = "newuser";
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $user = $request->get('user');
        $users = user::all();
        $data = array("list" => $users , "user" => $user);
        return View::make("admin/users")->with($data);
    }

    public function new(Request $request){

        if(user::where('username', $this->default_username)->count() == 0) {
            $salt = Str::random(5);
            $req_password = generatePassword($salt, "Mn@123456");
            $insertObj = array();
            $insertObj['_id'] = getNewMongoId();
            $insertObj['username'] = $this->default_username;
            $insertObj['password'] = $req_password;
            $insertObj['salt'] = $salt;
            $insertObj['is_active'] = "0";
            $success_save = user::create($insertObj);
        }
        return redirect()->route('admin_users');
    }

    public function form(Request $request,$edit_id){
        $user = $request->get('user');
        $edit_user = user::find($edit_id);
        if($edit_user){
            $edit_user['password'] = '';
            $edit_user['salt'] = '';
            $data = array("form" => $edit_user,"user" => $user,"error"=> "");
            return View::make("admin/users_form")->with($data);
        }
    }

    public function edit(Request $request,$edit_id){
        $error = "";
        $user = $request->get('user');
        $edit_user = user::find($edit_id);
        if(!$edit_user){
            $error = "UserID is not valid!";
        }

        if($error == ""){
            $validator = Validator::make($request->all(), [
                "username" => 'required|string|min:5|max:25',
                "password" => [
                    'nullable',
                    'string',
                    'min:6',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                "is_active" => 'required|digits:1'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->first();
            }
        }

        if($error == ""){
            if($request->input('username') == $this->default_username){
                $error = "You should change default username.";
            }
        }

        if($error == ""){
            if(user::where('username', $request->input('username'))->where('_id', '<>', $edit_id)->count() > 0){
                $error = "The username has already been taken.";
            }
        }

        if($error == ""){
            if($request->input('password') != '' && $request->input('password') != $request->input('password_again')){
                $error = "The password is not the same with its repeat.";
            }
        }

        $edit_user->username       = $request->input('username');
        $edit_user->is_active      = $request->input('is_active');

        if($error == ""){
            if($request->input('password') != ''){
                $edit_user->password = generatePassword($edit_user->salt,$request->input('password'));
            }
            $edit_user->save();
            return redirect()->route('admin_users');
        }else{
            $edit_user['password'] = '';
            $edit_user['salt'] = '';
            $data = array("form" => $edit_user,"user" => $user,"error"=> $error);
            return View::make("admin/users_form")->with($data);
        }
    }

    public function delete(Request $request,$edit_id){
        $user = $request->get('user');
        $edit_user = user::find($edit_id);
        $edit_user->delete();
        return redirect()->route('admin_users');
    }

}
