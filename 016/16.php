<?php

require_once '../functions.php';

$number = pow(2, 50);
$result = 1;
for($i=1; $i<=20; $i++) {
    $result = stringMultiply($number, $result);
}
$result = array_sum(str_split($result));
echo $result;