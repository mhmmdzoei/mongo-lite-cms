<?php 
namespace App\Services;

use App\Models\content;
use Illuminate\Support\Facades\Validator;

class HTMLParser
{
    private $findedContents = array();

    public function replaceNames($resultHtml,$metaArray){
        preg_match_all('/###(.*?)###/', $resultHtml, $matches);
        $keyArray = array();
        if(isset($matches[1])){
            foreach($matches[1] as $item){
                $tItem = \strtolower(\trim($item));
                if(!\in_array($tItem, $keyArray))
                    $keyArray[] = $tItem;
            }
            
        }

        

        foreach($keyArray as $keyItem){
            if(!\array_key_exists($keyItem,$this->findedContents)){
                $finded_content = content::where('name', $keyItem)->where('is_active','1')->first();
                if($finded_content){
                    $in_content = $finded_content->content;
                    $in_content = $this->replaceNames($in_content,$metaArray);
                    $this->findedContents[$keyItem] = $in_content;
                }
            }
        }


        foreach($this->findedContents as $key=>$value){
            $resultHtml = str_replace("###" . $key ."###", $value, $resultHtml);
        }

        foreach($metaArray as $metaKey=>$metaValue){
            $resultHtml = str_replace("##!" . $metaKey ."!##", $metaValue, $resultHtml);
        }
        return $resultHtml;
    }


}