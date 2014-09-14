<?php
require_once '../functions.php';
$sum = 0;
$i = 2;
while($i<2000000) {
    if(isPrime($i)) {
        $sum += $i;
    }
    $i++;
}

echo $sum;
