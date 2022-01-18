<?php
include_once "manage.php";
include_once "user.php";
session_start(); 
$user = $_SESSION["user"]->get_user();
$fin = Manager::user_changeinfo($user[0],$user[1],$user[2],$user[3],$user[4],$user[5],$user[6],$user[7],$user[8]);
session_destroy();

header("location:index.php");