<html>
 <head> 
 <title>Calculate</title>
 <link href="style1.css" rel="stylesheet" type="text/css"> 
 </head> 
 <body>  
 <a href="../homepage.php"> < Back </a>
 <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" 
 method = "GET">
<h1>Two Function Calculator</h1> 
 <h2>Multiply Two Numbers</h2>
 <p>Enter a number in each text box and then press submit.</br>
 Enter Positive numbers only.  No negative numbers.</p>
 <input type = "number" name = "numberone" size=10>First Number<br/>
 <input type = "number" name = "numbertwo" size=10>Second Number<br/> 
 <input type="hidden" name="calc" value ="yes"> 
 <input type = "submit" name = "Calculate"/></br> 
 <?php
 if ($_GET["calc"]) {
	 	# code...
	 $numberone = $_GET['numberone']; 
	 $numbertwo = $_GET['numbertwo']; 
	 $results = $numberone*$numbertwo; 
 }
 if ($_GET["numberone"] < 0 || $_GET["numbertwo"] < 0){
	Print('<p>Positive numbers only!  Try again!  This time use POSITIVE NUMBERS!</p>');
} else {
 	print "<h2>Multiplication Results</h2>"; 
 	print " $numberone x $numbertwo = $results <p>";
}
?> 
 <h2>Add Two Numbers</h2>
 <p>Enter a number in each box and then press submit query.</br>
 Positive numbers only.<p>
 <input type = "number" name = "numberthree" size=10>Third Number<br/> 
 <input type = "number" name = "numberfour" size=10>Fourth Number<br/> 
 <input type="hidden" name="calctwo" value ="yes"> 
 <input type = "submit" name = "Calculate2"/></br> 
 <?php 
 if ($_GET['calctwo'] == "yes"){
 	$numberthree = $_GET['numberthree']; 
 	$numberfour = $_GET['numberfour']; 
 	$results2 = $numberthree+$numberfour;
 }

 if ($_GET["numberthree"] < 0 || $_GET["numberfour"] < 0){
	Print('<p>POSITIVE NUMBERS ONLY!</p>');
 }else{ 
 	print "<h2>Addition Results</h2>"; 
 	print " $numberthree + $numberfour = $results2 <p>"; 
 } 

 ?> 

 <h2>Divide Two Numbers</h2>
 <p>Enter a number in each box and then press submit query.</br>
 Positive numbers only.<p>
 <input type = "number" name = "numberfive" size=10>Fifth Number<br/> 
 <input type = "number" name = "numbersix" size=10>Sixth Number<br/> 
 <input type="hidden" name="calcthree" value ="yes"> 
 <input type = "submit" name = "Calculate3"/></br> 
  <?php 
 if ($_GET['calcthree'] == "yes"){
 	if($_GET["numberfive"] <= 0 || $_GET["numbersix"] <= 0){
 		Print('<p>POSITIVE NUMBERS ONLY!</p>');
 	} else {
 		$numberfive = $_GET['numberfive']; 
 		$numbersix = $_GET['numbersix']; 
 		$results3 = $numberfive/$numbersix;
 		print "<h2>Division Results</h2>"; 
 		print " $numberfive + $numbersix = $results3<p>";
 	}
 }

 ?>
<h2>Subract two numbers</h2>
<p> Enter a number in each box and than press submit</br>
	Positive numbers only</p>
 <input type = "number" name = "numberseven" size=10>Seventh Number<br/> 
 <input type = "number" name = "numbereight" size=10>Eight Number<br/> 
 <input type="hidden" name="calcfour" value ="yes"> 
 <input type = "submit" name = "Calculate4"/></br> 
 <?php 
 if ($_GET['calcfour'] == "yes"){
	$numberseven = $_GET['numberseven']; 
	$numbereight = $_GET['numbereight'];
 	$results4 = $numberseven-$numbereight;
 }

 if ($_GET["numberseven"] < 0 || $_GET["numbereight"] < 0){
	Print('<p>POSITIVE NUMBERS ONLY!</p>');
 }else{ 
 	print "<h2>Subtraction Results</h2>"; 
 	print "<p>$numberseven - $numbereight = $results4 </p>"; 
 } 

 ?> 

 
 </form> 
 </body> 
 </html> 