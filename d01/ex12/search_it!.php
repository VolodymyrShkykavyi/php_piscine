#!/usr/bin/php
<?php
if ($argc < 3)
	exit(0);
$pattern = $argv[1];
$pattern = "/" . $pattern . ":/";
foreach (array_reverse(array_slice($argv, 2)) as $value){
    if (preg_match($pattern, $value)){
        echo substr($value, strlen($pattern) - 3) . "\n";
        break;
    }
}