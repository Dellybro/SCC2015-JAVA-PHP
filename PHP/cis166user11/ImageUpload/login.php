<?php
session_start();
 
if ((isset($_SESSION) && $_SESSION["userid"] > 0))
{
	header("location:table.php");
}
?>
<html>
<body>
<p><a href="index.php">Home</a></p>
<form action="process.php" method="POST">
<p>Email:<br />
<input type="text" name="user" /></p>
<p>Phone:<br />
<input type="text" name="pass" /></p>
<p><input type="submit" name="submit" /></p>
</form>
</body>
</html>