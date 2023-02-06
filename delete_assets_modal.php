<?php
include('dbcon.php');

$id=$_GET['id'];

mysqli_query($con,"delete from assets where id='$id'") or die(mysqli_error($con));

header('location:updateassets.php');
?>