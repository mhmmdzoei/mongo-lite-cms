<?php 
namespace App\Models;

use Illuminate\Support\Str;

class response_error
{
    private $errors = array(
        11 => array("status"=>403,"message"=>"کاربر مسدود شده است."),
        12 => array("status"=>403,"message"=>"TOKEN یافت نشد."),
        13 => array("status"=>403,"message"=>"درخواست شما از {ip} ارسال شده است. این IP با IP های ثبت شده در وب سرویس همخوانی ندارد."),
        14 => array("status"=>403,"message"=>"وب سرویس تایید نشده است."),
        21 => array("status"=>403,"message"=>"حساب بانکی متصل به وب سرویس تایید نشده است."),
        22 => array("status"=>404,"message"=>"وب سریس یافت نشد."),
        23 => array("status"=>401,"message"=>"اعتبار سنجی وب سرویس ناموفق بود."),
        24 => array("status"=>403,"message"=>"حساب بانکی مرتبط با این وب سرویس غیر فعال شده است."),
        31 => array("status"=>406,"message"=>"کد تراکنش id نباید خالی باشد."),
        32 => array("status"=>406,"message"=>"شماره سفارش order_id نباید خالی یا تکراری باشد."),
        33 => array("status"=>406,"message"=>"مبلغ amount نباید خالی باشد."),
        34 => array("status"=>406,"message"=>"مبلغ amount باید بیشتر از {min-amount} ریال باشد."),
        35 => array("status"=>406,"message"=>"مبلغ amount باید کمتر از {max-amount} ریال باشد."),
        36 => array("status"=>406,"message"=>"مبلغ amount بیشتر از حد مجاز است."),
        37 => array("status"=>406,"message"=>"آدرس بازگشت callback نباید خالی باشد."),
        38 => array("status"=>406,"message"=>"درخواست شما از آدرس {domain} ارسال شده است. دامنه آدرس بازگشت callback با آدرس ثبت شده در وب سرویس همخوانی ندارد."),
        60 => array("status"=>406,"message"=>"نام بیش از اندازه طولانی است."),
        61 => array("status"=>406,"message"=>"تلفن مقدار مجاز ندارد."),
        62 => array("status"=>406,"message"=>"ایمیل مقدار مجاز ندارد."),
        63 => array("status"=>406,"message"=>"توضیحات بیش از اندازه طولانی است."),
        41 => array("status"=>406,"message"=>"فیلتر وضعیت تراکنش ها می بایست آرایه ای (لیستی) از وضعیت های مجاز در مستندات باشد."),
        42 => array("status"=>406,"message"=>"فیلتر تاریخ پرداخت می بایست آرایه ای شامل المنت های min و max از نوع timestamp باشد."),
        43 => array("status"=>406,"message"=>"فیلتر تاریخ تسویه می بایست آرایه ای شامل المنت های min و max از نوع timestamp باشد."),
        51 => array("status"=>405,"message"=>"تراکنش ایجاد نشد."),
        52 => array("status"=>400,"message"=>"استعلام نتیجه ای نداشت."),
        53 => array("status"=>405,"message"=>"تایید پرداخت امکان پذیر نیست."),
        54 => array("status"=>405,"message"=>"مدت زمان تایید پرداخت سپری شده است."),
        55 => array("status"=>500,"message"=>"در انجام عملیات خطایی رخ داده است."),
        

    );

    public $error_code = "";
    public $params = array();


    public function __construct($code = 0,$params = array())
    {
        $this->error_code = $code;
        $this->params = $params;

    }

    public function get_response(){
        $error_obj = $this->errors[(int)$this->error_code];
        $res = null;
        if(isset($error_obj)){
            $message = (string)$error_obj["message"];
            foreach ($this->params as $key => $value) {
                $message = Str::replaceFirst($key, $value, $message);
            }
            $json = array(
                "error_code"=>(string)$this->error_code,
                "error_message"=>$message,
            );      
            //$res = response()->json($json,(int)$error_obj["status"]);    
            $res = response()->json($json, (int)$error_obj["status"], ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE); 
        }
        else{
            $json = array(
                "error_code"=>"500",
                "error_message"=>"خطای نامشخص",
            );      
            $res = response()->json($json, 500, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE); 
        }

        
        return $res;

    }

    public function get_c_response($message,$code){
        $json = array(
            "error_code"=>$code,
            "error_message"=>$message,
        );      
        $res = response()->json($json, $code, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);     
        return $res;    
    }    

}