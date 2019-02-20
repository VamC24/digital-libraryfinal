<!DOCTYPE html>
	<?php
		session_start();
		include 'connection.php';
		if(isset($_POST['request'])){
			$id=$_SESSION['id'];
			$sno=$_SESSION['schlno'];
			$sql="SELECT * FROM request WHERE ScholarNo='$sno' ";
			$result=mysqli_query($con,$sql);
			$count1=mysqli_num_rows($result);
			$sql2="SELECT * FROM borrowed  WHERE ScholarNo='$sno'";
			$result2=mysqli_query($con,$sql2);
			$count2=mysqli_num_rows($result2);
			$count3=$count1+$count2;
			if($count3<=5){
				$sql3="INSERT INTO request (Bookid,ScholarNo) VALUES('$id','$sno')";
				if(mysqli_query($con,$sql3)){
					echo "Your request has been send";
				}	
			}
			else{
				echo "you have crossed the number of books.no request will be processed";
			}
		}
	?>
<html>
<head>
	<title></title>
</head>
<body>
<center>
	<p>Send Request to the librarian of selected Book.<?php echo $_SESSION['id'];?></p>
	<p style="text-align: right"><a href="login.php">Log Out</a></p>
	<form method="post" action="">
		<table>
			<tr>
				<td>
					Bookid:
				</td>
				<td>
					<input type="text" name="id"  value="<?php echo $_SESSION['id'];?>" >
				</td>
			</tr>
			<tr>
				<td>
					ScholarNo:
				</td>
				<td>
					<input type="text" name="user"  value="<?php echo $_SESSION['schlno'];?>">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="request" value="Confirm">
				</td>
				<td>
					<a href="checkbooks.php">Go Back</a>
				</td>
				<td>
					<a href="checkbooks.php">Select Another Book</a>
				</td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>