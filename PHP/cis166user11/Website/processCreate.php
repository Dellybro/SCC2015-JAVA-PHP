<?php


session_start();

if(strlen($_POST["user"]) < 1 || strlen($_POST["pass"]) < 1){

	$_SESSION["message"] = "Username and Password can not be blank";
	header("location:login.php");

}else{
	require("db.php");

	$sql = "INSERT INTO userdb (username, name, password, permissions, email, phone, gender)
				VALUES (:username, :name, :password, :permissions, :email, :phone, :gender)";
	$exec = $conn->prepare($sql);
	$exec->bindParam(":name",$_POST["name"]);
	$exec->bindParam(":username",$_POST["user"]);
	$exec->bindParam(":password",$_POST["pass"]);
	$exec->bindParam(":email",$_POST["email"]);
	$exec->bindParam(":phone",$_POST["phone"]);
	$exec->bindParam(":gender",$_POST["gender"]);
	$exec->bindParam(":permissions",$_POST["permissions"]);

	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
		$_SESSION["message"] = "Failed to create user";
		header("location:login.php");

	}else{

		$_SESSION["message"] = "User created";
		header("location:login.php");
	}
}

?>