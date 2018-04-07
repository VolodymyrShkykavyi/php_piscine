<?php
require_once ("auth.php");

session_start();
if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd'])){
	$_SESSION['loggued_on_user'] = $_GET['login'];
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
</body>
</html>
<?php
}
else{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
	header('Location: index.html');
}