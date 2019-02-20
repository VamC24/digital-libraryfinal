<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>SIGN UP REGISTRATION FORM</h1>
	<center>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
		<table>
			<tr>
				<td>
					FullName:
				</td>
				<td>
					<input type="text" name="name" placeholder="FullName">
				</td>
			</tr>
			<tr>
				<td>
					ScholarNo:
				</td>
				<td>
					<input type="number" name="sno" placeholder="ScholarNo">
				</td>
			</tr>
			<tr>
				<td>
					Semester:
				</td>
				<td>
					<input type="number" name="sem" placeholder="Semester">
				</td>
			</tr>
			<tr>
				<td>
					Branch:
				</td>
				<td>
					<input type="text" name="branch" placeholder="Branch">
				</td>
			</tr>
			<tr>
				<td>
					UserName:
				</td>
				<td>
					<input type="text" name="username" placeholder="UserName">
				</td>
			</tr>
			<tr>
				<td>
					FullName:
				</td>
				<td>
					<input type="password" name="pass" placeholder="Password">
				</td>
			</tr>
			<tr>
				<td>
					Gender:
				</td>
				<td>
					<input type="text" name="gender" placeholder="Gender">
				</td>
			</tr>
			<tr>
				<td>
					E-mail:
				</td>
				<td>
					<input type="text" name="email" placeholder="email">
				</td>
			</tr>
			<tr>
				<td>
					PhoneNo:
				</td>
				<td>
					<input type="text" name="phno" placeholder="PhoneNo">
				</td>
			</tr>
			<tr>
				<td>
					FullName:
				</td>
				<td>
					<input type="text" name="day" placeholder="DateofBirth">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
				<td>
					<a href="login.php">Login</a>
					<input type="reset" name="" value="Reset">
				</td>
			</tr>
		</table>
	</form>
	</center>
	<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="library";
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
	echo "<script>window:location:'register.php'</script>"
	?>
</body>
</html>