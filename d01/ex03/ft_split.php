<?php
function ft_split($str) {
	$arr = explode(" ", trim(preg_replace('/( +)/',' ', $str), " "));
	sort($arr);
	return(array_filter($arr));
}