<!DOCTYPE html>
<?php
	include 'connection.php';
	if(isset($_POST['add'])){
		$id=$_POST['id'];
		$bname=$_POST['bname'];
		$author=$_POST['author'];
		$edition=$_POST['edition'];	
		$price=$_POST['price'];
		$no=$_POST['no'];
		$sql="INSERT INTO book(Bookid,BookName,Author,Edition,Price,NoofBooks) VALUES('$id','$bname','$author','$edition','$price','$no')";
		if(mysqli_query($con,$sql)){
			echo "new book inserted successfully";	
		}
	}
	if(isset($_POST['delete'])){
		$id2=$_POST['id'];
		$sql="DELETE  FROM book WHERE Bookid=$id2 ";
		if(mysqli_query($con,$sql)){
			echo '<script>alert("deleted")</script>';
			echo '<script>window.location="books.php"</script>';
		}
	}
	if(isset($_POST['request'])){
		header("location:acceptrequest.php");
	}
	$con=NULL;
?>
<html>
<head>
</head>
<body bgcolor="yellow"><br><br><br><br><br>
	<h1 style="text-align: center;" style="color=red">Modification of Books</h1> 
	<center>
		<form method="post" action="">
			<table>
				<tr>
					<td>
						Bookid
					</td>
					<td>
						<input type="number" name="id" value="" placeholder="Bookid" autofocus>
					</td>
				</tr>
				<tr>
					<td>
						BookName
					</td>
					<td>
						<input type="text" name="bname" value="" placeholder="BookName">
					</td>
				</tr>
				<tr>
					<td>
						Author
					</td>
					<td>
						<input type="text" name="author" value="" placeholder="Author">
					</td>
				</tr>
				<tr>
					<td>
						Edition
					</td>
					<td>
						<input type="number" name="edition" value="" placeholder="Edition">
					</td>
				</tr>
				<tr>
					<td>
						Price
					</td>
					<td>
						<input type="number" name="price" value="" placeholder="Price">
					</td>
				</tr>
				<tr>
					<td>
						No of Books
					</td>
					<td>
						<input type="number" name="no" value="" placeholder="No of Books">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add" value="AddBook">
					</td>
					<td>
						<input type="submit" name="delete" value="DeleteBook">
					</td>
					<td>
						<input type="submit" name="request" value="CheckRequest">
					</td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>