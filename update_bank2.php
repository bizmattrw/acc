<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BANK MANAGEMENT</title>
</head>

<body bgcolor="#CCCCCC">
<?php
include("dbcon.php");
$bank=$_POST['bank'];
$names=$_POST['names'];
$date=$_POST['date'];
$particular=$_POST['names'];
$bordereau=$_POST['bordereau'];
$account=$_POST['account'];
$action=$_POST['action'];
$amount=$_POST['amount'];
$id=$_POST['id'];

$selspeaker1=mysql_query("select balance,amount from bank");
while($speak=mysql_fetch_array($selspeaker1))
{
$balance=$speak['balance'];
$am=$speak['amount'];
}


$selspeaker1c=mysql_query("select balance,amount from caisse");
while($speakc=mysql_fetch_array($selspeaker1c))
{
$balancec=$speakc['balance'];
$amc=$speakc['amount'];
}



if($action=='credit')
{

$balance=$balance-$am;
$balance=$balance+$amount;

$balancec=$balancec-$amc;
$balancec=$balancec+$amount;



$upspeak1=mysql_query("update bank set bankname='$bank',account='$account',particulars='$names',amount='$amount',
bordereau='$bordereau',action='$action',balance='$balance',date='$date' where id='$id'");

$upspeakc=mysql_query("update caisse set bankname='$bank',particulars='$names',amount='$amount',
bordereau='$bordereau',action='$action',balance='$balancec',date='$date' where id='$id'");


if(!$upspeak1)
{echo"failed to insert   ".mysql_error();}
else{
   echo"Data updated successfully..";
      echo"<meta http-equiv=\"refresh\" content=\"1;URL=update_bank.php\">";
	  }

}
else if($action=='debit')
{
$balance=$balance-$particular;
$balancec=$balancec-$particular;

$sel1=mysql_query("select sum(amount) as am from bank where action='debit' and bankname='$bank' group by bankname");
$med1=mysql_fetch_array($sel1);
$amountdebit=$med1['am'];

$sel1c=mysql_query("select sum(amount) as amc from caisse where action='debit' and bankname='$bank' group by bankname");
$med1c=mysql_fetch_array($sel1c);
$amountdebitc=$med1c['amc'];


$sel2=mysql_query("select sum(amount) as amcredit from bank where action='credit' and bankname='$bank' group by bankname");
$med2=mysql_fetch_array($sel2);
$amountcredit=$med2['amcredit'];
$amt=$amountcredit-$amountdebit;



$sel2c=mysql_query("select sum(amount) as amcreditc from caisse where action='credit' and bankname='$bank' group by bankname");
$med2c=mysql_fetch_array($sel2c);
$amountcreditc=$med2['amcreditc'];
$amtc=$amountcreditc-$amountdebitc;



if($amount>=$amt)
{
   echo"Sorry there is not enough money for this account..";
   //   echo"<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";

}



$upspeak1=mysql_query("update bank set bankname='$bank',particulars='$names',amount='$amount',bordereau='$bordereau',action='$action',date='$date',
balance='$balance' where id='$id'");


$upspeak4=mysql_query("update caisse set bankname='$bank',particulars='$names',amount='$amount',bordereau='$bordereau',action='$action',
balance='$balancec',date='$date' where id='$id'");



if(!$upspeak4){echo"failed to update  ".mysql_error();} else{
   echo"Data updated successfully..";
      echo"<meta http-equiv=\"refresh\" content=\"1;URL=update_bank.php\">";
	  }
}
else if($action=='checque')
{

$upspeak1=mysql_query("update bank set bankname='$bank',particulars='$names',amount='$amount',bordereau='$bordereau',action='$action',date='$date',
balance='$balance' where id='$id'");


   echo"Data updated successfully..";
      echo"<meta http-equiv=\"refresh\" content=\"1;URL=update_bank.php\">";
	  }
?>
</body>
</html>
