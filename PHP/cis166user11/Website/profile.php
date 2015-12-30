<?php

session_start();

if($_SESSION["user_id"] == ''){
	$_SESSION["message"] = "Redirected to Homepage";
	header("location:index.php");
}else{

	require("db.php");

	$sql = "SELECT * FROM userdb WHERE id = :user_id";
	$exec = $conn->prepare($sql);
	$exec->bindParam(":user_id", $_SESSION["user_id"]);

	if($exec->execute() == false){
		die($exec->errorInfo()[2]);
		$_SESSION["message"] = "Error Please Re-Login";
		header("location:login.php");
	}

	if($exec->rowCount() > 0){
		$data = $exec->fetch(PDO::FETCH_ASSOC);

		$gallery_sql = 'SELECT category_id,category_name FROM gallery_category WHERE user_id = :user_id';
		$gallery_exec = $conn->prepare($gallery_sql);
		$gallery_exec->bindParam(":user_id", $data["id"]);
		$gallery_exec->execute();
		$result = $gallery_exec->fetchAll();
    if(count($result) > 0){
		  foreach ($result as $row){
			 $photo_category_keys[$row[0]] = $row[1];
			 $photo_category_list .= "<option value=".$row[0].">".$row[1]."</option>n";
		  }
    }

	}else{
		die($exec->errorInfo()[2]);
		$_SESSION["message"] = "Error occured re-login";
		header("location:login.php");	
	}
}

if($_SESSION["message"] != ''){
	$sessionMessage = $_SESSION["message"];
	$_SESSION["message"] = null;
}



?>

<html>
<head>
	<title>Profile</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  	<link rel="STYLESHEET" href="style.css" type="text/css">
</head>
<body>
	<?php include("top.php"); ?>

	<div id="nav">
		<p>Current Galleries</p>
		<?php
      if(count($photo_category_keys) > 0){
			 foreach($photo_category_keys as $key => $value){
			   	echo "<p><a href='GalleryView.php?category=".$key."&name=".$value."'>".$value."</a><p><br>";
			  }
      }
			echo "<p border-top='1px'><a href='logout.php'>Logout</a></p>";
		?>
	</div>

	<div id="navRight">
	</div>

	<div id="section" align="center">
        <div align="center">
          <?php echo $sessionMessage; ?>
          <br>
            <table width="549" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" height="1" bgcolor="AAAAAA"></td>
                <td width="5" height="1" bgcolor="FFFFFF"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp;Galleries</td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" height="4" bgcolor="FFFFFF"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0" height="23"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td colspan="2" height="1" bgcolor="AAAAAA"></td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td colspan="2" bgcolor="FFFFFF">
                  <table width="542" border="0" cellpadding="17" cellspacing="0">
                    <tr>
                      <td style="color:999999;line-height:1.6em">
                        <div align="justify">
                         	<form action="createGallery.php" name="create" method="POST">
            								<h2>Create New Gallery</h2>
            								Gallery Name: <input name="gallery_name" type="text"><br>
            								<input type="submit" value="Make new Gallery!">
            							</form>
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td colspan="2" height="1" bgcolor="AAAAAA"></td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0"></td>
              </tr>
              <tr>
                <td width="1" height="5" bgcolor="FFFFFF"></td>
                <td width="4" height="5" bgcolor="FFFFFF"></td>
                <td width="538" height="5" bgcolor="F0F0F0"></td>
                <td width="1" height="5" bgcolor="F0F0F0"></td>
                <td width="5" height="5" bgcolor="F0F0F0"></td>
              </tr>
            </table>
            <span style="font-size:6px"><br></span>
        </div>

        <div align="center">
          <br>
            <table width="549" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" height="1" bgcolor="AAAAAA"></td>
                <td width="5" height="1" bgcolor="FFFFFF"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp;Uploads</td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" height="4" bgcolor="FFFFFF"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0" height="23"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td colspan="2" height="1" bgcolor="AAAAAA"></td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td colspan="2" bgcolor="FFFFFF">
                  <table width="542" border="0" cellpadding="17" cellspacing="0">
                    <tr>
                      <td style="color:999999;line-height:1.6em">
                        <div align="justify">
                          
							<table border ='0' align='center'>
								<form enctype='multipart/form-data' action=<?php echo "holder.php?id=".$data["id"] ?> name='upload_form' method='POST'>
									<tr>
										<td>
											<h5>Image Gallery Selected For Upload: </h5>
                      <h5>PNG does not work, use jpeg.</h5>
										</td>
										<td style="padding-bottom:15px">
											<select name='category' >
												<?php echo $photo_category_list ?>
											</select>
										</td>
									</tr>
									<?php
										for ($i = 1; $i <= 1 ; $i++) {
									    	echo "<tr><td>  
													Photo {$counter}:  
													<input name='image' type='file' />  
												</td>  
												<td>  
													Caption:  
													<textarea name='photo_captions' cols='30' rows='1'></textarea>  
												</td></tr>";
										}
									?>
									<td style="padding-top:15px">
										<input type='submit' name='submit' value='Add Photos'/>
									</td></tr>
								</form>
							</table>


                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0"></td>
              </tr>
              <tr>
                <td width="1" bgcolor="AAAAAA"></td>
                <td colspan="2" height="1" bgcolor="AAAAAA"></td>
                <td width="1" bgcolor="AAAAAA"></td>
                <td width="5" bgcolor="F0F0F0"></td>
              </tr>
              <tr>
                <td width="1" height="5" bgcolor="FFFFFF"></td>
                <td width="4" height="5" bgcolor="FFFFFF"></td>
                <td width="538" height="5" bgcolor="F0F0F0"></td>
                <td width="1" height="5" bgcolor="F0F0F0"></td>
                <td width="5" height="5" bgcolor="F0F0F0"></td>
              </tr>
            </table>
            <span style="font-size:6px"><br></span>
        </div>
	</div>


</body>
</html>