<?php

session_start();

if(!(isset($_SESSION))){
	header("location:login.php");
}

require("db.php");

if($_POST["submit"] == "submit"){


}else{
	//$id = $_GET["id"];

	$sql = "SELECT * FROM userdb WHERE id = :id";
	$exec = $conn->prepare($sql);
	$exec->bindParam(":id", $_GET["id"]);
	if($exec->execute() == false)
	{
		die($exec->errorInfo()[2]);
	} else {
		$data = $exec->fetch(PDO::FETCH_ASSOC);
		//print_r($data);

	}
}

?>
<html>
<body>
	<p><a href="Logout.php">Admin Log-out</a></p> |
	<a href="table.php"> View Address Book</a></p>
	<table>
		<tr>
			<td>
				<form method ="POST">
					<p>Edit User</p>
					<p>Name:</br>
					<input type="text" name="name" value ="<?php echo $data["name"] ?>"/></p>
					<p>Username:</br>
					<input type="text" name="username" value ="<?php echo $data["username"] ?>"/></p>
					<p>Permissions: A or S</br>
					<input type="text" name="permissions" value ="<?php echo $data["permissions"] ?>"/></p>
					<p>Email:</br>
					<input type="text" name="email" value ="<?php echo $data["email"] ?>"/></p>
					<p>Phone:</br>
					<input type="text" name="phone" value ="<?php echo $data["phone"] ?>"/></p>

					<p><input type="submit" name="create"/></p>

				</form>
			</td>
		</tr>
	</tabl>
</body>
</body>