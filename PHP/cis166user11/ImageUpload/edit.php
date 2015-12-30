<?php
session_start();
 
if (!(isset($_SESSION) && $_SESSION["userid"] > 0))
{
	header("location:login.php");
}

require("db.php");

if ($_POST["submit"] == "submit")
{
	$sql = "UPDATE userdb SET 
			fname = :fname, lname = :lname, 
			email = :email, phone = :phone, 
			gender = :gender, permission = :permission,
			lastedit = '1/1/1900' WHERE id = :id";
	$exec = $conn->prepare($sql);
	$exec->bindParam(":fname",$_POST["fname"]);
	$exec->bindParam(":lname",$_POST["lname"]);
	$exec->bindParam(":email",$_POST["email"]);
	$exec->bindParam(":phone",$_POST["phone"]);
	$exec->bindParam(":gender",$_POST["gender"]);
	$exec->bindParam(":permission",$_POST["permission"]);
	$exec->bindParam(":id",$_POST["id"]);
	
	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
	}

	header("location:view.php");
}
else {
	$sql = "SELECT * FROM address WHERE 
			id = :id";		
	$exec = $conn->prepare($sql);
	$exec->bindParam(":id",$_GET["id"]);
	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
	}	
	$data = $exec->fetch(PDO::FETCH_ASSOC);
}

function checkGender($value, $user) {
	if ($value == $user)
		return "checked";
	return null;
}
function checkA($value, $user) {
	if ($value == $user)
		return "selected";
	return null;
}
?>
<html>
<body>
<p><a href="logout.php">Admin Log-out</a> | 
<a href="table.php">View Address Book</a></p>
<form action="edit.php" method="POST">
<input type="hidden" name="id" value="<?php echo $data["id"]; ?>" />
<p>First Name:<br />
<input type="text" name="fname" value="<?php echo $data["fname"]; ?>" /></p>
<p>Last Name:<br />
<input type="text" name="lname" value="<?php echo $data["lname"]; ?>" /></p>
<p>Phone:<br />
<input type="text" name="phone" value="<?php echo $data["phone"]; ?>" /></p>
<p>Email:<br />
<input type="text" name="email" value="<?php echo $data["email"]; ?>" /></p>
<p>Gender:<br />
<input type="radio" name="gender" value="M" <?php echo checkGender("M", $data["gender"]); ?> /> MALE<br />
<input type="radio" name="gender" value="F" <?php echo checkGender("F", $data["gender"]); ?> /> FEMALE</p>
<p>Permission:<br />
<select name="permission">
	<option value="A" <?php echo checkA("A", $data["permission"]); ?>>Admin</option>
	<option value="V" <?php echo checkA("V", $data["permission"]); ?>>Viewer</option>
	<option value="G" <?php echo checkA("G", $data["permission"]); ?>>General</option>
</select>
</p>
<p><input type="submit" name="submit" value="submit" /></p>
</form>
</body>
</html>