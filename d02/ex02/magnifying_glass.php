#!/usr/bin/php
<?php

function str_toupper($matches){
	return strtoupper($matches[0]);
}

function all_toupper($matches) {
	$matches = preg_replace_callback('#(?<=>)([^<]*?)(?=<)#', 'str_toupper', $matches);
	$matches = preg_replace_callback('#(?<=title=\")[\s\S]*?(?=\")#', 'str_toupper', $matches[0]);
	return($matches);
}

$file = file_get_contents($argv[1]);
$file = preg_replace_callback('#<a[ |>][\s\S]*?<\/a>#', 'all_toupper', $file);
echo ($file);
