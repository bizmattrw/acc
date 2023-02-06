<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
                                  <?php 
								include('dbcon.php');
								  
$sel=mysql_query("select sum(quantityadded) as quantityadded,sum(quantityremoved) as quantityremoved,date,item,currentquantity,balance,id,value
where id='$id' from stock group by item,date
ORDER BY id asc") or die(mysql_error());
while($med=mysql_fetch_array($sel))
{
$item=$med['item'];
$quantitya=$med['quantityadded'];
$quantityr=$med['quantityremoved'];
$cqty=$med['currentquantity'];
$balance=$med['balance'];
$value=$med['value'];

$date=$med['date'];
$id=$med['id'];
//$amt=$amountcredit-$amountdebit;
}
									
$result=mysql_query("delete from expenses where id='$id'");
if($result)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=updateexpenses1.php?date1=$datehidden\">";
}
?>

</body>
</html>
