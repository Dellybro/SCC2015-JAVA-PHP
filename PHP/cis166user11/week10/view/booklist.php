<?php

$html = "<table width='100%' border='1'>";
foreach($books as $title=>$book){
	$html.="<tr>";
	$html.="<td><a href='index.php?book=".$book->title."'>View</a>";
	$html.="<td>".$book->title."</td>";
	$html.="<td>".$book->author."</td>";
	$html.="<td>".$book->desc."</td>";
	$html.="</tr>";
}
$html .= "</table>";


?>

<html>
<head>
	<title>Show Book List</title>
</head>
<body>
<?php echo $html; ?>
</body>
</html>