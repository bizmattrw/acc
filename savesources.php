<?php include("session.php");?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include('dbcon.php');
if(isset($_POST['submit']))
{
$account=$_POST['account'];
$year=$_POST['year'];
$amount=$_POST['amount'];

for($i=0;$i<count($account);$i++)
{
$chk="select * from sources where '$account[$i]'=codename and year='$year'";
$chk1=mysqli_query($con,$chk)or die(mysqli_error($con));
$chk2=mysqli_num_rows($chk1);
if($chk2!=null)
{
 echo "<meta http-equiv=\"refresh\" content=\"2;URL='sources.php'\">";echo"<br><br><br><center><font color=green size=+2>Income source $account already exists in $year!</font><br>";
 exit();	
}
else{
$add=mysqli_query($con,"insert into sources values('','$account[$i]','$year','','$amount[$i]','$amount[$i]','$_SESSION[coopid]')")or die(mysqli_error($con));
 echo "<meta http-equiv=\"refresh\" content=\"2;URL='sources.php'\">";echo"<br><br><br><center><font color=green size=+2>Data saved successfully!</font><br>";
}
}
}
?>

</body>
</html>
