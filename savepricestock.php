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
$year=date("Y");
for($i=0;$i<count($item);$i++)
{
	$sel_query=mysqli_query($con,"select * from levels where item='$item[$i]'") or die(mysqli_error($con));
	if(mysqli_num_rows($sel_query)>0)
	{
		echo"<script>alert('the Item already exists in the stock')</script>";
		$_SESSION['deny']="<div style='background-color:red; width:40em;border-radius:1em'> Sorry the $item[$i] Already exists</div>";
	header("location: pricestock.php");
	}
	else {
$add="insert into levels values('','$pprice[$i]','$sprice[$i]','$year','$item[$i]','$_SESSION[coopid]')";
mysqli_query($con,$add)or die(mysqli_error($con));

print("<SCRIPT>alert('DATA SAVED SUCCESSFULLY)</SCRIPT>");
$_SESSION['success']="<div style='background-color:yellow; width:40em;border-radius:1em'>DATA SAVED SUCCESSFULLY</div>";
	header("location: pricestock.php");
}
}
}
?>

</body>
</html>
