<?php

if ($_POST['submit'] != "OK" || !$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw']
    || !file_exists("../ex01/private/passwd")){
    echo "ERROR\n";
    return;
}
$all_users = unserialize(file_get_contents("../ex01/private/passwd"));
foreach ($all_users as &$user){
	if ($user['login'] === $_POST['login']){
		if ($user['passwd'] === hash('sha256', $_POST['oldpw'])){
			$user['passwd'] = hash('sha256', $_POST['newpw']);
			echo "OK\n";
			$serialized = serialize($all_users);
			file_put_contents("private/passwd", $serialized);
			return;
		}
		else{
			break;
		}
	}
}
echo "ERROR\n";
