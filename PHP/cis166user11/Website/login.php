<?php

session_start();
if($_SESSION["message"]){
	$session = $_SESSION["message"];
	$_SESSION["message"] = null;
}

?>

<html>
<head>
	<title>Image Lounge Login</title>
	<link rel="STYLESHEET" href="style.css" type="text/css">
</head>
<body>
	<?php include("top.php"); ?>


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

			<h3><?php echo $session; ?>

			<h2> Login </h2>
			<table width="140" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<form action="processLogin.php" method="POST">
						<p>Username:<br />
							<input type="text" name="user" />
						</p>
						<p>Password:<br />
							<input type="text" name="pass" />
						</p>
						<p><input type="submit" name="submit" /></p>
					</form>
				</tr>
			</table>

			<br></br>

			<h2> Create User </h2>
			<table width="140" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<form action="processCreate.php" method="POST">
						<p>Username:<br />
							<input type="text" name="user" />
						</p>
						<p>First Name:<br />
							<input type="text" name="name" />
						</p>
						<p>Password:<br />
							<input type="text" name="pass" />
						</p>
						<p>Phone:<br />
							<input type="text" name="phone"/>
						</p>
						<p>Email:<br />
							<input type="text" name="email"/>
						</p>
						<p>Gender:<br />
							<select name="gender">
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						<p>Permission:<br />
							<select name="permissions">
								<option value="A">Admin</option>
								<option value="V">Viewer</option>
								<option value="G">General</option>
							</select>
						</p>
						<p>
							<input type="submit" name="submit" />
						</p>
					</form>
				</tr>
			</table>
			<br><span style="font-size:6px"><br></span>
			<span style="font-size:6px"><br></span>
		</div>
	</tr>

</body>
</html>