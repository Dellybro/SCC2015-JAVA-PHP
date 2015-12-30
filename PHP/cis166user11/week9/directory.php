<?php
	require("db.php");
	$photo_category_list2 = array();

	session_start();

	if($_SESSION['upload_message'] != ''){
		$message = "MESSAGE: " . $_SESSION['upload_message'];
		$_SESSION['upload_message'] = '';
	}

	$sql = ('SELECT category_id,category_name FROM gallery_category');
	$exec = $conn->prepare($sql);
	$exec->execute();
	foreach ($conn->query($sql) as $row){
		$photo_category_list2[$row[0]] = $row[1];
		$photo_category_list .= "<option value=".$row[0].">".$row[1]."</option>n";
	}
?>

<html>

<head>
<title>Directory</title>

<link rel="stylesheet" type="text/css" href="custom.css">

</head>
<body>

	<div id="header">
		<h3><a href="../homepage.php">Go home</a></h3>
		<h1>Super Awesome Gallery</h1>
	</div>

	<div id="nav">
		<?php
			foreach($photo_category_list2 as $key => $value){
				echo "<p><a href='imageGallery.php?category=".$key."&name=".$value."'>".$value."</a><p><br>";
			}
		?>
	</div>


	<div id="section">
		<?php echo $message ?>

		<p><h2>Upload Image to Gallery.</h2></p>
		<p><h3>(2 at a time is allowed)</h3></p>
		<table width = '90%' border ='0' align='center' style='width: 90%;'>
			<form enctype='multipart/form-data' action='upload.php' name='upload_form' method='POST'>
				<tr>
					<td>
						<h5>Image Gallery Selected For Upload: </h5>
					</td>
					<td style="padding-bottom:15px">
						<select name='category' >
							<?php echo $photo_category_list ?>
						</select>
					</td>
				</tr>
				<?php

					for ($i = 1; $i <= 2 ; $i++) {
				    	echo "<tr><td>  
								Photo {$counter}:  
								<input name='photo_filename[]' type='file' />  
							</td>  
							<td>  
								Caption:  
								<textarea name='photo_captions[]'' cols='30' rows='1'></textarea>  
							</td></tr>";
					}
				?>
				<td style="padding-top:15px">
					<input type='submit' name='submit' value='Add Photos'/>
				</td></tr>
			</form>
			<form action="createGallery.php" name="create" method="POST">
				<tr><td>
					<h2>Create New Gallery</h2>
					Gallery Name: <input name="gallery_name" type="text"><br>
					<input type="submit" value="Make new Gallery!">
				</tr></td>
			</form>
		</table>
	</div>

	<div id="footer">
		Copyright Travis Delly
	</div>


</body>
</html>
