<?php

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] != "OK"){
    echo "ERROR\n";
}
else{
    if (!file_exists("../private")){
        mkdir("../private", 0777);
    }
    if (file_exists("../private/passwd")){
        $all_users = unserialize(file_get_contents("../private/passwd"));
    }
    else{
        $all_users = [];
    }
    foreach ($all_users as $user){
        if ($user['login'] === $_POST['login']){
            echo "ERROR\n";
            return;
        }
    }
    $user = [
        'login' => $_POST['login'],
        'passwd' => hash('sha256', $_POST['passwd'])
    ];
    $all_users[] = $user;
    $serialized = serialize($all_users);
    file_put_contents("../private/passwd", $serialized);
    echo "OK\n";
}
