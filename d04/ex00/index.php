<?php
session_start();
if ($_GET['submit'] == 'OK' && $_GET['login'] && $_GET['passwd']){
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
    var_dump($_GET);
    var_dump($_SESSION);
}

?>
<html><body>
<form method="get">
Username: <input type="text" name="login" value="<?php echo $_SESSION['login'];?>" />
<br />
Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
<input type="submit" value="OK" />
</form>
</body></html>