<?php
session_start();
if(!isset($_SESSION['username']))
{
header("location: logg.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>INEZA POLYCLINIQUE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php


include("dbcon.php");
$tel="$gg$phone";
$cd="";
$insert1=mysql_query("insert into bankv values('','$firstname','$ln','$accno','$bdate','$regno')"); 



if(!$insert1){echo"not  ".mysql_error();}

else
{
	  		      echo "<meta http-equiv=\"refresh\" content=\"0;URL=bankdetail.php\">";
}
?>
</body>
</html>
