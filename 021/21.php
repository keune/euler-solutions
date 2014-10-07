<?php
$stop = 10000;
$sums = array();
for($i=1; $i<$stop; $i++) {
	$sum = 0;
	$x = ceil($i/2);
	for($j=1; $j<=$x; $j++) {
		if($i%$j === 0) {
			$sum += $j;
			if($sum >= $stop) {
				continue 2;
			}
		}
	}
	$sums[$i] = $sum;
}

$result = 0;
foreach($sums as $num1 => $num2) {
	if(($pos = array_search($num1, $sums)) !== false) {
		if($num2 == $pos && $num1 != $num2) {
			unset($sums[$num1]);
			unset($sums[$num2]);
			$result += $num1 + $num2;
		}
	}
}
echo $result;
