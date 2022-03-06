<?php

namespace App\Http\Controllers;

use App\Models\content;
use App\Services\HTMLParser;

use Illuminate\Http\Request;
use View;

class PageContent extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request,$key = "",$amount = ""){
        if($key == "") $key = "homepage";
        $finded_content = content::where('seo', $key)->where('is_active','1')->first();
        if($finded_content){
            $resultHtml = $finded_content->content;
            $metaArray = array();
            $metaArray['title'] = $finded_content->title;
            $metaArray['keywords'] = $finded_content->keywords;
            $metaArray['description'] = $finded_content->description;
            $metaArray['name'] = $finded_content->name;

            $parser = new HTMLParser;
            $resultHtml = $parser->replaceNames($resultHtml,$metaArray);

            $data = array("htmlData" =>  $resultHtml);
            return View::make("page/content")->with($data);
        }



        abort(404);


    }

}
