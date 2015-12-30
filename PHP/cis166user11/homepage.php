<?php
	require($DOCUMENT_ROOT . "navBar.php");
	if($_POST["message"]){
		$message = $_POST["message"] . "<h4 class=\"Center-Class\">Messages are currently not working. Will work on soon</h4>";
	}

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="custom.css">
	<title>Travis' Homepage</title>
</head>

<body>

	<div class="Center-Class">
		<p><h2>HomeWork Assignments</h2></p>
		<p><a href="week1/homework.php">Homework #1</a></p>
		<p><a href="week2/calc.php">Homework #2 (With Teachers Code)</a></p>
		<p><a href="week2/calculator.php">Homework #2 (With my Code)</a></p>
		<p><a href="week2/calc3.php">Homework #2 (refactored)</a></p>
		<p><a href="week4/Homework3.php">Homework #3</a></p>
		<p><a href="week5/loginPage.php">Homework #4</a></p>

		<p><a href="week7/page1.php">Homework #5 - Page1</a></p>
		<p><a href="week7/page2.php">Homework #5 - Page2</a></p>
		<p><a href="week9/directory.php">Homework #6 - Gallery</a></p>
	</div>
	<h3 class="Center-Class">Message me!</h3>
	<form class="Center-Class" method="POST">
		<p><input type="text" name="message"/></p>
		<p><input type="submit"/></p>
	</form>
	<h4 class ="Center-Class"><?php echo $message?></h4>

</body>
</html>