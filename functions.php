<?php

function isPrime($num) {
    if($num == 1) return false;
    if($num == 2) return true;

    if($num%2 === 0) return false; // farewell all even numbers

    if(filter_var(sqrt($num), FILTER_VALIDATE_INT) !== false) return false; // a prime number's sqrt is always a float
    if($num > 3) {
        $digits = str_split((string) $num);
        if(array_sum($digits)%3 === 0) return false; // can it be divided by 3?
    }
    $max = ceil(sqrt($num));
    for($i=3; $i<=$max; $i+=2) {
        if($num%$i === 0) return false;
    }
    return true;
}

function factorial($num) {
    if($num == 0) return 1;
    return array_product(range(1, $num));
}

function isPalindrome($num) {
    return ($num == strrev((string) $num));
}