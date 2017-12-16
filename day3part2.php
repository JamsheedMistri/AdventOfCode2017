<?php
$input = 277678;
$ring = 1;
$grid = [
	[
		"value" => 1,
		"x" => 0,
		"y" => 0
	], 
	[
		"value" => 1,
		"x" => 1,
		"y" => 0
	]
];

while ($input > $grid[sizeof($grid) - 1]["value"]) {
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
	$sum = sumSurrounding($x, $y, $grid);
	$grid[] = [
		"value" => $sum,
		"x" => $x,
		"y" => $y
	];
}
echo $grid[sizeof($grid) - 1]["value"]."\n";


function sumSurrounding($givenX, $givenY, $grid) {
	$sum = 0;
	for ($x = $givenX - 1; $x <= $givenX + 1; $x ++) {
		for ($y = $givenY - 1; $y <= $givenY + 1; $y ++) {
			if ($x == $givenX && $y == $givenY) continue;
			for ($i = 0; $i < sizeof($grid); $i ++) {
		       if ($grid[$i]["x"] == $x && $grid[$i]["y"] == $y) {
		           $sum += $grid[$i]["value"];
		           continue;
		       }
		    }
		}
	}
	return $sum;
}