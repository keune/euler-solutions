<?php
$nums = range(1, 100);

$all = 0;
$group = 0;
foreach($nums as $num) {
    $all += pow($num, 2);
    $group += $num;
}

$result = pow($group, 2) - $all;
var_dump($result);