<?php
$item=$_POST['item'];
include('dbcon.php');
$sel_query=mysqli_query($con,"select currentquantity from stock where item='$item'");
$row=mysqli_fetch_array($sel_query);
$quantity=$row['currentquantity'];
echo"$quantity";
?>