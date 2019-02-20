<?php
	session_start();
	include 'connection.php';
	echo '<p style="text-align:center">Request has been accepted for this books.Go and Collect from Library</p>';
	$schl=$_SESSION['schlno'];
	$sql="SELECT DISTINCT Bookid FROM borrowed WHERE ScholarNo=$schl";
	$result=mysqli_query($con,$sql);
	if(@mysqli_num_rows($result)>0){
		echo "<center><table><tr><th>Bookid</th></tr>";
		while($row=mysqli_fetch_assoc($result)){
			echo "<tr><td>".$row['Bookid']."</td></tr>";
		}
		echo "</table></center>";
	}
	echo '<p style="text-align:center"><a href="checkbooks.php">Go Back</a></p>';
?>