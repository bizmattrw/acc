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
$year=date("Y");
include("dbcon.php");
for($i=0;$i<count($reason);$i++)
{
if($reason[$i]!="")
{

$sel1=mysqli_query($con,"select * from liabilities where source='$reason[$i]' and year(date)='$year' and coopid='$_SESSION[coopid]'");
if(mysqli_num_rows($sel1)>0)
{mysqli_query($con,"update liabilities set amount=(amount+'$value[$i]') where source='$reason' and year(date)='$year' and coopid='$_SESSION[coopid]'");}
else
{
$add="insert into liabilities values('','$reason[$i]','$value[$i]','$date','$_SESSION[coopid]')";
mysqli_query($con,$add)or die(mysqli_error($con));
}
}}
	  		     echo "<meta http-equiv=\"refresh\" content=\"0;URL='updateliabilities.php'\">";



  ?>
 </BODY>
</HTML>
