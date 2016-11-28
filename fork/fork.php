<?php

define('HIJOS', 2);

$cont = 0;

for($i = 0; $i < 10; ++$i){
	if(HIJOS == $cont){
		while(pcntl_wait($status) != -1)
			continue;
		echo 'Soy padre: '.microtime(true)."\n";
		$cont = 0;
	}
	++$cont;
	$pid = pcntl_fork();

	if(!$pid){
		echo 'Soy caso aislado: '.microtime(true)."\n";
		exit();
	}
}

?>
