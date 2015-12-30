<?php

class Connect{


	var $connection;

	function Connect(){
		$host = "mysql.galast.com";
		$dbName = "galast_user11";
		$username = "galast_user11";
		$password = "cisPW2015";

		$this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
	}

	function showAll(){
		$table = "<table>";
		$query = "SELECT * FROM userdb";
		$varchild = $this->connection->query($query);

		if($varchild->rowCount() == 0){
			$table.="<tr><td><h2> Not Found </h2></td></tr>";
		}else{
			foreach ($varchild as $row) {
				$table.="<tr><h2><td>".$row["name"]."</td>";
				$table.="<td>".$row["username"]."</td></h2></tr>";
			}
		}
		$table.="</table>";

		return $table;
	}

	function remove($name, $pass){
		$query = "DELETE FROM userdb WHERE username = '$name' AND password = '$pass'";
		$exec = $this->connection->prepare($query);
		$exec->execute();

		if($exec->rowCount() == 0){
			return "<p><h2>User can't be found.</h2></p>";
		} else {
			return "<p><h2>$name has been successfully removed!</h2></p>";
		}
	}

	function Exec($name, $pass, $user, $permissions, $email, $phone){


		$query = "INSERT INTO userdb (name, password, username, permissions, email, phone) VALUES (:name, :pass, :user, :permissions, :email, :phone)";
		//Prepare our sql for values?
		$exec = $this->connection->prepare($query);
		$exec->bindParam(":name", $name);
		$exec->bindParam(":pass", $pass);
		$exec->bindParam(":user", $user);
		$exec->bindParam(":permissions", $permissions);
		$exec->bindParam(":email", $email);
		$exec->bindParam(":phone", $phone);
		//Execute SQL insert
		$var = $exec->execute();
		if(!$var){
			return "<p><h2>Username needs to be unique.</h2></p>";
		} else {
			return "<p><h2>$user has been successfully added!</h2></p>";
		}

	}

	function Fetch($username, $password){


		$table = "<table>";
		$query = "SELECT * FROM userdb WHERE username = '$username' AND password = '$password'";

		$varchild = $this->connection->query($query);


		if($varchild->rowCount() == 0){
			$table.="<tr><td><h2> Not Found </h2></td></tr>";
		}else{
			foreach ($varchild as $row) {
				$table.="<tr><h2><td>".$row["name"]."</td>";
				$table.="<td>".$row["username"]."</td></h2></tr>";
			}
		}
		$table.="</table>";

		return $table;

	}
}

?>
<head>
	<title>Login Page!</title>
	<link rel="stylesheet" type="text/css" href="week5CSS.css">
</head>
<html>
<body>
	<a href="../homepage.php"> < Back </a> | 

	<a href="LoginPage.php"> Login Page </a>

	<p><h2>Create using Username and Password or Create UNIQUE username with password.<h2><p>


	<table>
		<tr>
			<td>
				<form method ="POST">
					<p>Create User</p>
					<p>Name:</br>
					<input type="text" name="name"/></p>
					<p>Username:</br>
					<input type="text" name="username"/></p>
					<p>Password:</br>
					<input type="text" name="password"/></p>
					<p>Permissions: A or S</br>
					<input type="text" name="permissions"/></p>
					<p>Email:</br>
					<input type="text" name="email"/></p>
					<p>Phone:</br>
					<input type="text" name="phone"/></p>

					<p><input type="submit" name="create"/></p>


				</form>
			</td>
			<td>
				<form method ="POST">
					<p>Delete</p>
					<p>Username:</br>
					<input type="text" name="removeName"/></p>
					<p>Password:</br>
					<input type="text" name="removePass"/></p>

					<p><input type="submit" name="delete"/></p>

				</form>
			</td>
			<td>
				<form method="GET">
					<p><input type="submit" name="showAll" value="Show All"/></p>
				</form>
			</td>
			<td>
		</tr>
	</table>

	<?php
		if($_POST["create"]){
			if($_POST["name"] && $_POST["username"] && $_POST["password"] && $_POST["permissions"] && $_POST["email"] && $_POST["phone"]){
				$Database = new Connect();
				echo $Database->Exec($_POST["name"], $_POST["password"], $_POST["username"], $_POST["permissions"], $_POST["email"], $_POST["phone"]);
			} else {
				echo "Fill out the fields";
			}
		}else if($_POST["delete"]){
			$Database = new Connect();
			echo $Database->remove($_POST["removeName"], $_POST["removePass"]);
		}else if($_GET["showAll"]){
			$Database = new Connect();
			echo $Database->showAll();
		}
	?>
</body>
</html>