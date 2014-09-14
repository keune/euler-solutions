<?php
$multipliers = array();
$numbers = range(1,20);

for($k=2; $k<=max($numbers);) {
	$add = false;
	foreach($numbers as $i => $num) {
		if($num%$k === 0) {
			$numbers[$i] = $num / $k;
			$add = true;
		}
	}
	if($add) {
		$multipliers[] = $k;
	} else {
		$k++;
	}
}

var_dump($multipliers);
$sonuc = array_product($multipliers);
echo $sonuc;