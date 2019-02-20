 <!DOCTYPE html>
 <?php
 	session_start();
 	include 'connection.php';
 	if(isset($_POST['return'])){
 		$_SESSION['returnbookid']=$_POST['id'];
 		$g=$_SESSION['returnbookid'];
 		$sql="UPDATE book SET NoofBooks=NoofBooks+1 WHERE Bookid=$g";
 		if(mysqli_query($con,$sql)){
 			echo "Book status is updated";
 		}
 		$sql2="DELETE FROM borrowed WHERE Bookid=$g ";
 		if(mysqli_query($con,$sql2)){
 			echo "record is successfully deleted from borrowed table";
 		}
 		echo "your request has been accepted";
 	}
 	if(isset($_POST['amount'])){
 		$_SESSION['returnbookid']=$_POST['id'];
 		$x=$_POST['id'];
 		$y=$_SESSION['schlno'];
 		$sql="SELECT Dateo FROM borrowed WHERE Bookid=$x AND ScholarNo=$y";
 		$result=mysqli_query($con,$sql);
 		$row=mysqli_fetch_assoc($result);
 		$date=$row['Dateo'];
 		$date=new DateTime($date);
 		$date2=date("Y/m/d");
 		$date2=new DateTime($date2);
 		$diff=date_diff($date,$date2);
 		$diff= $diff ->format("%a");
 		//echo $diff;
 		if($diff>0){
 			$_SESSION['fine']=$diff;
 		}
 		else{
 			$_SESSION['fine']=0;
 		}
 	}
 ?>
 <html>
 <head>
 <style>
 .head {
 	font-family: verdana;
 	font-size: 30px;
 	border-style: solid;
 	border-width: 1px;
 }
 </style>
 </head>
 <body style="background:#00ffff">
 	<center>
 	<h1 style="color: red">RETURN BOOK</h1>
 	<div id="head">
 		<form method="post" action="">
 			<table>
 				<tr>
 					<td>
 						Bookid:
 					</td>
 					<td>
 						<input type="number" name="id" value="<?php echo $_SESSION['returnbookid']; ?>">
					</td>
 				</tr>
 				<tr>
 					<td>
 					Fine:
 					</td>
 					<td>
 						<input type="number" name="fine" value="<?php if(isset($_POST['amount'])) echo $_SESSION['fine']; ?>">
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<input type="submit" name="return" value="Return">
 						<input type="submit" name="amount" value="Calculate Fine">
 					</td>
 				</tr>
 			</table>
 		</form>
 		</div>
 	</center>
 </body>
 </html>