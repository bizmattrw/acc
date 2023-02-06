<?php
include('dbcon.php');

$id=$_GET['id'];
$lid=$_GET['lid'];
$amount=$_GET['amount'];
mysql_query("update liabilities set amount=amount+('$amount') where id='$lid'") or die(mysql_error());
mysql_query("delete from levelscaisse where id='$id'") or die(mysql_error());

header('location:updatelpayment.php');
?>