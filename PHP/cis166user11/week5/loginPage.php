
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

	function Exec($name, $pass, $user){


		$query = "INSERT INTO userdb (name, password, username) VALUES (:name, :pass, :user)";
		//Prepare our sql for values?
		$exec = $this->connection->prepare($query);
		$exec->bindParam(":name", $name);
		$exec->bindParam(":pass", $pass);
		$exec->bindParam(":user", $user);
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
	<a href="../homepage.php"> < Back </a>

	<p><h2>Login using Username and Password or Create UNIQUE username with password.<h2><p>


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

					<p><input type="submit" name="create"/></p>


				</form>
			</td>
			<td>
				<form method ="POST">
					<p>Login</p>
					<p>Username:</br>
					<input type="text" name="loginName"/></p>
					<p>Password:</br>
					<input type="text" name="loginPass"/></p>

					<p><input type="submit" name="login"/></p>

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
		if($_POST["login"]){
			$Database = new Connect();
			echo $Database->Fetch($_POST["loginName"], $_POST["loginPass"]);
		}else if($_POST["create"]){
			if($_POST["name"] && $_POST["username"] && $_POST["password"]){
				$Database = new Connect();
				echo $Database->Exec($_POST["name"], $_POST["password"], $_POST["username"]);
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