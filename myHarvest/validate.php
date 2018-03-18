<?php
/* These are our valid username and passwords */
$user = 'admin';
$pass = 'password';

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    
    if (($_POST['username'] != $user) || ($_POST['password'] != md5($pass))) {    
        header('Location: login.php');
    } else {
        echo 'Welcome back ' . $_COOKIE['username'];
    }
    
} else {
    header('Location: login.php');
}

?>





