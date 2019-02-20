<!DOCTYPE html>
<?php
	session_start();
	include 'connection.php';
	if(isset($_POST['next'])){
		$sql="SELECT * FROM request LIMIT 1";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result)==0){
			echo "There are no requests";
		}
		$_SESSION['orderno']=$row['OrderNo'];
		$_SESSION['id']=$row['Bookid'];
		$_SESSION['schlno']=$row['ScholarNo'];
	}
	if(isset($_POST['accept'])){
		$id1=$_SESSION['id'];
		$sql1="SELECT NoofBooks FROM book WHERE Bookid='$id1' ";
		$result=mysqli_query($con,$sql1);
		$row=mysqli_fetch_assoc($result);
		$no1=$row['NoofBooks'];
		if($no1!=0){
			$x=$_SESSION['orderno'];
			$y=$_SESSION['id'];
			$z=$_SESSION['schlno'];
			$w=date("Y/m/d");
			
			$sql6="SELECT * FROM borrowed WHERE ScholarNo=$z AND Bookid=$y";
			$result2=mysqli_query($con,$sql6);
			$count=mysqli_num_rows($result2);
			if($count==0){															
				$sql2="INSERT INTO borrowed (Bookid,ScholarNo,Dateo,OrderNo) VALUES('$y','$z','$w','$x')";
				if(mysqli_query($con,$sql2)){
					$sql3="DELETE FROM request WHERE OrderNo=$x ";
					if(mysqli_query($con,$sql3))
						echo "deleted";
					$sql4="UPDATE book SET NoofBooks=NoofBooks-1 WHERE Bookid=$y ";
					if(mysqli_query($con,$sql4))
						echo "updated";
					echo "U have accepted";
				}
			}
			else{
				$x=$_SESSION['orderno'];
				$sql7="DELETE FROM request WHERE OrderNo=$x ";	
				echo "requested book is taken by the student he can't take same book more than once";
			}
		}
		else{
			$x=$_SESSION['orderno'];
			$sql4="DELETE FROM request WHERE OrderNo=$x ";
			echo "Request is not accepted due to there is no books";
			}
	}
	if(isset($_POST['deline'])){
		$x=$_SESSION['orderno'];
		$sql5="DELETE FROM request WHERE OrderNo=$x ";
		if(mysqli_query($con,$sql5))
			echo "you did not accept the request ";
	}
?>
<html>
<head>
<style>
#top {
	border-style: solid;
	border-width: 3px;
	border-color: #00ffff;
	width:500px;
	height: 200px;
	position:center;
	background: #ffcc00;
}
.h3 {
	font-family: NEWS 706 BT;
	border: solid;
	border-width: 2px;
	background: yellow;
}	
</style>
</head>
<body bgcolor="linear-gradient(to bottom left,#0066ff 0%,#00ffff 100%)"><br><br><br><br><br><br>
<div id="top">
<p style="text-align:right;"><a href="books.php">Go Back</a></p>
<h3 style="text-align: center;" >Request of Books</h3>
	<center>
		<form method="post" action="">
			<table>
				<tr>
					<td>
						OrderNo:
					</td>
					<td>
						<input type="number" name="orderno" value="<?php if(isset($_POST['next'])) echo $_SESSION['orderno']; ?>">
					</td>
				<tr>
					<td>
						Bookid:
					</td>
					<td>
						<input type="number" name="id" value="<?php if(isset($_POST['next'])) echo $_SESSION['id']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						ScholarNo:
					</td>
					<td>
						<input type="number" name="schlno" value="<?php if(isset($_POST['next'])) echo $_SESSION['schlno']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="next" value="Next Request">
						<input type="submit" name="accept" value="Accept">
						<input type="submit" name="deline" value="Decline">
					</td>
				</tr>
			</table>
		</form>
	</center>
	</div>
</body>
</html>