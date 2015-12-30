<?php

require("db.php");

session_start();



if($_POST["gallery_name"] != ''){
	$sql = "INSERT INTO gallery_category (category_name) VALUES (:name)";

	$exec = $conn->prepare($sql);
	$exec->bindParam(":name", $_POST["gallery_name"]);

	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
	}

	$_SESSION["upload_message"] = "New Gallery Added! " . $_POST["gallery_name"];

}else{
	$_SESSION["upload_message"] = "Invalid Gallery";
}



header("location:directory.php");
?>