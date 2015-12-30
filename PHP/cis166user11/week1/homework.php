<a href="../homepage.php"> < Back </a>

<?php 
	if ($_POST["number"]){
		if($_POST["number"] > 100){
			$a = "TOO HIGH";
		} elseif($_POST["number"] < 100){
			$a = "TOO LOW";
		} elseif($_POST["number"] == 100){
			$a = "CORRECT!";
		}

	}
?>

<html>
<head>
	<title>My form page</title>
</head>
<body>

	<div style="background-color:rgba(204,255,204,0.8); color:gray; padding:20px;">
		<h1>Homework1</h1>
		<h2>Creator: Travis Delly</h2>
		<?php echo $a ?>
		<form id="myform" method="POST" >
			<p>Guess my number</p>
			<p><input type="text" name="number"/></p>
			<p><input type="submit" /></p>
		</form>
	</div>

</body>
</html>