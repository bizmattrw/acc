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
include("dbcon.php");
$add="insert into retained values('','$reason','$value','$date')"or die(mysql_error());
mysql_query($add);
	  		     echo "<meta http-equiv=\"refresh\" content=\"0;URL='updateretained.php'\">";



  ?>
 </BODY>
</HTML>
