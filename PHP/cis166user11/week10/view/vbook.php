<?php

$html = "<table width='100%' border='1'>";
$html .= "<tr><td>Title: ".$book->title."</td>";
$html .= "<td>Author: ".$book->author."</td>";
$html .= "<td>Book: ".$book->desc."</td>";
$html .= "</tr>";


?>

<html>
<head>
	<title>View Book</title>
</head>
<body>
	<?php echo $html; ?>
	<p><a href="index.php"> Back to list</a></p>
</body>
</html>
