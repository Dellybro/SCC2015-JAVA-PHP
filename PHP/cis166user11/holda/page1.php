<?php 

    session_start();
    $_SESSION["name"] = "travis";

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 7 - Page 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body class="container">
    
    <p>
        <?php echo $_SESSION["name"] ?>
    </p>
    <p>
        <a href="page2.php">Page 2</a>
    </p>
    <p>
        <a href="page3.php">Page 3</a>
    </p>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>