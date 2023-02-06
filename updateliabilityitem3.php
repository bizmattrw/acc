	<?php
	if (isset($_POST['submit'])){
$id=$_POST['id'];
$account=$_POST['account'];
include("dbcon.php");

$insert1=mysqli_query($con,"update instititution set liability='$account' where id='$id'") or die(mysqli_error($con)); 


if(!$insert1)
{ 
echo"failed to update?" .mysql_error();
}
 else{
      echo"<meta http-equiv=\"refresh\" content=\"1;URL=updateliabilitiesitem.php\">";

	}
	}

	?>