<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>COOPA SYSTEM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$reason=$_POST['reason'];
$receiver=$_POST['receiver'];
$value=$_POST['value'];
$account=$_POST['account'];
$year=$_POST['year'];
$date=$_POST['date'];
include("dbcon.php");


$selspeaker1=mysql_query("select amount,amountremain,id,codename,year from account where codename='$account' and year='$year'") or die(mysql_error());
while($speak=mysql_fetch_array($selspeaker1))
{
$am=$speak['amount'];
$amrem=$speak['amountremain'];
}
$current=$amrem-$value;
if($value>$am)
{ 
   echo"Mwihangane amafaranga mushaka arenze ayateganyijwe..";
      echo"<meta http-equiv=\"refresh\" content=\"2;URL=expenses1.php?year=$year\">";
exit();
}

if($value>$amrem)
{ 
   echo"Mwihangane amafaranga mushaka arenze asigaye Kuri iyi $account.. muri $year";
      echo"<meta http-equiv=\"refresh\" content=\"2;URL=expenses1.php?year=$year\">";
exit();
}
else
{


//$upspeak1=mysql_query("insert into caisse values('','$bank','$compte','$fn1 $ln1','$amount1','$reason','debit','$balance','$date1')")or die(mysql_error());
   //echo"Data saved successfully..";
 //     echo"<meta http-equiv=\"refresh\" content=\"1;URL=expenses.php\">";
//$amleft=$muh1-$amount1;
$issa=mysql_query("update account set amountremain='$current' where year='$year' and codename='$account' ") or die(mysql_error());
$ins1=mysql_query("insert into expenses values('$value','$reason','$account','','$date','caisse','','$receiver')") or die("failed to select".mysql_error());
   echo"<font size=18 color=green>DATA SAVED SUCCESSFULLY";
     echo"<meta http-equiv=\"refresh\" content=\"1;URL='receipt1.php?amount=$value&&names=$receiver&&reason=$reason&&date=$date'\">";

/*			   
echo"<font size=+1><center><STRONG><u>INYEMEZABWISHYU</u></STRONG></center></font><br><br>";
echo"<center>Njyewe $fn1   $ln1 ufite irangamuntu nimero :  $pass <br>,mpawe amafaranga $amount1 na INEZA POLYCLINIC : kubera $reason 
<br> kuwa    $DateX</b></center>";
echo"<br><br>";

echo"$fn1   $ln1 :<p><p align=right>Tariki:.........  $DateX";
*/

}

?>
</body>
</html>
