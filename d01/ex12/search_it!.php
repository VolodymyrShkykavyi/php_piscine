#!/usr/bin/php
<?php
if ($argc < 3)
	exit(0);
$key = $argv[1];
foreach (array_reverse(array_slice($argv, 2)) as $value){
	$tmp = explode(':', $value);
	if ($tmp[0] === $key){
		echo $tmp[1] . "\n";
		break;
	}
}