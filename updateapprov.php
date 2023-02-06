<?php include("session.php");?>
	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$amount=$_POST['amount'];
$year=$_POST['year'];
$account=$_POST['account'];
$pamount=$_POST['pamount'];
$newbline=$_POST['newbline'];
$amounttaken=$_POST['amounttaken'];
$amountremain=$_POST['amountremain'];
$x=$pamount-$amountremain;
$y=$amount-$x;
		if ($amount < $amounttaken) {
			echo "<script>alert('Amount to revise should not be greater than the budget')</script>";
			echo"<meta http-equiv=\"refresh\" content=\"1;URL=approvisionement.php\">";
		}
			else
			{
include("dbcon.php");
		$query2 = mysqli_query($con, "select * from account where codename='$newbline'");
		$row3 = mysqli_fetch_array($query2);

		$newblineAmount = $row3['amount'];
$insert1=mysqli_query($con,"insert into revisedbudget values('','$account','$amount','$newbline','$newblineAmount','$amounttaken',now(),'$_SESSION[coopid]')") or die(mysqli_error($con));

		$newBudgetline1 = $amount - $amounttaken;
		$newBudgetline2 = $newblineAmount + $amounttaken;

$insert1=mysqli_query($con,"update account set amount='$newBudgetline1',amountremain='$y',year='$year' where id='$id' and codename='$account' and coopid='$_SESSION[coopid]'") or die(mysqli_error($con)); 

$insert2=mysqli_query($con,"update account set amount='$newBudgetline2' where codename='$newbline' and coopid='$_SESSION[coopid]'") or die(mysqli_error($con)); 

if(!$insert1)
{ 
echo"failed to update?" .mysqli_error($con);
}
 else{
      echo"<meta http-equiv=\"refresh\" content=\"0;URL=approvisionement.php\">";

	}
	
	}
}
	?>