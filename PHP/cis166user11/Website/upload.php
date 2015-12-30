<?php

	session_start();

	require("db.php");

	$photo_types = array(    
	  'image/pjpeg' => 'jpg',   
	  'image/jpeg' => 'jpg',   
	  'image/gif' => 'gif',   
	  'image/bmp' => 'bmp',   
	  'image/x-png' => 'png'   
	);

	$parts = explode(".",$_FILES["image"]["name"]);
	$newfile = $parts[0] . time() . "." . end($parts);

	if (move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$newfile)){
		$_SESSION["message"] = "<h3><a href='http://www.cis166user11.galast.com/Website/img/" . $newfile . "'> Upload Image URL</a></h3>";
	}else{
		$_SESSION["message"] = "<h3>File not uploaded</h3>";
	}

	header("location:index.php");
	