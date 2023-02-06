<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include("dbcon.php");
$amount=$_GET['amount'];
$year=$_GET['year'];
$id=$_GET['id'];
$account=$_GET['account'];
mysql_query("update account set amountremain=(amountremain+$amount) where codename='$account' and year='$year'")or die(mysql_error());

$result=mysql_query("delete from expenses where id='$id'");
if($result)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=updateexpenses.php?\">";
}
?>

</body>
</html>
