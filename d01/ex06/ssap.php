#!/usr/bin/php
<?php
function ft_split($str) {
	$arr = explode(" ", trim(preg_replace('/(\s+)/',' ', $str)));
	return(array_diff($arr, array()));
}

$result = array();
foreach (array_slice($argv, 1) as $value){
	$result = array_merge($result, ft_split($value));
}
sort($result);
foreach ($result as $value)
	echo $value . "\n";