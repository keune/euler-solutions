<?php
require_once '../functions.php';

$filename = "p022_names.txt";
$handle = fopen($filename, 'r');
while(!feof($handle)) {
    $name = stream_get_line($handle, NULL, ",");
    $name = str_replace("\"", '', $name);
    $name = strtolower($name);
    $names[] = $name;
}

sort($names);
$result = 0;
foreach($names as $key => $name) {
    $score = 0;
    for($i=0; $i<strlen($name); $i++) {
        $score += ord($name[$i]) - 96;
    }
    $result += ($key + 1) * $score;
}
echo $result;