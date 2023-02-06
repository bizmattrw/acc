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
$date=$_POST['date'];
$id=$_POST['id'];
include("dbcon.php");
$add="update liabilities set source='$reason',amount='$value',date='$date' where id='$id'";
mysqli_query($con,$add)or die(mysqli_error($con));
	  		     echo "<meta http-equiv=\"refresh\" content=\"0;URL='updateliabilities.php'\">";



  ?>
 </BODY>
</HTML>
