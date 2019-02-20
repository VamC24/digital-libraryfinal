  
  <?php
$servername="localhost";
$psw="2603";
$username="root";
$db="firstdb";
$dbcon=mysqli_connect($host,$username,$pwd,$db);
if(!$dbcon)
{
echo"not connected";
}
if(!mysqli_select_db($dbcon,'firstdb'))
{
echo"database not connected";
}
$Name=$_POST['name'];
$mail=$_POST['email'];
$sch_no=$_POST['sch_no'];
$city=$_POST['city'];
$sql="insert into friends(name,email,sch_no,city) values('$Name','$mail','$sch_no','city')";
if(!mysqli_query($dbcon,$sql))
{
echo"fnd added";

}
else
{
echo"fnd not added";
}
header("refresh:2; url="db.html");
?>

