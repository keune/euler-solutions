<?php

$numbers = range(1, 1000);
$total = 0;
foreach($numbers as $number) {
    $total = bcadd(bcpow($number, $number), $total);
}

$digits = str_split($total);
$result = array_slice($digits, count($digits)-10);
echo implode('', $result);