<?php include("session.php");?>
	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$amount=$_POST['amount'];
$code=$_POST['code'];
$year=$_POST['year'];
$account=$_POST['account'];
include("dbcon.php");

$insert1=mysqli_query($con,"update account set codename='$account',budgetcode='$code',amount='$amount',amountremain='$amount',year='$year' where id='$id'") or die(mysqli_error($con)); 

      echo"<meta http-equiv=\"refresh\" content=\"0;URL=updatebudget.php\">";

	}

	?>