<?php
/*
*sms platform: https://luosimao.com
*charset: utf-8
*/
namespace capturePointer;
class Sms_Luosimao_Driver extends \capturePointer\Sms_Driver{
    protected $_apiKey = '';
    protected $_sendUrl = "http://sms-api.luosimao.com/v1/send.json";
    
    public function __construct() {
        
    }
    
    public function init($apiKey, $sendUrl){
        $this->_apiKey = $apiKey;
        $this->_sendUrl = $sendUrl;
    }
    
    public function send($phone, $msg, $captcha=''){
        if(!preg_match('/1\d{10}/', $phone) || strlen($phone) != 11 || empty($msg) || strlen($msg) > 500){
            return false;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_sendUrl);

        curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-' . $this->_apiKey);

        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => $msg));

        $res = curl_exec( $ch );
        curl_close( $ch );
        $res  = curl_error( $ch );
        $json = json_decode($res);
        if(isset($json->error) && 0 == $json->error){
            $this->_sendOnSuccess($phone,$captcha);
            return true;
        }
        else{
            return false;
        }
    }
    
    
    
}