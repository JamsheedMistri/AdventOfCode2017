<?php
$input = 277678;
$ring = 1;
$count = 2;
$grid = [
	[
		"value" => 1,
		"x" => 0,
		"y" => 0
	], 
	[
		"value" => 2,
		"x" => 1,
		"y" => 0
	]
];

while (true) {
	$x = $grid[sizeof($grid) - 1]["x"];
	$y = $grid[sizeof($grid) - 1]["y"];

	if (abs($x) == abs($y)) {
		if ($x > 0 && $y > 0) $x --;
		else if ($x < 0 && $y > 0) $y --;
		else if ($x < 0 && $y < 0) $x ++;
		else if ($x > 0 && $y < 0) {
			$x ++;
			$ring ++;
		}
	} else {
		if (abs($x) == $ring) {
			if ($x > 0) $y ++;
			else $y --;
		} else if (abs($y) == $ring) {
			if ($y > 0) $x --;
			else $x ++;
		}
	}
	
	$count ++;
	$grid[] = [
		"value" => $count,
		"x" => $x,
		"y" => $y
	];

	if ($count == $input) break;
}
echo abs($grid[sizeof($grid) - 1]["x"]) + abs($grid[sizeof($grid) - 1]["y"])."\n";