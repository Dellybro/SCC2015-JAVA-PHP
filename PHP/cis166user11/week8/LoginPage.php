<?php

session_start();

if((isset($_SESSION) && $_SESSION["user_id"] > 0)){
	header("location:table.php");
} else if ($_SESSION["error"]){
	echo $_SESSION["error"];
}

?>

<html>
<body>
	<a href="../homepage.php"> < Back </a>

	<p><a href="index.php">Home</a></p>

	<form action="process.php" method="POST">
		<p>Username:<br />
			<input type="text" name="user" />
		</p>
		<p>Password:<br />
			<input type="text" name="pass" />
		</p>
		<p><input type="submit" name="submit" /></p>
	</form>
</body>
</html>