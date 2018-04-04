#!/usr/bin/php
<?php

if ($argc > 1)
{
	$argv[1] = trim($argv[1], " ");
	$arr = array_diff(explode(' ', preg_replace("/( +)/", ' ', $argv[1])), array());
	$firstWord = array_shift($arr);
	foreach ($arr as $value){
		echo $value . ' ';
	}
	if ($firstWord)
		echo $firstWord . "\n";
}