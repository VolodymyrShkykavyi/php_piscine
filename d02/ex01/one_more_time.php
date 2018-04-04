#!/usr/bin/php
<?php
function ft_replace_day(&$str){
    $str = preg_replace('/^[Ll]undi/', 'Monday', $str);
	$str = preg_replace('/^[Mm]ardi/', 'Tuesday', $str);
	$str = preg_replace('/^[Mm]ercredi/', 'Wednesday', $str);
	$str = preg_replace('/^[Jj]eudi/', 'Thursday', $str);
	$str = preg_replace('/^[Vv]endredi/', 'Friday', $str);
	$str = preg_replace('/^[Ss]amedi/', 'Saturday', $str);
	$str = preg_replace('/^[Dd]imanche/', 'Sunday', $str);
}

function ft_replace_month(&$str){
    $str = preg_replace('/(?<= )[Jj]anvier(?= )/', 'January', $str);
	$str = preg_replace('/(?<= )[Ff]évrier(?= )/', 'February', $str);
	$str = preg_replace('/(?<= )[Mm]ars(?= )/', 'March', $str);
	$str = preg_replace('/(?<= )[Aa]vril(?= )/', 'April', $str);
	$str = preg_replace('/(?<= )[Mm]ai(?= )/', 'May', $str);
	$str = preg_replace('/(?<= )[Jj]uin(?= )/', 'June', $str);
	$str = preg_replace('/(?<= )[Jj]uillet(?= )/', 'July', $str);
	$str = preg_replace('/(?<= )[Aa]oût(?= )/', 'August', $str);
	$str = preg_replace('/(?<= )[Ss]eptembre(?= )/', 'September', $str);
	$str = preg_replace('/(?<= )[Oo]ctobre(?= )/', 'October', $str);
	$str = preg_replace('/(?<= )[Nn]ovembre(?= )/', 'November', $str);
	$str = preg_replace('/(?<= )[Dd]écembre(?= )/', 'December', $str);
}

if ($argc != 2)
    exit(0);
date_default_timezone_set('Europe/Paris');
$pattern = '/^[A-Za-zÀ-ÿ][a-zà-ÿ]* [0-9]{1,2} [A-Za-zÀ-ÿ][a-zà-ÿ]* [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/';
if (!preg_match($pattern, $argv[1])){
	echo "Wrong Format\n";
	exit(0);
}
ft_replace_day($argv[1]);
ft_replace_month($argv[1]);
$time = strtotime($argv[1]);
if ($time)
    echo $time . "\n";
