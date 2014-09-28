<?php
date_default_timezone_set('America/New_York');
require_once '../functions.php';

$count = 0;
for($y=1901; $y<=2000; $y++) {
    for($m=1; $m<=12; $m++) {
        $m = sprintf("%02d", $m);
        $date = strtotime("{$y}-{$m}-01");
        $fdom = date('w', $date);
        if($fdom === '0') $count++;
    }
}

echo $count;