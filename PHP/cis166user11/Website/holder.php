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
	$result_final.= '<p>File ' . ($counter+1) .' is a photo</p>';

	$sql = "INSERT INTO gallery_photos (photo_filename, photo_caption, photo_category) VALUES 
					(:pName, :pCaption, :pCategory)";

	$exec = $conn->prepare($sql);
	$exec->bindParam(":pName",$newfile);
	$exec->bindParam(":pCaption",$_POST["photo_captions"]);
	$exec->bindParam(":pCategory",$_POST['category']);

	if ($exec->execute() == FALSE)
	{
		die($exec->errorInfo()[2]);
	}else{
		$result_final .= "<p>File uploaded Successfully</p>";
	}
}else{
	$result_final = "<h3>File not uploaded</h3>";
}
$_SESSION["message"] = $result_final;
header("location:profile.php");