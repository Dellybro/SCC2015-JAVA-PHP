<?php

	$array = array("az", "mn", "mi");
	array_push($array, "wi", "ok");
	sort($array);
	print_r($array);


	$simpsons = array('mom' => "Marge",
	 					'dad'=> "Homer",
	 					'sister' => "BEATRICE");

	print_r($simpsons);


	if($_POST["something"]){
		print_r($_POST);

		echo test($_POST["something"]);
	}

	function test($test){
		return "You entered" . $test;
	}

?>



<html>
	<head>
		<title> Week 4 - Arrays </title>
	</head>
	<body>
		<h1>Week 4 - Arrays</h1>
		<form action="index.php" method ="POST">
			<p>Enter something: <br/>
				<input type="text" name="something" />
			</p>
			<p>EnterSomethingELSEBRO: <br/>
				<input type="text" name="something2" />
			</p>
			<p>
				<input type="submit" name="submit" value = "Go..." />
			</p>
		</form>
	</body>
</html>