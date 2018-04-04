<?php
function ft_is_sort($tab){
	$sorted_tab = $tab;
	sort($sorted_tab);
	if ($sorted_tab === $tab)
	    return(true);
	rsort($sorted_tab);
	return($sorted_tab === $tab);
}