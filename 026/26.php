<?php
require_once '../functions.php';

for($i=1; $i<1000; $i++) {
    $division = 1/$i;
    DU::show($division);
}