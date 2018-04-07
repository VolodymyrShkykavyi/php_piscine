<?php

if ($_POST['submit'] != "OK" || !$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw']
	|| !file_exists("../private/passwd")){
	echo "ERROR\n";
	return;
}
$fd = fopen("../private/passwd", "r");
flock($fd, LOCK_EX);
$all_users = unserialize(file_get_contents("../private/passwd"));
foreach ($all_users as &$user){
	if ($user['login'] === $_POST['login']){
		if ($user['passwd'] === hash('sha256', $_POST['oldpw'])){
			$user['passwd'] = hash('sha256', $_POST['newpw']);
			$serialized = serialize($all_users);
			file_put_contents("../private/passwd", $serialized);
			flock($fd, LOCK_UN);
			fclose($fd);
			header('Location: index.html');
			echo "OK\n";
			return;
		}
		else{
			break;
		}
	}
}
flock($fd, LOCK_UN);
fclose($fd);
echo "ERROR\n";
