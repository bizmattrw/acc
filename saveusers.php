<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php 
include'session.php';
include('dbcon.php');
if(isset($_POST['submit']))
{
$names=$_POST['names'];
$username=$_POST['username'];
$password= password_hash($_POST['password'],PASSWORD_DEFAULT);
//$coopid=$_SESSION['coopid'];
//$password = password_hash($password, PASSWORD_DEFAULT);
$chk=$_POST['chk'];
for($i=0;$i<count($username);$i++)
{
if($username[$i]!="")
{
$chk="select * from login where '$username[$i]'=username ";
$chk1=mysqli_query($con,$chk)or die(mysqli_error($con));
$chk2=mysqli_num_rows($chk1);
if($chk2!=null)
{
print("<FONT COLOR=red><b>$Username[$i] already exists!</FONT>");
	header("location: usersform.php");
exit();	
}
else{
//$password = password_hash($password[$i], PASSWORD_DEFAULT);

$add="insert into login values('','$names[$i]','$username[$i]','4','$password','11')";
mysqli_query($con,$add)or die(mysqli_error($con));
	header("location: updateusers.php");
}
}
}
}
?>

</body>
</html>
