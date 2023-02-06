	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$amount=$_POST['amount'];
$year=$_POST['year'];
$account=$_POST['account'];
include("dbcon.php");

$insert1=mysqli_query($con,"update sources set codename='$account',amount='$amount',amountremain='$amount',year='$year' where id='$id'"); 


if(!$insert1)
{ 
echo"failed to update?" .mysqli_error();
}
 else{
      echo"<meta http-equiv=\"refresh\" content=\"1;URL=updatesources.php\">";

	}
	}

	?>