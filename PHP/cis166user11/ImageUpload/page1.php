<?php
session_start();
$_SESSION["name"] = "rob";
?>
<html>

<body>
<?php echo $_SESSION["name"]; ?>
<p><a href="page2.php">Page2</a></p>
<p><a href="page3.php">Page3</a></p>
</body>
</html>