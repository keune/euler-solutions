<?php
require_once '../functions.php';

$factorial100 = 1;
$numbers = range(1, 100);
foreach($numbers as $number) {
    $factorial100 = stringMultiply($number, $factorial100);
}

$result = array_sum(str_split($factorial100));
echo $result;