#!/usr/bin/php
<?php

function ft_print_error(){
    echo "Wrong Format\n";
    exit(0);
}

function ft_replace_day(){

}

function ft_replace_month(){

}
$tab_date = explode(' ', $argv[1]);
if (count($tab_date) != 5)
    ft_print_error();



echo strtotime("tuesday 12 November 2013 12:02:21") . "\n";