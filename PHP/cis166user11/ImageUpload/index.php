<?php
if ($_POST["submit"] == "submit")
{
	require("db.php");

	//var_dump($_FILES);
	
	$parts = explode(".",$_FILES["image"]["name"]);
	$newfile = $parts[0] . time() . "." . end($parts);
	
	if (move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$newfile)) 
	{
        //echo "file uploaded";
	}
	
	$sql = "INSERT INTO userdb 
			(name, username, email, phone, 
			gender, permission, image)
			VALUES ( :fname, :lname, :email, :phone,
			:gender, :permission, :image)";
	$exec = $conn->prepare($sql);
	$exec->bindParam(":name",$_POST["fname"]);
	$exec->bindParam(":username",$_POST["lname"]);
	$exec->bindParam(":email",$_POST["email"]);
	$exec->bindParam(":phone",$_POST["phone"]);
	$exec->bindParam(":gender",$_POST["gender"]);
	$exec->bindParam(":permission",$_POST["permission"]);
	$exec->bindParam(":image",$newfile);

	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
	}

	header("location:view.php");

}
?>
<html>
<body>
<p><a href="login.php">Admin Log-in</a> | 
<a href="view.php">View Address Book</a></p>
<form action="index.php" method="POST" enctype="multipart/form-data">
<p>First Name:<br />
<input type="text" name="fname" /></p>
<p>Last Name:<br />
<input type="text" name="lname" /></p>
<p>Phone:<br />
<input type="text" name="phone" /></p>
<p>Email:<br />
<input type="text" name="email" /></p>
<p>Gender:<br />
<input type="radio" name="gender" value="M"/> MALE<br />
<input type="radio" name="gender" value="F"/> FEMALE</p>
<p>Permission:<br />
<select name="permission">
	<option value="A">Admin</option>
	<option value="V">Viewer</option>
	<option value="G">General</option>
</select>
</p>
<p>Upload your image:<br />
<input type="file" name="image" /></p>
<p><input type="submit" name="submit" value="submit" /></p>
</form>
</body>
</html>





