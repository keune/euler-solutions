<?php

require_once '../functions.php';
function fibonacci($nth) {
    global $cached;
    if($nth < 3) return 1;

    if($cached) {        
        if(isset($cached[$nth])) {
            return $cached[$nth];
        }
    }

    return fibonacci($nth-1) + fibonacci($nth-2);
}
$cached = array();
$i = 1;
$result = 0;

while(true) {
    $result = fibonacci($i);
    if(strlen($result) == 50) break;
    $cached[$i] = $result;
    $cached = array_slice($cached, count($cached)-1000, 1000);
    $i++;
    if($i%2000 == 0) {
        DU::show($i);
        DU::show($result);
    }
}

echo $result;
