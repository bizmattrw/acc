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
$reason=$_POST['reason'];
$value=$_POST['value'];
//$action=$_POST['action'];
$date=$_POST['date'];
include("dbcon.php");
$year=date("Y");
$selspeaker1=mysqli_query($con,"select amount,amountremain,id,codename,year from sources where codename='$reason' and year='$year'  and coopid='$_SESSION[coopid]'") 
or die(mysqli_error($con));
while($speak=mysqli_fetch_array($selspeaker1))
{
$am=$speak['amount'];
$amrem=$speak['amountremain'];
}
$current=$amrem-$value;
$issa=mysqli_query($con,"update sources set amountremain='$current' where year='$year' and codename='$reason' and coopid='$_SESSION[coopid]' ") or die(mysqli_error($con));
$add="insert into income values('','$reason','$value','$date','$_SESSION[coopid]')"or die(mysqli_error($con));
mysqli_query($con,$add);
	  		     echo "<meta http-equiv=\"refresh\" content=\"0;URL='updateincome.php'\">";



  ?>
 </BODY>
</HTML>
