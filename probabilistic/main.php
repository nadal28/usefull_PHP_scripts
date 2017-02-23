<?php

//casa: 10, coche: 30, agua: 90, comida: 90

$array = array(10, 10, 10, 10);

$rand = mt_rand() % array_sum($array);

$i = 0;
while($rand >= 0)
	$rand -= $array[$i++];

echo $i - 1;

?>
