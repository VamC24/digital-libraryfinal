<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body bgcolor="orange"><br><br><br><br><br><br>
<div id="head">
	<h1 style="text-align:center">Librarian Login </h1>
	<center>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
			<table>
				<tr>
					<td>
						UserName
					</td>
					<td>
						<input type="text" name="username" placeholder="username" autofocus required>
					</td>
				</tr>
					<tr>
					<td>
						Password
					</td>
					<td>
						<input type="password" name="pass" placeholder="password" required>
					</td>
				</tr>
					<tr>
						<td>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" value="Login ">
						</td>
					</tr>
			</table>
		</form>
	</center>
	<?php 
		session_start();
		include 'connection.php';	
		if(isset($_POST['submit'])){
			$user=$_POST['username'];
			$pass=$_POST['pass'];
		$sql="SELECT * FROM registered WHERE UserName='$user' AND Passward='$pass' ";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==1){
			header("location:books.php");
		}
		else{
			echo '<script>alert("wrong details")</script>';
			echo '<script>window:location="librarianlogin.php"</script>';
		}
	}
	?>
	</div>
</body>
</html>