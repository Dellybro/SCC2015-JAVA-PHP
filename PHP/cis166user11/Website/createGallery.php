<?php

require("db.php");

session_start();



if($_POST["gallery_name"] != ''){
	$sql = "INSERT INTO gallery_category (category_name, user_id) VALUES (:name, :id)";

	$exec = $conn->prepare($sql);
	$exec->bindParam(":name", $_POST["gallery_name"]);
	$exec->bindParam(":id", $_SESSION["user_id"]);

	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
	}

	$_SESSION["message"] = "New Gallery Added! " . $_POST["gallery_name"];

}else{
	$_SESSION["message"] = "Invalid Gallery";
}



header("location:profile.php");
?>