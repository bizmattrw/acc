<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$bank=$_POST['bank'];
include("dbcon.php");

$insert1=mysql_query("insert into level values('','$bank')"); 



if(!$insert1){echo"not  dsved".mysql_error();}

else
{
	  		      echo "<meta http-equiv=\"refresh\" content=\"1;URL='bankaccount.php'\">";echo"<br><br><br><center><font color=green size=+2>New Bank added!</font><br>";
}
?>

</body>
</html>
