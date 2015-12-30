<html>


<head>
	<title>First PHP page</title>
</head>
<body>
	<p>Hello World!</p>
	<?php
		echo "<p>Hello again</p>\n";
		echo "<h2>Hello again again</h2>\n";
		$a = 4;
		echo "<p>My variable \"a\" = ".$a."</p>\n";
		$a = "Travis";
		echo "<p>My variable \"a\" = ".$a."</p>\n";

		if($a == "Tom"){
			echo "Hello Tom!\n";
		} else {
			echo "Who are you?\n";
		}

		for($a=0; $a < 5; $a++){
			echo "<p>My variable \"a\" = ".$a."</p>\n";
		}

	?>
	<!-- HTML COMMENTOÖf-->

</body>



</html>