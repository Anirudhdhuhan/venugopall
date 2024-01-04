<?php

function getExtension($str) 
{
	$i = strrpos($str,".");
	if(!$i)
	{
		return "";
	}
	$l = strlen($str)-$i;
	$ext = substr($str, $i+1, $l);
	return $ext;
}

function strip_url($string)
{
	$string = str_replace([' ', '/', '%', '‘', '’', '$', '”' , '“', '"', '-', '?', ':'], '-', $string);
	$string = trim($string);
	return $string;
}

function secure_base_url($url){
	 return secure_url($url);
	// return $url;
}

function action_time($created_time)
{
	$now = new DateTime();
	$t1 = strtotime($created_time);
	$t2 = strtotime($now->format('Y-m-d H:i:s'));
	$hours = ceil(($t2 - $t1)/3600);

	$date = date_create($created_time);
	$action_time = date_format($date,"d M Y");

	if($hours <= 1)
		$action_time = 'Just Now';
	elseif($hours >= 1 && $hours < 25)
		$action_time = $hours . ' Hours Ago';
	elseif($hours >= 24 && $hours < 49)
		$action_time = 'Yesterday';

	return $action_time;
}

// function send_sms($contact,$message)
// {
// 	$url = "sms.wisebiztech.com/submitsms.jsp";
// 	$user = SMS_API_USERNAME;
// 	$password = SMS_API_PASSWORD;
// 	$message = urlencode($message);

// 	$query_string = "user=" . SMS_API_USERNAME;
// 	$query_string .= "&key=" . SMS_API_PASSWORD;
// 	$query_string .= "&message=" . $message;
// 	$query_string .= "&mobile=" . $contact;
// 	$query_string .= "&senderid=MOLITS";
// 	$query_string .= "&accusage=1";
// 	$query_string .= "&unicode=1";

// 	$ch = curl_init();
// 	if (!$ch)
// 	{die("Couldn't initialize a cURL handle");}

// 	$ret = curl_setopt($ch, CURLOPT_URL,$url);
// 	curl_setopt($ch, CURLOPT_POST, 1);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
// 	$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 	$curlresponse = curl_exec($ch); // execute
// 	curl_close($ch);
// 	return $ret;
// }

function send_sms($contact, $message,$user=null)
{
    $senderid=VERIFICATION_ID;
    if($user){
        $senderid=$user->sender_id;
    }
    $url = SMS_BIZTECH_URL;
    $user = SMS_BIZTECH_USERNAME;
    $password = SMS_BIZTECH_PASSWORD;
    $message = urlencode($message);
    
    $contacts=is_array($contact)?$contact:[$contact];
    $data = array(
        "username"=>$user,
        "password"=>$password,
        "to"=>$contacts,
        "text"=>$message,
        "from"=>$senderid,
        "coding"=>'0',
        "flash"=>'0'
    );
    $query_string = json_encode($data);

    $ch = curl_init();
    if (!$ch) {
        die("Couldn't initialize a cURL handle");
    }
    $ret = curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $curlresponse = curl_exec($ch); // execute
    curl_close($ch);
    return $ret;
}

?>