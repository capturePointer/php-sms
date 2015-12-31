<?php
namespace capturePointer;
require_once dirname(__FILE__) . "/sms_driver.php";
function sms($driver){
    $driver = trim($driver);
    $className = "\capturePointer" . "\Sms_" . ucfirst($driver) . "_Driver";
    $filePath = dirname(__FILE__) . "/subdrivers/Sms_" . $driver . "_Driver.php";
    if(file_exists($filePath)){
        require_once $filePath;
        if(class_exists($className)){
            $obj = new $className;
            return $obj;
        }
    }
    return null;
}