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

	$photos_uploaded = $_FILES['photo_filename'];  
	  
	  
	$photo_captions = $_POST['photo_captions'];

	$parts = explode(".",$_FILES["image"]["name"]);
	$newfile = $parts[0] . time() . "." . end($parts);
	

	$counter = 0;
	while($counter < count($photos_uploaded)){
		if($photos_uploaded['size'][$counter] > 0){
			if(!array_key_exists($photos_uploaded['type'][$counter], $photo_types)){
				$result_final .= '<p>File ' . ($counter + 1) . ' is not a working photo</p> ' . '<p>File type =
					'.$photos_uploaded['type'][$counter].'</p>';
			}else{
				// Get the filetype of the uploaded file   

				$parts = explode(".",$photos_uploaded["name"][$counter]);
				$newfile = $parts[0] . time() . "." . end($parts);
				
				if (move_uploaded_file($photos_uploaded['tmp_name'][$counter],"img/".$newfile)) 
				{
					$result_final.= '<p>File ' . ($counter+1) .' is a photo</p>';

					$sql = "INSERT INTO gallery_photos (photo_filename, photo_caption, photo_category) VALUES 
									(:pName, :pCaption, :pCategory)";

					$exec = $conn->prepare($sql);
					$exec->bindParam(":pName",$newfile);
					$exec->bindParam(":pCaption",$photo_captions[$counter]);
					$exec->bindParam(":pCategory",$_POST['category']);

					if ($exec->execute() == FALSE)
					{
						die($exec->errorInfo()[2]);
					}
				}
			}
		}
		$counter+=1;
	}

	$_SESSION['upload_message'] = $result_final;
	header("location:directory.php");

?>