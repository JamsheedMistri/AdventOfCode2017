<?php
$input = "14	0	15	12	11	11	3	5	1	6	8	4	9	1	8	4";
$inputs = array($input);

while (true) {
	$arr = explode("\t", $inputs[sizeof($inputs) - 1]);
	for ($i = 0; $i < sizeof($arr); $i ++) $arr[$i] = (int)$arr[$i];
	$maxValue = max($arr);
	for ($i = 0; $i < sizeof($arr); $i ++) if ($arr[$i] == $maxValue) {
		$maxIndex = $i;
		break;
	}
	$arr[$maxIndex] = 0;

	$index = $maxIndex + 1;

	while ($maxValue > 0) {
		if ($index == sizeof($arr)) $index = 0;
		$arr[$index] ++;
		$maxValue --;
		$index ++;
	}

	array_push($inputs, implode("\t", $arr));

	for ($i = 0; $i < sizeof($inputs) - 1; $i ++) if ($inputs[sizeof($inputs) - 1] == $inputs[$i]) {
		echo ((sizeof($inputs) - 1) - $i)."\n";
		break 2;
	}
}