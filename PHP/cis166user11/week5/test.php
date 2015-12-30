<?php

$host = "mysql.galast.com";
$dbName = "galast_user11";
$username = "galast_user11";
$password = "cisPW2015";

//Make Connection PHP data obj3ct
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

if($_POST['name']){
	$query = "INSERT INTO test (name, email, status) VALUES (:name, :email, :status)";
	//Prepare our sql for values?
	$exec = $conn->prepare($query);
	$exec->bindParam(":name", $_POST['name']);
	$exec->bindParam(":email", $_POST['email']);
	$exec->bindParam(":status", $_POST['status']);
	//Execute SQL insert
	$exec->execute();
}


//Query Command
$sql =  "SELECT * FROM test";
$table = "<table>";
foreach ($conn->query($sql) as $row) {
	$table .= "<tr><td>" . $row["name"] . "</td>";
	$table .= "<td>" . $row["email"] . "</td>";
	$table .= "<td>" . $row["created"] . "</td></tr>";

	print_r($row);
}
$table .= "</table>";

?>

<html>
<head>
	<title>PHP DB Development</title>
</head>
<body>

	<br></br>
	<?php echo $table ?>

	<form method ="POST">
		<p>Name:</br>
		<input type="text" name="name"/></p>
		<p>Email:</br>
		<input type="text" name="email"/></p>
		<p>Status:(0 or 1)</br>
		<input type="number" name="status"/></p>

		<p><input type="submit"/></p>


	</form>

	
</body>
</html>