<?php include("session.php");?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include('dbcon.php');
if(isset($_POST['submit']))
{
$source=$_POST['source'];
$chk="select * from instititution where '$source'=liability and coopid='$_SESSION[coopid]'";
$chk1=mysqli_query($con,$chk)or die(mysqli_error());
$chk2=mysqli_num_rows($chk1);
if($chk2!=null)
{
print("<FONT COLOR=red><b>$source already exists!</FONT>");
	header("location: liabilityitem.php");
exit();	
}
else{
$add="insert into instititution values('','$source','$_SESSION[coopid]')";
mysqli_query($con,$add)or die(mysqli_error($con));
print("<FONT COLOR=red><b>$source added!</FONT>");
	header("location: liabilityitem.php");
}
}
?>

</body>
</html>
