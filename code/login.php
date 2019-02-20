<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="" content="">
<style>
.body{
	background:linear-gradient(to left,#33ccff 0%,#ccffff100%); 
}
#top {
	top:50%
	left:50%;
	width:500px;
	height:300px;
	border-style: solid;
	border-width: 2px;
	background:yellow;
	font-family: verdana; 
}
</style>
</head>
<body bgcolor="pink"><br><br><br><br><br><br><br><br>
<center>
<div id="top">
<h1 color="red">Welcome...! Login here</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
		<table>
			<tr>
				<td>
					UserName:
				</td>
				<td>
					<input type="text" name="username" placeholder="username" autofocus required>
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="password" name="pass" placeholder="password" required>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Login ">
				</td>
			</tr>
		</table>
	</form>
	<p>Not yet a member? <a href="register.php">Register</a></p>
  </div>
</center>
	<?php 
		session_start();
		$hostname="localhost";
		$username="root";
		$password="2603";
		$dbname="library";
		if(isset($_POST['submit'])){
			$con=mysqli_connect($hostname,$username,$password,$dbname);
			if(!$con)
			die("connection failed".mysqli_connect_error()); 
			$user=$_POST['username'];
			$pass=$_POST['pass'];
		$sql="SELECT * FROM registered WHERE UserName='$user' AND Passward='$pass' ";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
			$_SESSION['name']=$row['FullName'];
			$_SESSION['sno']=$row['ScholarNo'];
			header("location:checkbooks.php");
		}
		else{
			echo '<script>alert("Invalid UserName or Password")</script>';
			echo '<script>window.location="login.php"</script>';
		}
	}
	?>
</body>
</html>