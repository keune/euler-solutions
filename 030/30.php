<?php
require_once '../functions.php';
calculateExecutionTime();

function decide($num) {
    if($num < 32) return false;
    $num = (string)$num;
    $numOfDigits = strlen($num);
    if($numOfDigits > 6) {
        /*
        There is no need to check numbers which have more than six digits
        because 9^5 = 59049 is the maximum a digit can make 
        and seven of them makes less than a seven digit number
        */
        return false;
    }
    $digits = str_split($num);
    /* 
    if a number contains a 9, 8 or 7 it has to be at least 5 digit,
    same rule applies for 6,5,4 and 3 with lesser digits.
    */
    if($numOfDigits < 5) {
        if(preg_match('/9|8|7/', $num)) {
            return false;
        }
        
        if($numOfDigits < 4 && preg_match('/6|5|4/', $num)) {
            return false;
        }

        if($numOfDigits < 3 && strstr($num, 3)) {
            return false;
        }
    }

    $total = 0;
    for($i=0; $i<$numOfDigits; $i++) {
        $total += pow($num[$i], 5);
        if($total > $num) {
            return false;
        }
    }

    if($total == $num) {
        return true;
    }
    return false;
}
$result = 0;
for($i=1; $i<1000000; $i++) {
    if(decide($i)) {
        DU::show($i);
        $result += $i;
    }
}
DU::show('Result: '.$result);