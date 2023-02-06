<?php include("session.php");?>
	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$value=$_POST['value'];
$date=$_POST['date'];
$asset=$_POST['asset'];
$depreciation=$_POST['depreciation'];
include("dbcon.php");

$insert1=mysqli_query($con,"update assets set asset='$asset',value='$value',date='$date',depreciation='$depreciation' where id='$id'
 and coopid='$_SESSION[coopid]'")or die(mysqli_error($con)); 


      echo"<meta http-equiv=\"refresh\" content=\"1;URL=updateassets.php\">";echo"<center> <font size=25 color=greaan>Assets Updated";

	}

	?>