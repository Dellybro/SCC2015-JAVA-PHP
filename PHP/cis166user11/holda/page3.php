<?php 

    session_start();

    if ($_SESSION["name"] !== "travisA")
    {
        header("location:page1.php");
    }

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 7 - Page 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body class="container">
    
    <p>
        <?php echo $_SESSION["name"] ?>
    </p>
    <h1>YESSSSSSSS!!!!!</h1>
    <p>
        <a href="page1.php">Page 1</a>
    </p>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>