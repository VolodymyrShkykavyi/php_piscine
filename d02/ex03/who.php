#!/usr/bin/php
<?php
$utmpx = fopen("/var/run/utmpx", 'r');
$curr_usr = get_current_user();
print_r($curr_usr);
//iid->a4id
while (($data = fread($utmpx, 628))) {
	$tab = unpack('a256usr_name/iid/a32term_name/iprocess_id/isession_status/itimestamp/imicrosec/a256host_name/a64padding', $data);
if ($curr_usr == trim($tab['usr_name']))
	echo "$curr_usr\t";
//print_r($tab);
}
/*
foreach ($sub as $value) {
$tab = unpack('a256usr_name/i4id/a32term_name/i4process_id/i4session_status/i4timestamp/i4microsec/a256host_name', $value);
print_r($tab);
}
*/