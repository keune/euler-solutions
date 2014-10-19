<?php
require_once '../functions.php';
calculateExecutionTime();

$result = 0;
for($i=0; $i<1000000; $i++) {
    if(($i%2) > 0 && isPalindrome($i)) {
        if(isPalindrome(decbin($i))) {
            DU::show($i);
            $result += $i;
        }
    }
}
DU::show('Result: '.$result);