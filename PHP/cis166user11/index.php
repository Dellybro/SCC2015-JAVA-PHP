<html>

<body>

<p>Hello World</p>

<?php
echo "<p>hello worldy"; 
//print('<p>Hello agan</p>');
$b = green;
$a = 7 + 8;
$b = 7 - 8;
$c = 7 * 8;
$d = 7 / 8;
$e = 7 % 8;
//print('<p>'.$a.'</p>')
//print('<p>'.$b.' '.$a.' '.$c.'</p>')
$h = array(
		1=>"Jan",
		2=>"Feb",
		3=>"March"
);
print_r($h);
print('<p>Element #3:'.$h["3"].'</p>');
?>

<form action="index.php" method="POST">
<p>
<input type="text" name="text1" />
<input type="submit" />
</P>
</form>

<?php
	print_r($_POST);
	
?>

</body>

<html>