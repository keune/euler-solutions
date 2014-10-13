<?php
require_once '../functions.php';

function fibonacci($nth) {
    global $cached;
    if($nth < 3) return 1;

    if($cached) {
        if(isset($cached[$nth])) {
            return $cached[$nth];
        }
        if(isset($cached[$nth-1]) && isset($cached[$nth-2])) {
            return bcadd($cached[$nth-1], $cached[$nth-2]);
        }
    }

    return bcadd(fibonacci($nth-1), fibonacci($nth-2));
}

$cached = array();
$i = 1;
$result = 0;

while(true) {
    $result = fibonacci($i);
    //DU::show($i." -> ".$result);
    if(strlen($result) == 1000) break;
    $cached[$i] = $result;
    $i++;
}

echo $i;
