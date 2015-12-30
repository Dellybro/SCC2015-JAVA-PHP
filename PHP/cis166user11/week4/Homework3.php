<?php

	$states = array('az' => "arizona",
	 				'wi' => "wisconsin",
	 				'al' => "alabama",
	 				'ak' => "arkansas",
	 				'al' => "alaska",
	 				'ca' => "california",
	 				'co' => "colorado",
	 				'ct' => "connecticut",
	 				'de' => "delaware",
	 				'fl' => "florida",
	 				'ga' => "georgia",
	 				'hi' => "hawaii",
	 				'id' => "idaho",
	 				'il' => "illinois",
	 				'in' => "indiana",
	 				'ia' => "iowa",
	 				'ks' => "kansas",
	 				'ky' => "kentucky",
	 				'la' => "louisiana",
	 				'me' => "maine",
	 				'md' => "maryland",
	 				'ma' => "massachusetts",
	 				'mi' => "michigan",
	 				'mn' => "minnesota",
	 				'ms' => "mississippi",
	 				'mo' => "missouri",
	 				'mt' => "montana",
	 				'ne' => "nebraska",
	 				'nv' => "nevada",
	 				'nj' => "newjersey",
	 				'nm' => "newmexico",
	 				'ny' => "newyork",
	 				'nc' => "northcarolina",
	 				'nd' => "northdakota",
	 				'oh' => "ohio",
	 				'ok' => "oklahoma",
	 				'or' => "oregon",
	 				'pa' => "pennsylvania",
	 				'ri' => "rhodeisland",
	 				'sc' => "southcarolina",
	 				'sd' => "southdakota",
	 				"tn" => "tennessee",
	 				'tx' => "texas",
	 				'ut' => "utah",
	 				'vt' => "vermont",
	 				'va' => "virginia",
	 				'wa' => "washington",
	 				'wv' => "westvirginia",
	 				'wy' => "wyoming");

	if($_POST["state"]){
		$finalText = strtolower(str_replace(" ", "", $_POST["state"]));
		if(in_array($finalText, $states)){
			echo "Found!";
		} else {
			echo "<p>Not found!</p>";
			foreach ($states as $key => $value) {
				if(substr($value, 0, 3) == substr($finalText, 0, 3)){
					echo "<p>Could you have meant... " . $value . "</p>";
				}
			}
		}
	}

?>

<html>
	<head>
		<title> Week 4 - Homework</title>
	</head>
	<body>
		<a href="../homepage.php"> < Back </a>
		<h1>Week 4 - Homework</h1>
		<form action="Homework3.php" method ="POST">
			<p>Enter a state full name: <br/>
				<input type="text" name="state" />
			</p>
			<p>
				<input type="submit" name="submit" value = "Go..." />
			</p>
		</form>

		</br>
		</hr>
		<p>What I added that was special was that you can enter all caps, you can enter a bunch of white spaces in between letters and it will still find your state as long as it makes a fluid sentence, and it also checks to see if you meant certain state if enough letters match up</p>

		<p>
			EX. Not found!
			<p>
			Could you have meant... newjersey
			</p>
			Could you have meant... newmexico
			<p>
			Could you have meant... newyork
			</p>
		</p>
	</body>
</html>