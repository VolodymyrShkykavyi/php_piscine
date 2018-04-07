<?php
function auth($login, $passwd){
	if (!$login || !$passwd || !file_exists("../private/passwd"))
		return(false);
	$fd = fopen("../private/passwd", "r");
	if (flock($fd, LOCK_EX)) {
		$all_users = unserialize(file_get_contents("../private/passwd"));
		foreach ($all_users as $user) {
			if ($user['login'] === $login) {
				flock($fd, LOCK_UN);
				fclose($fd);
				if ($user['passwd'] === hash('sha256', $passwd)) {
					return (true);
				}
				break;
			}
		}
	}
	return(false);
}