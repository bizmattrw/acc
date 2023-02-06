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
$account=$_POST['account'];
$code=$_POST['code'];
$year=$_POST['year'];
$amount=$_POST['amount'];
$coopid=$_SESSION['coopid'];
$chk=$_POST['chk'];
for($i=0;$i<count($account);$i++)
{
if($account[$i]!="")
{
$chk="select * from account where '$account[$i]'=codename and year='$year' and coopid='$_SESSION[coopid]'";
$chk1=mysqli_query($con,$chk)or die(mysqli_error($con));
$chk2=mysqli_num_rows($chk1);
if($chk2!=null)
{
print("<FONT COLOR=red><b>$account[$i] already exists!</FONT>");
	header("location: budgetline.php");
exit();	
}
else{
$add="insert into account values('','$account[$i]','$code[$i]','$year','','$amount[$i]','$amount[$i]','$coopid','')";
mysqli_query($con,$add)or die(mysqli_error($con));
print("<FONT COLOR=red><b>$account[$i] added!<br></FONT>");
	header("location: budgetline.php");
}
}
}
}
?>

</body>
</html>
