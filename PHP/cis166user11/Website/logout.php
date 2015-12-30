<?php

session_start();

$_SESSION["username"] = null;
$_SESSION["user_id"] = null;

session_unset();

$_SESSION["message"] = "Logout Successful";

header("location:index.php");