<?php
set_time_limit(-1);
require_once '../functions.php';

calculateExecutionTime();

$start = 0;
$stop = 14;
$coordinates = 0;
$currentX = 0;
$currentY = 0;

function yuruX($x, $y) {
	$x += 1;
	//$coordStr .= '-'.$x.$y;
	yuru($x, $y);
}

function yuruY($x, $y) {
	$y += 1;
	//$coordStr .= '-'.$x.$y;
	yuru($x, $y);
}

function yuru($x, $y) {
	global $currentX, $currentY, $coordinates, $start, $stop;
	$wentSomewhere = false;
	if($x<$stop) {
		yuruX($x, $y);
		$wentSomewhere = true;
	}

	if($y<$stop) {
		yuruY($x, $y);
		$wentSomewhere = true;
	}

	if(!$wentSomewhere) {
		//$coordinates += 1;
		$coordinates = bcadd($coordinates, 1);
		//$coordinates[] = $coordStr;
	}
}
/*
for($i=1; $i<=10; $i++) {
	$coordinates = 0;
	$stop = $i;
	yuru(0,0);
	DU::show($stop.' => '.$coordinates);
}
*/

yuru(0, 0, '');
DU::show($coordinates);