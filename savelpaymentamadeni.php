<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
$l=$_POST['ideni'];
$date=$_POST['date'];
$contact=$_POST['amountpay'];
$amount=$_POST['amount'];
$pay=$amount-$contact;
if($pay<0)
{

  print("<script> alert('WASHYIZEMWO AMAFARANGA ARUTA ASANZWEMWO (arimwo: $amount, ayinjijwe: $contact)!');</script>"); 
    echo "<br><meta http-equiv=\"refresh\" content=\"0;URL=payamadeni.php?id=$id\">"; exit();}
else{
mysql_query("update amadeni set value='$pay' where id='$id'")or die(mysql_error());
mysql_query("insert into login values('','$l','$contact','$date','$id')")or die(mysql_error());
		}						
header('location:updateamadeni.php');
}
?>	