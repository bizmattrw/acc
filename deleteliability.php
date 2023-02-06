<?php
include('dbcon.php');

$id=$_GET['id'];

mysqli_query($con,"delete from liabilities where id='$id'") or die(mysqli_error($con));

header('location:updateliabilities.php');
?>