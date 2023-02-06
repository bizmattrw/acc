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
$pprice=$_POST['pprice'];
//$year=$_POST['year'];
$sprice=$_POST['sprice'];
$item=$_POST['item'];
//$season=$_POST['season'];
$add="insert into levels values('','$pprice','$sprice','','','$item','$_SESSION[coopid]')"or die(mysqli_error($con));
mysqli_query($con,$add);
print("<FONT COLOR=red><b> added!</FONT>");
	header("location: pricestock.php");
}
?>

</body>
</html>
