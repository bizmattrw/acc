<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>STOCK MANAGEMENT</title>
</head>

<body bgcolor="#CCCCCC">
<?php
include("dbcon.php");
$item=$_POST['item'];
$quantity=$_POST['quantity'];
$reason=$_POST['reason'];
$date=$_POST['date'];

$selspeaker1=mysqli_query($con,"select currentquantity from stock where item='$item' and coopid='$_SESSION[coopid]' order by id desc limit 1") or die(mysqli_error($con));
while($speak=mysqli_fetch_array($selspeaker1))
{
$cqty=$speak['currentquantity'];
}

//$amount=$value*$quantity;
//$balance=$balance+$amount;
$cqty=$cqty+$quantity;
$upspeak1=mysqli_query($con,"insert into stock values('','$item','$reason','$quantity','','credit','$cqty','','$date','','$_SESSION[coopid]')")or die(mysqli_error($con));
// mysqli_query($con,"insert into retained values('','$value','0','$date','$item','$_SESSION[coopid]')")or die(mysqli_error($con));
   echo"Data saved successfully..";
     echo"<meta http-equiv=\"refresh\" content=\"1;URL=updatestock.php\">";


?>
</body>
</html>
