<?php
namespace capturePointer;
class Sms_Driver{
    protected $_apiKey = '';
    protected $_sendUrl = '';


    public function __construct() {
        
    }
    
    /*
     * check user input sms captcha
     */
    public function check($captcha){
        return false;
    }
    
    /*
     * send sms
     */
    public function send($phone, $msg){
        return false;
    }
    
    /*
     * get balance
     */
    public function getBalance(){
        return false;
    }
    
}