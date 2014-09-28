<?php

require_once '../functions.php';
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

$str = '';
for($i=1; $i<=1000; $i++) {
    $str .= spellNumber($i);
}
$str = str_replace(array('-', ' '), '', $str);
echo strlen($str);
