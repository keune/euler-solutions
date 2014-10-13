<?php

$numberDictionary  = array(
    0 => 'zero',
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six',
    7 => 'seven',
    8 => 'eight',
    9 => 'nine',
    10 => 'ten',
    11 => 'eleven',
    12 => 'twelve',
    13 => 'thirteen',
    14 => 'fourteen',
    15 => 'fifteen',
    16 => 'sixteen',
    17 => 'seventeen',
    18 => 'eighteen',
    19 => 'nineteen',
    20 => 'twenty',
    30 => 'thirty',
    40 => 'forty',
    50 => 'fifty',
    60 => 'sixty',
    70 => 'seventy',
    80 => 'eighty',
    90 => 'ninety',
    100 => 'hundred',
    1000 => 'thousand',
    1000000 => 'million',
    1000000000 => 'billion',
    1000000000000 => 'trillion',
    1000000000000000 => 'quadrillion',
    1000000000000000000 => 'quintillion'
);

function spellNumber($number) {
    global $numberDictionary;
    $result = array();

    $chunks = array_reverse(array_map('strrev', str_split(strrev($number), 3))); // get the number in chunks of 3
    $chunkCount = count($chunks);
    for($i=0; $i<$chunkCount; $i++) {
        $thousands = $chunkCount - $i - 1;
        $thousands = pow(1000, $thousands);

        $digits = $chunks[$i];
        if($digits >= 100) {
            $result[] = $numberDictionary[$digits[0]].' '.$numberDictionary[100];
        }

        $lastTwo = substr($digits, -2);
        if($lastTwo > 0) {
            if($lastTwo < 20) {
                $result[] = $numberDictionary[(int) $lastTwo]; // convert to int to get rid of zeros on the left
            } else {
                $lastTwoWords = $numberDictionary[$lastTwo[0] * 10];
                if($lastTwo[1] > 0) {
                    $lastTwoWords .= '-'.$numberDictionary[$lastTwo[1]];
                }
                $result[] = $lastTwoWords;
            }
        }

        if($thousands > 1) {
            $result[count($result)-1] .= ' '.$numberDictionary[$thousands];
        }
    }
    
    return implode(' and ', $result);
}

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

function stringMultiply($num1, $num2) {
    $num1 = (string) $num1;
    $num2 = (string) $num2;
    $arrLength = strlen($num1) + strlen($num2);

    $subResults = array();
    for($i=strlen($num1)-1; $i>=0; $i--) {
        $subResult = '';
        $carry = 0;
        for($j=strlen($num2)-1; $j>=0; $j--) {
            $product = ($num1[$i] * $num2[$j]) + $carry;
            $product = (string) $product;
            if($product > 9) {
                $carry = $product[0];
                $product = $product[1];
            } else {
                $carry = 0;
            }
            $subResult = $product.$subResult;
        }
        $shift = strlen($num1)-1-$i;
        $subResult .= str_repeat('0', $shift);
        $subResult = $carry.$subResult;
        
        $subResults[] = str_pad($subResult, $arrLength, '0', STR_PAD_LEFT);
    }

    $result = '';
    $carry = 0;
    for($i=$arrLength-1; $i>=0; $i--) {
        $sum = 0;
        foreach($subResults as $sr) {
            $sum += $sr[$i];
        }
        $sum += $carry;
        $sum = (string) $sum;
        if($sum > 9) {
            $carry = substr($sum, 0, strlen($sum)-1);
            $sum = $sum[strlen($sum)-1];
        } else {
            $carry = 0;
        }
        $result = $sum.$result;
    }
    $result = $carry.$result;
    return preg_replace("/^0+/", '', $result);
}

function calculateExecutionTime() {
    $startTime = microtime(true);
    function printTime($startTime) {
        $elapsedTime = microtime(true) - $startTime;
        echo("\n Elapsed time: ".$elapsedTime);
    }
    register_shutdown_function('printTime', $startTime);
}

class DU {
    public static function show($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    public static function showAndDie($var) {
        self::show($var);
        die();
    }
}