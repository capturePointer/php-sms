php sms library:

you can add sms platform under subdrivers folder

you can send sms like below:

	<?php
	require_once dirname(__FILE__) . '/../sms.php';
	$sms = \capturePointer\sms("luosimao");
	$ret = $sms->send(11111111111, "验证码：123456【capturePointer】");
	if($ret){
		print "发送成功";
	}
	else{
		print "发送失败";
	}
