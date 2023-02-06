<?php
include('dbcon.php');

$id=$_GET['id'];

mysqli_query($con,"delete from account where id='$id'") or die(mysql_error());

header('location:updatebudget.php');
?>