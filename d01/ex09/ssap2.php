#!/usr/bin/php
<?php
function ft_split($str){
	$arr = explode(" ", trim(preg_replace('/(\s+)/',' ', $str), " "));
	return(array_diff($arr, array()));
}

function ft_print_array($tab){
	foreach ($tab as $value)
		echo $value . "\n";
}

function comparisonAlphaNumber($a, $b){
	$a = strtolower($a);
	$b = strtolower($b);
	for ($i = 0; $i < strlen($a); $i++){
		if ($a[$i] != $b[$i]){
			if (is_numeric($a[$i]) && !is_numeric($b[$i]))
				return(1);
			elseif (!is_numeric($a[$i]) && is_numeric($b[$i]))
				return(-1);
			else
				return(($a[$i] > $b[$i]) ? 1 : -1);
		}
	}
	return(0);
}

$tab_alpha = array();
$tab_number = array();
$tab_other = array();

foreach (array_slice($argv, 1) as $value){
	foreach (ft_split($value) as $item){
		if (strtolower($item[0]) >= 'a' && strtolower($item[0]) <= 'z')
			$tab_alpha[] = $item;
		elseif ($item[0] >= '0' && $item[0] <= '9')
			$tab_number[] = $item;
		else
			$tab_other[] = $item;
	}
}
usort($tab_alpha, "comparisonAlphaNumber");
usort($tab_number, "comparisonAlphaNumber");
usort($tab_other, "comparisonAlphaNumber");
ft_print_array($tab_alpha);
ft_print_array($tab_number);
ft_print_array($tab_other);