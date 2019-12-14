<?php

function permute($str, $f = '') {
	$p = [];
	if (strlen($str) == 2) {
		$p[] = $f . $str;
		$p[] = $f . strrev($str);
	} else {
		for ($i = 0; $i < strlen($str); $i++) {
			$first = $str[$i];
			$restStr = substr($str, 0, $i) . substr($str, $i + 1);
			$p = array_merge($p, permute($restStr, $f . $first));
		}
	}
	return $p;
}

$str = "0123456789";
$res = permute($str);

var_dump($res[999999]);