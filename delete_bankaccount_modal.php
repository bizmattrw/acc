<?php
include('dbcon.php');

$id=$_GET['id'];
$accno = $_GET["acc"];

mysqli_query($con,"DELETE FROM Combination WHERE Level_id='$id' AND Combination = '$accno'") or die(mysql_error());
header('location:updatebankaccount.php');
?>