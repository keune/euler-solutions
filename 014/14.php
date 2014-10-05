<?php
require_once '../functions.php';

$stacks = array();
for($i=1; $i<1000000; $i++) {
    $curNum = $i;
    $count = 0;
    while($curNum>1) {
        if($curNum%2 === 0) {
            $curNum = $curNum/2;
        } else {
            $curNum = 3*$curNum + 1;
        }

        if(isset($stacks[$curNum])) {
            $count = $count + $stacks[$curNum];
            break;
        }
        $count++;
    }
    $count += 1;
    $stacks[$i] = $count;
}

arsort($stacks);
$longest = array_slice($stacks, 0, 1, true);
echo key($longest).' has '.$longest[key($longest)].' numbers';