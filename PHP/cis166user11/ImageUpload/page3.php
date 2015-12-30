<?php
session_start();
if ($_SESSION["name"] != "robA")
{
	header("location:page1.php");
}	

?>
<html>

<body>
<h1>YESSSSS!!!!</h1>
<p><a href="page1.php">Page1</a></p>
</body>
</html>