<?php 
namespace App\Models;

use Illuminate\Support\Str;

class response_msg
{
    public function __construct()
    {

    }


    public function get_response($message,$code){
        $json = array(
            "message"=>$message,
        );      
        $res = response()->json($json, $code, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);     
        return $res;    
    }    

}