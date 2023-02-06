<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
$date=$_POST['date'];
$l=$_POST['liability'];
$contact=$_POST['amountpay'];
$amount=$_POST['amount'];
$pay=$amount-$contact;
if($pay<0)
{

  print("<script> alert('WASHYIZEMWO AMAFARANGA ARUTA ASANZWEMWO (arimwo: $amount, ayinjijwe: $contact)!');</script>"); 
    echo "<br><meta http-equiv=\"refresh\" content=\"0;URL=liabilitiespayment2.php?id=$id\">"; exit();}
else{
mysql_query("update liabilities set amount='$pay' where id='$id'")or die(mysql_error());
mysql_query("insert into levelscaisse values('','$l','$date','$contact','$id')")or die(mysql_error());
		}						
header('location:liabilitiespayment.php');
}
?>	