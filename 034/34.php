<?php
require_once '../functions.php';
calculateExecutionTime();

$cache = array();
function isCurious($num) {
    global $cache;
    $num = (string)$num;
    $digits = str_split($num);
    rsort($digits);
    $key = implode('', $digits);

    if(isset($cache[$key])) {
        $sum = $cache[$key];
    } else {
        $sum = 0;
        foreach($digits as $digit) {
            $sum += factorial($digit);
            if($sum > $num) {
                return false;
            }
        }
    }

    $cache[$key] = $sum;
    if($sum == $num) {
        return true;
    }
    return false;
}

$limit = factorial(9) * 8;
$result = 0;
for($i=3; $i<$limit; $i++) {
    if(isCurious($i)) {
        DU::show($i);
        $result += $i;
    }
}

DU::show('Result: '.$result);