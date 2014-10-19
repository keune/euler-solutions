<?php
require_once '../functions.php';
calculateExecutionTime();

/*
// Method 1: Brute force
$limit = 9876543;
for($i=$limit; $i>2143; $i-=2) {
    echo "{$i}\n";
    $num = (string)$i;
    $digits = str_split($num);
    if($digits[count($digits)-1] == 5) continue;
    if(array_sum($digits) % 3 === 0) continue; 
    rsort($digits);
    $hightestDigit = $digits[0];
    $countValues = array_count_values($digits);
    if(array_sum($countValues) != $hightestDigit) {
        continue;
    }
    
    if(array_diff(range(1, $hightestDigit), array_keys($countValues))) {
        continue;
    }
    
    if(isPrime($i)) {
        DU::show($i);
        exit;
    }
}
*/


// Method 2: using permutation to greatly reduce the amount of numbers to check
function permute($list) {
    $result = array();

    $inner = function($items, $perms = array()) use (&$result, &$inner) {
        if(!$items) {
            $result[] = $perms;
        } else {
            foreach($items as $i => $item) {
                $newItems = $items;
                $newPerms = $perms;
                array_splice($newItems, $i, 1);
                array_unshift($newPerms, $item);
                $inner($newItems, $newPerms);
            }
        }
    };

    $inner($list);
    return $result;
}

for($i=7; $i>3; $i--) {
    $numbers = range(1, $i);
    $permutations = permute($numbers);
    rsort($permutations);
    foreach($permutations as $numberArr) {
        $number = implode('', $numberArr);
        if(isPrime($number)) {
            DU::show($number);
            exit;
        }
    }
}
