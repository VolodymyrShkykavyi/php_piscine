#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$utmpx = fopen("/var/run/utmpx", 'r');
$curr_usr = get_current_user();
while (($data = fread($utmpx, 628))) {
	$tab = unpack('a256usr_name/iid/a32term_name/iprocess_id/isession_status/itimestamp/imicrosec/a256host_name/a64padding', $data);
if ($curr_usr == trim($tab['usr_name']))
    printf("%s %s %s \n", $curr_usr, trim($tab['term_name']), strftime(" %b %e %H:%M", $tab['timestamp']), trim($tab['host_name']));
}
