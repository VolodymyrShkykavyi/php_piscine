#!/usr/bin/php
<?php
if ($argc != 2){
    echo "Incorrect Parameters\n";
    exit(0);
}
$argv[1] = trim(preg_replace('/( +)/', "", $argv[1]), " ");
$pattern = '/^(\+|\-){0,1}[0-9]*(\+|\-|\*|\/|\%)(\+|\-){0,1}[0-9]*$/';

if (preg_match($pattern, $argv[1])) {
    $argv[1] = preg_replace('/(\-\-)/', '- -', $argv[1]);
    $argv[1] = preg_replace('/(\+\+)/', '+ +', $argv[1]);
    @eval("\$res = {$argv[1]};");
    if (is_nan($res))
        echo "Syntax Error\n";
    else
        echo $res . "\n";
} else
    echo "Syntax Error\n";