<?php
include('dbcon.php');

$id=$_GET['id'];

mysqli_query($con,"delete from instititution where id='$id'") or die(mysqli_error($con));

header('location:updateliabilitiesitem.php');
?>