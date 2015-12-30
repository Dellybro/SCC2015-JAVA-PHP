<html>
<head>
	<title>Calculate!</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method: "GET" style="height:500px">
		<a href="../homepage.php"> < Back </a>
		<p><h1>Delly Calculator</h1></p>
		<p><h1>Homework #2</h2></p>
		<p><input type = "text" name="num_one" value="0"><h4>X</h4></input></br></p>
		<p><input type ="text" name="num_two" value="0"><h4>Y</h4></input></br></p>
		<input type = "submit" name ="function" value="+"></input>
		<input type = "submit" name = "function" value="-"></input>
		<input type = "submit" name = "function" value="*"></input>
		<input type = "submit" name = "function" value ="/"></input>
		<input type = "submit" name = "function" value ="^"></input>

		</br></br>
		<p><h2>Output of Arithmetic</h2></p>
		<?php
		if(is_numeric($_GET["num_one"]) && is_numeric($_GET["num_two"])){
			if($_GET["num_one"] >= 0 && $_GET["num_two"] >= 0){
				if(isset($_GET["function"])){
					returnResult($_GET["num_one"], $_GET["num_two"], $_GET["function"]);
				}else{
					echo "<h3>Not available yet?</h3>";
				}
			} else {
				echo "<h3>No Negatives!!</p><h3>"; 
			}
		} else { echo "Enter Numeric numbers.";}

		function returnResult($var1, $var2, $operand){
			switch ($operand) {
				case '+':
					$result = $var1 + $var2;
					echo "<h3>$var1 + $var2 = $result</h3>";
					break;
				case '-':
					$result = $var1 - $var2;
					echo "<h3> $var1 - $var2 = $result</h3>";
					break;
				case '*':
					$result = $var1 * $var2;
					echo "<h3>$var1 * $var2 = $result</h3>";
					break;
				case '/':
					if($var2 == 0){
						echo "Can not divide by 0";
					}else{
						$result = $var1 / $var2;
						echo "<h3>$var1 / $var2 = $result</h3>";
					}
					break;
				case '^':
					$result = pow($var1, $var2);
					echo "<h3>$var1 power of $var2 = $result";
					break;
				default:
					echo "<h3>Operand does not exist in Database</h3>";
					break;
			}
		}

		?>

	</form>
</body>
</html>