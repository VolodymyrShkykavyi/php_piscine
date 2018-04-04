#!/usr/bin/php
<?php

function get_operation($str){
	if (strpos($str, "+") != false)
		return "+";
	if (strpos($str, "-") != false)
		return "-";
	if (strpos($str, "/") != false)
		return "/";
	if (strpos($str, "*") != false)
		return "*";
	if (strpos($str, "%") != false)
		return "%";
	return (false);
}

function ft_split($str, $delimeter) {
	$arr = explode($delimeter, trim(preg_replace('/(\s+)/',"", $str)));
	return($arr);
}

if ($argc != 2){
	echo "Incorrect Parameters\n";
	exit(0);
}
$operation = get_operation($argv[1]);
if (!$operation){
	echo "Syntax Error\n";
	exit(0);
}
$tab = ft_split($argv[1], $operation);
if (count($tab) != 2 || !is_numeric($tab[0]) || !is_numeric($tab[1])){
	echo "Syntax Error\n";
	exit(0);
}
@eval("\$result = {$tab[0]} {$operation} {$tab[1]};");
echo $result . "\n";

