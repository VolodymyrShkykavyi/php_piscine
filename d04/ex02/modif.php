<?php
if ($_POST['submit'] != "OK" || !$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw']
    || !file_exists("../ex01/private/passwd")){
    echo "ERROR\n";
    return;
}
