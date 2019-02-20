<?php
	session_start();
	include 'connection.php';
	if(isset($_POST['submit'])){
		$_SESSION['id']=$_POST['id'];
		$id2=$_SESSION['id'];
		$sql="SELECT * FROM Book WHERE Bookid='$id2' ";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)!=0){
			header("location:issuebook.php");
		}
		else{
			echo "Book not available";
		}
	}
	if(isset($_POST['search'])){
		$_SESSION['id']=$_POST['id'];
		$id3=$_SESSION['id'];
		$sql="SELECT * FROM Book WHERE Bookid='$id3' ";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==0){
			echo "Book Not available";
		}
		else{
			$row=mysqli_fetch_assoc($result);
			$_SESSION['id']=$row['Bookid'];
			$_SESSION['bno']=$row['BookName'];
			$_SESSION['author']=$row['Author'];
			$_SESSION['edition']=$row['Edition'];
			$_SESSION['price']=$row['Price'];
		}
	}
?>
<html>
<head>
</head>
<body style="background:#ffff00 ">
	<p>Welcome:<?php echo $_SESSION['name']; ?></p>
	<p style="text-align: right"><a href="login.php">Log Out</a></p>
	<center>
		<h1 style="color:red" style="font-family: NEWS 706 BT" style="font-size: 50px">Search Book</h1>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
			<table>
				<tr>
					<td>
						Bookid
					</td>
					<td>
						<input type="number" name="id" placeholder="Bookid" value="<?php echo @$_SESSION['id']; ?>"  autofocus>
					</td>
				</tr>
				<tr>
					<td>
						BookName
					</td>
					<td>
						<input type="text" name="bno" placeholder="BookName"  value="<?php echo @$_SESSION['bno']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						Author
					</td>
					<td>
						<input type="text" name="author" placeholder="Author" value="<?php echo @$_SESSION['author']; ?>" >
					</td>
				<tr>
					<td>
						Edition
					</td>
					<td>
						<input type="number" name="edition" placeholder="Edition" value="<?php echo @$_SESSION['edition']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						Price
					</td>
					<td>
						<input type="number" name="price" placeholder="Price" value="<?php echo @	$_SESSION['price']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Submit"></td>
					<td><input type="submit" name="search" value="Search"></td>
					<td><a href="checkstatus.php">Check Status</a>
					<a href="return.php">Return Book</a>
					</td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>