<?php
	include 'connection.php';
	$sql="SELECT * FROM book";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		echo "<table><tr><th>Bookid</th><th>BookName</th><th>Author</th><th>Edition</th><th>Price</th><th>No of Books</th></tr>";
		while($row=mysqli_fetch_assoc($result)){
			echo "<tr><td>".$row['Bookid']."</td><td>".$row['BookName']."</td><td>".$row['Author']."</td><td>".$row['Edition']."</td><td>".$row['Price']."</td><td>".
			$row['NoofBooks']."</td></tr>";
		}
		echo "</table>";
	}
?>