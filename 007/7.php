<?php
require_once '../functions.php';

$num = 2;
$i = 0;
while(true) {
    if(isPrime($num)) $i++;
    if($i == 10001) break;
    $num++;
}

echo $num;
