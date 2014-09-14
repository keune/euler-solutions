<?php
require_once '../functions.php';

$factorial100 = factorial(100);
var_dump($factorial100);
//$factorial100 = sprintf(sprintf('%%.%dF', max(15 - floor(log10($factorial100)), 0)), $factorial100);
echo "<br>";
var_dump($factorial100);
echo "<br>";
echo array_sum(str_split($factorial100));