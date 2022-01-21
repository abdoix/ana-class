<?php
include_once "manage.php";
include_once "user.php";
session_start(); 
session_destroy();

header("location:index.php");