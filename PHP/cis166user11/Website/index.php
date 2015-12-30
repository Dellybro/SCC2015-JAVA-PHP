<?php 
  
  session_start();
  if($_SESSION["message"]){
    $sessionMessage = $_SESSION["message"];
    $_SESSION["message"] = null;
  }

  if($_SESSION["username"] == ''){
    $loginButton = "<tr>
                      <td><a href='login.php'> Login </a></td>
                    </tr>";
    $loginText = "Or create User";

  }else{
    $loginButton = "<tr>
                      <td><a href='profile.php'> Go to Profile </a></td>
                    </tr>";
    $loginText = "Upload Images to Gallery";
  }

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title>Image Lounge</title>
  <link rel="STYLESHEET" href="style.css" type="text/css">
</head>
  <body bgcolor="FFFFFF">
    <div align="center">
      <table width="750" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3" width="750" height="200" background="header.jpg" valign="top" style="padding:0 0 0 10">
            <table width="700" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="750" colspan="3" class="logo">
                  <b>Image Lounge</b>
                </td>
              </tr>
              <tr>
                <td width="330" class="slogan">
                  Upload your images with us!
                </td>
                <td width="400" align="right">
                  <table width="400" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="right" height="20">
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="20"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" height="15" bgcolor="FFFFFF"></td>
        </tr>
        <tr>
          <td colspan="3" height="1" bgcolor="CCCCCC"></td>
        </tr>
        <tr>
          <td colspan="3" height="10" bgcolor="FFFFFF"></td>
        </tr>
        <tr>
          <td width="170" bgcolor="FFFFFF" valign="top">
            <span style="font-size:6px"><br></span>
            <div align="center">
              <table width="140" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td><a href="index.php">Home</a></td>
                </tr>
                <tr>
                  <td>This page...</td>
                </tr>
                <tr>
                  <td height="5" bgcolor="FFFFFF"></td>
                </tr>

                <!-- Set in PHP up top -->
                  <?php echo $loginButton ?> 

                <tr>
                  <td><?php echo $loginText ?></td>
                </tr>
                <tr>
                  <td height="5" bgcolor="FFFFFF"></td>
                </tr>
                <?php
                if($_SESSION["username"] != ''){
                  echo "<tr>
                          <td><a href='logout.php'>Logout </a></td>
                        </tr>
                        <tr>
                          <td>View mode</td>
                        </tr>";
                  }
                ?>
              </table>
              <br><span style="font-size:6px"><br></span>
              <span style="font-size:6px"><br></span>
            </div>
          </td>
          <td width="1" bgcolor="CCCCCC"></td>
          <td width="579" valign="top">
            <span style="font-size:6px"><br></span>
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
                    <td rowspan="2" colspan="2" width="542" height="27" bgcolor="#597F20" class="class1">&nbsp;&nbsp;News Update</td>
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
                              Upload an image and share the link with your friends!
                              <form enctype='multipart/form-data' action='upload.php' name='upload_form' method='POST'>
                                <tr>
                                  <td>  
                                    Photo:  
                                    <input name='image' type='file' />  
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding-top:15px">
                                    <input type='submit' name='submit' value='Submit Photo'/>
                                  </td>
                                </tr>
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
            </td>
          </tr>
          <tr>
            <td colspan="3" height="10" bgcolor="FFFFFF"></td>
          </tr>
          <tr>
            <td colspan="3" height="1" bgcolor="CCCCCC"></td>
          </tr>
          <tr>
            <td colspan="3" height="5" bgcolor="FFFFFF"></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="FFFFFF" align="right">
              Copyright © 2015 Travis Delly All Rights Reserved 
            </td>
          </tr>
        </tr>
      </table>
    </div>
  </body>
</html>