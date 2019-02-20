<!DOCTYPE html>	
<html>
<head>
	<title></title>
</head>
<body>
	<p>Enter the numbers</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Num1<input type="number" name="num1"><br><br>
	Num2<input type="number" name="num2"><br><br>
	<input type="submit" name="ADD" value="ADD">
	<input type="submit" name="DIFF" value="DIFF">
	<input type="submit" name="DIV" value="DIV">
	<input type="submit" name="MULTI" value="MULTI">
	</form>
	<?php
		$x=$_POST['num1'];	
		$y=$_POST['num2'];
		if(isset($_POST['ADD'])){
			$z=$x+$y;
			echo "addition of two numbers is".$z;
		}
		if(isset($_POST['DIFF'])){
			$z=$x-$y;
			echo "diff of two numbers is".$z;
		}
		if(isset($_POST['DIV'])){
			$z=$x/$y;
			echo "division  of two numbers is".$z;
		}
		if(isset($_POST['MULTI'])){
			$z=$x*$y;
			echo "multiplication of two numbers is".$z;
		}
		?>
</body>
</html>