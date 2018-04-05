#!/usr/bin/php
<?php
$utmpx = file_get_contents("/var/run/utmpx");
print_r($utmpx);