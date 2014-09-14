<?php
require_once '../functions.php';

$nums1 = $nums2 = range(999, 100);
$wanted = 0;

foreach($nums1 as $num1) {
    foreach($nums2 as $num2) {
        $num = $num1 * $num2;
        if(isPalindrome($num) && $num > $wanted) {
            $wanted = $num;
        }
    }
}
echo $wanted;