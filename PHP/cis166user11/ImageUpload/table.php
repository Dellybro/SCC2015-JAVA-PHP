<?php
session_start();
 
if (!(isset($_SESSION) && $_SESSION["userid"] > 0))
{
	header("location:login.php");
}

require("db.php");

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
	$table .= "<td>" . $row["created"] . "</td>";
	$table .= "<td><a href='edit.php?id=".$row["id"]."'>edit</a></td></tr>";
}
$table .= "</table>";
?>
<html>

<html>
<body>
<p><a href="index.php">Home</a> | 
	<a href="logout.php">Log-out</a></p>
<?php echo $table; ?>
</body>
</html>