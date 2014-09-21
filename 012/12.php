<?php

$number = 0;
$triangleNumber = 0;
while(true) {
    $number++;
    $triangleNumber += $number;

    $leftHand = array();
    $rightHand = array();
    for($i=1; $i<=$triangleNumber; $i++) {
        if($triangleNumber%$i === 0) {
            $leftHand[] = $i;
            $rightHand[] = ($triangleNumber/$i);

            if(($triangleNumber/$i) - $i < 2) {
                break;
            }
        }
    }
    $divisorCount = count($leftHand) * 2;
    if($divisorCount > 500) {
        break;
    }
}

echo $triangleNumber;
