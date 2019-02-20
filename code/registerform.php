<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div id="head">
	<h1>***SIGN UP REGISTRATION FORM***</h1>
	</div>
	<div id="top">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	<table>
	<tr>
	<td>FULL NAME :</td>
	<td><input type="text" name="name" placeholder="FullName"></td>
	</tr>
	<tr>
	<td>SCHOLAR NUMBER :</td>
	<td><input type="number" name="sno" placeholder="ScholarNo"></td>
	</tr>
	<tr>
	<td>SEMESTER :</td>
	<td><input type="number" name="sem" placeholder="Semester"></td>
	</tr>
	<tr>
	<td>BRANCH :</td>
	<td><input type="text" name="branch" placeholder="Branch"></td>
	</tr>
	<tr>
	<td> USER NAME :</td>
	<td><input type="text" name="username" placeholder="UserName"></td>
	</tr>
	<tr>
	<td>PASSWARD:</td>
	<td><input type="password" name="pass" placeholder="Password"></td>
	</tr>
	<tr>
	<td>GENDER :</td>
	<td><input type="text" name="gender" placeholder="Gender"></td>
	</tr>
	<tr>
	<td>E-MAIL :</td>
	<td><input type="text" name="email" placeholder="email"></td>
	</tr>
	<tr>
	<td>PHONE NO.:</td>
	<td><input type="text" name="phno" placeholder="PhoneNo"></td>
	<td><input type="text" name="day" placeholder="DateofBirth"></td>
	</tr>
	<input type="submit" name="submit" value="Submit">
	</table>
	</form>
	</div>
	<?php
	$hostname="localhost";
	$username="root";
	$password="v2603";
	$dbname="register";
	if(isset($_POST['submit'])){
		$con=mysqli_connect($hostname,$username,$password,$dbname);
		if(!$con)
		die("connection failed".mysqli_connect_error());
			$a=$_POST['name'];
			$b=$_POST['sno'];
			$c=$_POST['sem'];
			$d=$_POST['branch'];
			$e=$_POST['username'];
			$f=$_POST['pass'];
			$g=$_POST['gender'];
			$h=$_POST['email'];
			$i=$_POST['phno'];
			$j=$_POST['day'];
	$sql="INSERT INTO registered (FullName,ScholarNo,Semester,Branch,UserName,Passward,Gender,Email,PhoneNo,DateofBirth) VALUES('$a',' $b','$c','$d','$e','$f','$g','$h','$i','$j')";
	if(mysqli_query($con,$sql))
		echo "new record inserted successfully";
	}
	?>
</body>
</html>