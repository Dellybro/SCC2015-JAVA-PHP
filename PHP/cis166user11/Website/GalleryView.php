<html>
<head>
	<title>Image Gallery of Week 9</title>
</head>
<body>
	<p>
		<h2><?php echo $_GET['name'] ?> Gallery</h2>
	</p>
	<p>
		<a href="profile.php"> < Go back </a>
	</p>

	<?php
		require("db.php");

		$sql = "SELECT * FROM gallery_photos";
		$table = "";	
		$table .= "<table border='1'>";
		foreach($conn->query($sql) as $row){
			if($row['photo_category'] == $_GET['category']){
				$table .= "<tr><td>";
				$table .= $row["photo_caption"];
				$table .= "<img src='img/".$row["photo_filename"]."' width='100' height='100' /></td>";
				$table .= "</td></tr>";
			}
		}
		$table .= "</table>";

		echo $table;

	?>
	

</body>
</html>