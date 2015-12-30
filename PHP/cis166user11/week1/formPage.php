<?php 
	if ($_POST["name"]){
		$a = "<p>Hello " . $_POST["name"] . "</p>\n";

	}
?>

<html>
<head>
	<title>My form page</title>
</head>
<body>

	<h1>My Form</h1>
	<?php 
		echo $a
	?>
	<form id="myform" method="POST" action="formPage.php">
		<p>Enter your name:</p>
		<p><input type="text" name="name"/></p>
		<p><input type="submit" /></p>
	</form>

</body>
</html>