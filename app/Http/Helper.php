<?php

function cache_put(string $key, $value, $ttl = null)
{
    return cache()->store('redis')->put($key, $value, $ttl);
}

function cache_get(string $key, $default = null)
{
    return cache()->store('redis')->get($key, $default);
}

function response_json($json,$status){
    $res = response()->json($json, $status, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    return $res;
}

function getNewMongoId(){
    $new_id_obj = new \MongoDB\BSON\ObjectID();
    $new_id = ((array)$new_id_obj)["oid"];
    return $new_id;
}

function getIdFromToken($token){
    $api_key_arr = explode('-', $token);
    if(sizeof($api_key_arr) > 1){
        return  $api_key_arr[0];
    }
    return false;
}


function getUniqueNumber(){
    return hexdec(uniqid());
}

function generatePassword($salt,$password){
    return \sha1($salt . 'li9' . \md5('b28d' . $password));
}

function get_token_from_alias($alias){
    $token = cache_get("alias_" . $alias);

    return $token;
}

function set_token_alias_cache($alias,$token){
    cache_put("alias_" . $alias,$token);
}
