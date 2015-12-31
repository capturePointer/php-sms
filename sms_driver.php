<?php
namespace capturePointer;
class Sms_Driver{
    protected $_type = "";
    protected $_apiKey = '';
    protected $_sendUrl = '';


    public function __construct() {
        
    }
    
    public function setType($type = 'normal') {
        $this->_type = $type;
        return true;
    }
    /*
     * send sms
     */
    public function send($phone, $msg, $captcha=''){
        return false;
    }
    
    /*
     * send on success
     */
    protected function _sendOnSuccess($phone,$captcha){
        if(empty($captcha)){
            return false;
        }
        else{
            $this->__sessionId = session_id();
            if(empty($this->__sessionId)) {
                session_start();
            }
            $key = "capturePointer_sms_" . $this->_type . $phone . "_captcha"; 
            $_SESSION[$key] = $captcha;
            return true;
        }
    }
    
    /*
     * check user input sms captcha
     */
    public function check($phone, $captcha){
        $this->__sessionId = session_id();
        if(empty($this->__sessionId)) {
            session_start();
        }
        $key = "capturePointer_sms_" . $this->_type . $phone . "_captcha"; 
        if($_SESSION[$key] == $captcha){
            $_SESSION[$key] = NULL;
            return true;
        }
        else{
            return false;
        }
    }
    
    
}