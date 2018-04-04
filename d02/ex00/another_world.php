#!/usr/bin/php
<?php
if ($argc == 1)
    exit(0);
$argv[1] = trim(preg_replace('/( |\t)+/', ' ', $argv[1]), " ");
echo $argv[1] . "\n";