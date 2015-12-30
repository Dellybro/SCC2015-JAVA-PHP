<?php

session_start();

require("db.php");

$sql = "SELECT id FROM userdb WHERE username = :username AND password = :password";

$exec = $conn->prepare($sql);
$exec->bindParam(":username", $_POST["user"]);
$exec->bindParam(":password", $_POST["pass"]);

if($exec->execute() == false){
	die($exec->errorInfo()[2]);
	$_SESSION["message"] = "User name or Password incorrect";
	header("location:login.php");
}

if($exec->rowCount() > 0){
	$data = $exec->fetch(PDO::FETCH_ASSOC);

	$_SESSION["username"] = $_POST["user"];
	$_SESSION["user_id"] = $data["id"];

	$_SESSION["message"] = "Login Successful";

	
	header("location:profile.php");


}else{
	$_SESSION["message"] = "User name or Password incorrect";
	header("location:login.php");
}
