#!/usr/bin/php
<?php
if ($argc != 4){
	echo "Incorrect Parameters\n";
	exit(0);
}
$result = 0;
@eval("\$result = {$argv[1]} {$argv[2]} {$argv[3]};");
echo $result . "\n";