<?php
$i = 1;
$j = 0;
$total = 0;
while($i<4000000) {
    if(($i%2) === 0) {
        $total += $i;
    }
    $x = $i;
    $i += $j;
    $j = $x;
}

echo $total;