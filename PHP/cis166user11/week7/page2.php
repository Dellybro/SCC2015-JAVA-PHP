<?php 

    session_start();

	if($_POST["number"]){
		$_SESSION['total'] += $_POST["number"];
	} else {
		header("location:page1.php");
	}

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 7 - Page 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body class="container">
    
    <p>
        <h2>Current Total</h2>
    </p>
    <p>
        <?php echo $_SESSION["total"] ?>
    </p>
    <p>
        <a href="page1.php">Go Back</a>
    </p>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
