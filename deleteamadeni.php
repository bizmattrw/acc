<?php
include('dbcon.php');

$id=$_GET['id'];

mysql_query("delete from amadeni where id='$id'") or die(mysql_error());

header('location:updateamadeni.php');
?>