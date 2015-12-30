<?php
$host = "mysql.galast.com";
$dbname = "galast_user28";
$username = "galast_user28";
$password = "cisPW2015";
$conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);

$sql = "SELECT * FROM address";
$table = "";	
$table .= "<table border='1'>";
foreach($conn->query($sql) as $row){
	$table .= "<tr><td>";
	$table .= "<img src='img/".$row["image"]."' width='20' height='20' /></td>";
	$table .= "<td>" . $row["fname"] . "</td>";	
	$table .= "<td>" . $row["lname"] . "</td>";
	$table .= "<td>" . $row["email"] . "</td>";
	$table .= "<td>" . $row["phone"] . "</td>";
	$table .= "<td>" . $row["gender"] . "</td>";
	$table .= "<td>" . $row["permission"] . "</td>";
	$table .= "<td>" . $row["lastedit"] . "</td>";
	$table .= "<td>" . $row["created"] . "</td></tr>";
}
$table .= "</table>";
?>
<html>

<html>
<body>
<p><a href="index.php">Home</a></p>
<?php echo $table; ?>
</body>
</html>