<?php
session_start();
if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != "" && file_exists('../private/chat'))
{
    $fd = fopen("../private/chat", "r");
    flock($fd, LOCK_EX);
	$chat = unserialize(file_get_contents('../private/chat'));
	flock($fd, LOCK_UN);
	fclose($fd);
	foreach ($chat as $item)
		echo "[" . date('H:i', $item['time']) . "] <b>{$item['login']}</b>: {$item['msg']}<br />\n";
}
else
	echo "ERROR\n";
?>