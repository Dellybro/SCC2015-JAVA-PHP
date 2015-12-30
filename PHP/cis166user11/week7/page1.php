<?php


	session_start();
    $_SESSION["total"];


?>
<!DOCTYPE html>
<html>
<head>


    <title>Week 7 - page1 </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>

<a href="../homepage.php"> < Go Back</a>

        <form method ="POST" action="page2.php">
            <p>Add a number</p>
            <p>Number:</br>
            <input type="number" name="number"/></p>

            <p><input type="submit" name="login"/></p>

        </form>

	<p>
        <h2>Current Total</h2>
    </p>
    <p>
        <?php echo $_SESSION["total"]; ?>
    </p>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
