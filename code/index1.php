<html>
<head>
<meta name="" content="">
<style>
#head{
	font-family: NEWS 706 BT;
	color: red;
	font-size: 25px;
}
#top{
	width:500px;
	height:300px;
	border-style: solid;
	border-width: 1px;
	background:linear-gradient(to left,#33ccff 0%,#ccffff 100%);
}
h1 {
	animation:type 2s steps 32;
	overflow: hidden;
	white-space: nowrap;
}
@keyframes type {
	0% {
		width:0ch;
	}
	100%{
		width: 32ch;
	}
}
</style>
</head>
<body bgcolor="yellow">
<center><br><br><br><br>
<div id="head">
<h1>***SIGN UP REGISTRATION FORM***</h1>
</div>
<div id="top">
<form>
<table>
<tr>
<td>NAME :</td>
<td><input type="text" placeholder="FULL NAME"></td>
</tr>
<tr>
<td>SCHOLAR NUMBER :</td>
<td><input type="text" placeholder="SCHOLAR NUMBER"></td>
</tr>
<tr>
<td>SEMESTER :</td>
<td><input type="text" placeholder="SEMESTER"></td>
</tr>
<tr>
<td>BRANCH :</td>
<td><input type="text" placeholder="BRANCH"></td>
</tr>
<tr>
<td>USER NAME :</td>
<td><input type="text" placeholder="USER NAME"></td>
</tr>
<tr>
<td>PASSWARD :</td>
<td><input type="text" placeholder="PASSWARD"></td>
</tr>
<tr>
<td>GENDER :</td>
<td><input type="text" placeholder="GENDER"></td>
</tr>
<tr>
<td>E-MAIL :</td>
<td><input type="text" placeholder="xyz@gmail.com"></td>
</tr>
<tr>
<td>PHONE NUMBER :</td>
<td><input type="text" placeholder="98482*****"></td>
</tr>
<tr>
<td>DATE OF BIRTH :</td>
<td><input type="text" placeholder="dd/mm/yyyy"></td>
</tr>
<tr>
<td><input type="submit" value="SUBMIT"></td>
<td><input type="reset" value="RESET"></td>
</tr>
</table>
</form>
</div>
</center>
<?php
	$hostname="localhost";
	$username="root";
	$password="2603";
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
	?>
</body>
</html>