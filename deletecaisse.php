<?php
include('dbcon.php');

$id=$_GET['id'];
$bline=$_GET['bline'];
$am=$_GET['amount'];
$date=$_GET['date'];
$reason=$_GET['reason'];
mysqli_query($con,"delete from caisse where id='$id'") or die(mysqli_error($con));
mysqli_query($con,"delete from expenses where duedate='$date' and account='$bline' and reason='$reason' and amount='$am'") or die(mysqli_error($con));
mysqli_query($con,"delete from bank where date='$date' and bordereau='$reason' and amount='$am'") or die(mysqli_error($con));
$year=date("Y");

mysqli_query($con,"update account set amountremain=(amountremain+'$am') where year='$year' and codename='$bline' and year='$year'")or die(mysql_error());

header('location:updatecaisse.php');
?>