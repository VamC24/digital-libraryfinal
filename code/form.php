<!DOCTYPE html>
<html>
<head>
<style>
	.error{
		color: #FF0000;
	}
</style>
	<title></title>
</head>
<body>
	<?php 
	$nameErr = " " ;
	$ageErr = " ";
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$age=$_POST['age'];
		if(empty($_POST['name'])){
			$nameErr= "name is required";
		}  else{
			$name=test_input($_POST['name']);
			if(!preg_match("/[a-zA-Z]/",$name)){
			$nameErr="name is in invalid form";	
			}
				}
		}
		if(empty($_POST['age'])){
			$ageErr="age is required";
		}
		else{
			$age=test_input($_POST['age']);
			if(!preg_match("[0-9]",$age)){
			
			}
		}
	
	function test_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>
		<p><span class="error">* required field.</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
		Name:<input type="text" name="name" placeholder="FullName" value="<?php echo $name; ?>"><span class="error">*<?php echo $nameErr; ?></span><br><br>
		Age:<input type="number" name="age" placeholder="Age" value="<?php echo $age ?>"><span class="error">*<?php echo $ageErr; ?></span><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>