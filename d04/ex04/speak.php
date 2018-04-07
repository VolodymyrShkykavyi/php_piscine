<?php
session_start();
if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != ""){
	if ($_POST['msg']){
		if (!file_exists('../private/chat')) {
            @mkdir('../private');
        }
        $fd = fopen("../private/chat", "w");
        flock($fd, LOCK_EX);
		$chat = unserialize(file_get_contents('../private/chat'));
		$chat[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
		file_put_contents('../private/chat', serialize($chat));
		flock($fd, LOCK_UN);
		fclose($fd);
	}
?>
	<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
	<form action="speak.php" method="post">
		<input type="text" name="msg" value="" />
		<input type="submit" name="submit" value="say" />
	</form>
	</body>
	</html>
<?php
} else {
    echo "ERROR\n";
}
?>