<?php

session_start();

if(!(isset($_SESSION))){
	header("location:login.php");
}

require("db.php");

print_r($_SESSION);



$sql = "SELECT * FROM userdb";
$table = "";
$table .="<table border='1'";
foreach($conn->query($sql) as $row){
	$table .= "<tr><td>" . $row["username"] . "</td>";
	$table .= "<td>" . $row["name"] . "</td>";
	$table .= "<td>" . $row["email"] . "</td>";
	$table .= "<td>" . $row["phone"] . "</td>";
	$table .= "<td>" . $row["permissions"] . "</td>";
	$table .= "<td>" . $row["created"] . "</td>";
	$table .= "<td><a href='edit.php?id=" . $row["id"] . "'>edit</a></td></tr>";
}
$table.="</table>";

?>

<html>
<body>
	<a href="../homepage.php"> < Back </a>

	<a href="index.php"> Home </a> | <a href="Logout.php">Log-out</a></p>

	<p> <?php echo $table ?> </p>
</body>
</html>