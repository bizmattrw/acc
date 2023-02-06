<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>

 <BODY><center>
  <?php
$asset=$_POST['asset'];
$status=$_POST['status'];
$value=$_POST['value'];
$depreciation=$_POST['value1'];
$date=$_POST['date'];
include("dbcon.php");
for($i=0;$i<count($asset);$i++)
{
if($asset[$i]!="")
{

$chk="select * from assets where '$asset[$i]'=asset";
$chk1=mysqli_query($con,$chk)or die(mysqli_error($con));
$chk2=mysqli_num_rows($chk1);
if($chk2!=null)
{
print("<FONT COLOR=red><b>$asset[$i] already exists!</FONT>");
	header("location: assets.php");
exit();	
}
else{
$add="insert into assets values('','$asset[$i]','$value[$i]','$depreciation[$i]','$date[$i]','$status[$i]','$_SESSION[coopid]')";
mysqli_query($con,$add)or die(mysqli_error($con));
print("<FONT COLOR=red><b>$asset added!</FONT>");
}}
	  		      echo "<meta http-equiv=\"refresh\" content=\"3;URL='assets.php'\">";echo"<br><br><br><center><font color=green size=+2>New Assets
				   are added!<br></font><br>";
}


  ?>
 </BODY>
</HTML>
