<?php

/*DONT CHANGE THIS IN PRODUCTION!*/
$key = 'aaa';
$cost = 5;
$method = 'aes-256-ctr';
/*********************************/

function encrypt($data) {
	global $key, $cost;

	for($i = 0; $i < $cost; ++$i) {
		$data = openssl_encrypt($data, $method, $key);
	}
	return $data;
}

function decrypt($data) {
	global $key, $cost;
	
	for($i = 0; $i < $cost; ++$i) {
		$data = openssl_decrypt($data, $method, $key);
	}
	return $data;
}

?>
