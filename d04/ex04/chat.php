<?php
session_start();
if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != "" && file_exists('../private/chat'))
{
	$chat = unserialize(file_get_contents('../private/chat'));
	foreach ($chat as $item)
		echo "[" . date('H:i', $item['time']) . "] <b>" . $item['login'] . "</b>: " . $item['msg'] . "<br />";
}
else
	echo "ERROR\n";
?>