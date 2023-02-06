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
$action=$_POST['action'];
$date=$_POST['date'];
$id=$_POST['id'];
include("dbcon.php");
$add="update amadeni set action='$action',ideni='$reason',value='$value',date='$date' where id='$id'"or die(mysql_error());
mysql_query($add);
	  		     echo "<meta http-equiv=\"refresh\" content=\"0;URL='updateamadeni.php'\">";



  ?>
 </BODY>
</HTML>
