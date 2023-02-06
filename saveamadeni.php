<?php
session_start();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>

 <BODY><center>
  <?php
$reason=$_POST['reason'];
$value=$_POST['value'];
$action=$_POST['action'];
$date2=$_POST['date2'];
$date1=$_POST['date1'];
$owner=$_POST['owner'];
$pieceno=$_POST['pieceno'];

include("dbcon.php");
$add="insert into amadeni values('','$reason','$pieceno','$value',0,'$value','$date2','$action','$owner','$date1','$_SESSION[coopid]')";
mysqli_query($con,$add)or die(mysqli_error($con));
		$filename = $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], "pieces/".$filename);
		if($action=="cooperative")	
{$upspeak2=mysqli_query($con,"insert into itubyamutungo values('','$date1','$reason','$value','','','$date1','$filename','$_SESSION[coopid]')") 
OR die("whats hell IYONGERAMUTUNGO".mysqli_error($con));
}
		else	
{$upspeak2=mysqli_query($con,"insert into iyongeramutungo values('','$date1','$reason','$value','','','$date1','$filename','$_SESSION[coopid]')") 
OR die("whats hell IYONGERAMUTUNGO".mysqli_error($con));
}

	  		     echo "<meta http-equiv=\"refresh\" content=\"1;URL='updateamadeni.php'\">"; echo"<center><font color=green size=18>Data saved successfully";



  ?>
 </BODY>
</HTML>
