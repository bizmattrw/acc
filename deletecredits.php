<?php
include('dbcon.php');

$id=$_GET['id'];
$lid=$_GET['lid'];
$amount=$_GET['amount'];
mysql_query("update amadeni set value=value+('$amount') where id='$lid'") or die(mysql_error());
mysql_query("delete from login where id='$id'") or die(mysql_error());

header('location:creditediting.php');
?>