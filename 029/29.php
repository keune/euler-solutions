<?php
require_once '../functions.php';

$start = 2;
$stop = 100;
$results = array();
for($i=$start; $i<=$stop; $i++) {
    for($j=$start; $j<=$stop; $j++) {
        $result = bcpow($i, $j);
        $results[$result] = 1;
    }
}

DU::show(count($results));