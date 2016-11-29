<?php

function curl($url, $args) {

	$args = implode('&', array_map(
		function ($v, $k) { return sprintf("%s=%s", $k, $v); },
		$args,
		array_keys($args)
		));

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  
	if(!empty($args){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
	}  
	
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	$response = curl_exec($ch);
	curl_close($ch);

	return $response;
}

?>
