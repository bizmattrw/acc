<?php include("session.php");?>
	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$names=$_POST['names'];
$username=$_POST['username'];
$password=$_POST['password'];
//$depreciation=$_POST['depreciation'];
//$password = password_hash($password, PASSWORD_DEFAULT);
include("dbcon.php");

$insert1=mysqli_query($con,"update login set names='$names',password='$password',username='$username' where id='$id'
")or die(mysqli_error($con)); 


     echo"<meta http-equiv=\"refresh\" content=\"1;URL=updateusers.php\">";echo"<center> <font size=25 color=greaan>User Updated";

	}

	?>