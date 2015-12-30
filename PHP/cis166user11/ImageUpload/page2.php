<?php
session_start();
$_SESSION["name"] = $_SESSION["name"] . "A";
?>
<html>

<body>
<?php echo $_SESSION["name"]; ?>
<p><a href="page3.php">Page3</a></p>
</body>
</html>