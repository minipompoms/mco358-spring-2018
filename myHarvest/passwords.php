<?php 
session_status();
$USERS["admin"] = "password";
$USERS["user1"] = "password1";
$USERS["user2"] = "password2";
$USERS["user3"] = "password3";
$user = admin;
$pass = password;

function check_logged(){
    global $_SESSION, $USERS;
    if (!array_key_exists($_SESSION["logged"], $USERS)) {
       header('Location: login.php');
    };
};