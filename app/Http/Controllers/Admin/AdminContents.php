<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\response_error;
use App\Models\user;
use App\Models\content;

use View;
use Validator;
use Session;

class AdminContents extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $user = $request->get('user');
        $contents = content::all();
        $data = array("contents" => $contents , "user" => $user);
        return View::make("admin/contents")->with($data);
    }

    public function new(Request $request){
        $new_id = getNewMongoId();
        $insertObj = array();
        $insertObj['_id']           = $new_id;
        $insertObj['seo']           = "";
        $insertObj['title']         = "";
        $insertObj['keywords']      = "";
        $insertObj['description']   = "";
        $insertObj['name']          = "newname";
        $insertObj['content']       = "<div></div>";
        $insertObj['is_active']     = "0";

        $success_save = content::create($insertObj);
        return redirect()->route('admin_contents');
    }

    public function form(Request $request,$edit_id){
        $user = $request->get('user');
        $edit_content = content::find($edit_id);
        if($edit_content){
            $data = array("form" => $edit_content,"user" => $user,"error"=> "");
            return View::make("admin/contents_form")->with($data);
        }
    }

    public function edit(Request $request,$edit_id){
        $error = "";
        $user = $request->get('user');
        $edit_content = content::find($edit_id);
        if(!$edit_content){
            $error = "FormID is not valid!";
        }

        if($error == ""){
            $validator = Validator::make($request->all(), [
                "seo" => 'nullable|string|min:3|max:250',
                "title" => 'nullable|string|min:8|max:35',
                "keywords" => 'nullable|string|min:5|max:250',
                "description" => 'nullable|string|min:5|max:250',
                "name" => 'required|string|min:5|max:25',
                "content" => 'required|string|min:5',
                "is_active" => 'required|digits:1'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->first();
            }
        }

        $edit_content['seo']          = $request->input('seo');
        $edit_content->title          = $request->input('title');
        $edit_content->keywords       = $request->input('keywords');
        $edit_content->description    = $request->input('description');
        $edit_content->name           = $request->input('name');
        $edit_content->content        = $request->input('content');
        $edit_content->is_active      = $request->input('is_active');

        if($error == ""){
            $edit_content->save();
            return redirect()->route('admin_contents_form',$edit_id);
        }else{
            $data = array("form" => $edit_content,"user" => $user,"error"=> $error);
            return View::make("admin/contents_form")->with($data);
        }
    }

    public function delete(Request $request,$edit_id){
        $user = $request->get('user');
        $edit_content = content::find($edit_id);
        $edit_content->delete();
        return redirect()->route('admin_contents');
    }

}
