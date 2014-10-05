<?php

require_once '../functions.php';


$str = '';
for($i=1; $i<=1000; $i++) {
    $str .= spellNumber($i);
}
$str = str_replace(array('-', ' '), '', $str);
echo strlen($str);
