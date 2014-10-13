<?php
require_once '../functions.php';
calculateExecutionTime();

$abundantNumbers = array();
$start = 28123 - 12 + 1;

for($i=$start; $i>=12; $i--) {
    $properDivisors = 0;
    $x = floor($i/2);
    for($j=$x; $j>0; $j--) {
        if($i%$j === 0) {
            $properDivisors += $j;
            if($properDivisors > $i) {
                $abundantNumbers[] = $i;
                continue 2;
            }
        }
    }
}


$allNumbers = array_combine(range(1, 28123), range(1, 28123));
foreach($abundantNumbers as $abundantNumber) {
    foreach($abundantNumbers as $abundantNumber2) {
        $sum = $abundantNumber + $abundantNumber2;
        unset($allNumbers[$sum]);
    }
}
DU::show(array_sum($allNumbers));
