<?php

require_once '../functions.php';
$number = 600851475143;
$highest = 0;
$i = 1;
while(true) {
	if($number%$i === 0) {
		$number /= $i;
		if(isPrime($i)) {
			$highest = $i;
		}
	}
	if($i > $number) break;
	$i++;
}

echo $highest;
