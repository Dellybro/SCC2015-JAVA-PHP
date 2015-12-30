<?php
session_start();

require("db.php");

$sql = "SELECT id FROM address WHERE 
		email = :username AND 
		phone = :password AND 
		permission = 'A'";
		
$exec = $conn->prepare($sql);
$exec->bindParam(":username",$_POST["user"]);
$exec->bindParam(":password",$_POST["pass"]);
if ($exec->execute() == FALSE)
{
	die($exec->errorInfo()[2]);
}

if ($exec->rowCount() > 0){
	$data = $exec->fetch(PDO::FETCH_ASSOC);
	// print_r($data);
	$_SESSION["username"] = $_POST["user"];
	$_SESSION["userid"] = $data["id"];	
	header("location:table.php");
}
else
{
	echo "No records found";
}

?>