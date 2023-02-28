	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$item=$_POST['item'];
$date=$_POST['date'];
$action=$_POST['action'];
$qa=$_POST['qa'];
$qr=$_POST['qr'];
$action=$_POST['action'];

include("dbcon.php");

$insert1=mysqli_query($con,"update stock set item='$item',quantityadded='$qa',quantityremoved='$qr',date='$date',action='$action' where id='$id'") or die(mysqli_error($con)); 

      echo"<meta http-equiv=\"refresh\" content=\"1;URL=updatestock.php\">";

	}

	?>