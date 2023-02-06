	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$account=$_POST['account'];
$bank=$_POST['bank'];

include("dbcon.php");

//$insert1=mysqli_query($con,"update level set Level='$bank' where Level_id='$id'") or die(mysqli_error($con)); 
$insert1=mysqli_query($con,"update combination set Combination='$account' where Combination='$id'") or die(mysqli_error($con)); 


      echo"<meta http-equiv=\"refresh\" content=\"1;URL=updatebankaccount.php\">";

	}

	?>