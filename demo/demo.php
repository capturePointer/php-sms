<?php
require_once dirname(__FILE__) . '/../sms.php';
$sms = \capturePointer\sms("luosimao");
$ret = $sms->send(11111111111, "��֤�룺123456��capturePointer��");
if($ret){
	print "���ͳɹ�";
}
else{
	print "����ʧ��";
}