﻿<?php include("session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COOPA SYSTEM</title>
<?php include('grid.php'); ?>
<body>
  <div class="container">
<p> </p>
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
				  <div id="navbar" class="print-display-none">
				  <?PHP $date1=$_GET['date1'];$date2=$_GET['date2'];?>
                    <h3 class="panel-title"><font color="#FFFFFF"><<</font><a href="updatebank.php"><img src="images/home.png" title="Home"/></A>THE DETAILS ON CAISSE: 
					<?php echo"FROM $date1 UNTIL $date2";
					echo"<a href='caisseexcel.php?date1=$date1&&date2=$date2'><img src='images/xls.png'>";?></a></h3>
                  </div></div>
                  <div class="col col-xs-6 text-right">
				  			<div class="form-group">
				</div>

                  </div>
                </div>
              </div>
              <div class="panel-body">

 
 <?PHP

include("dbcon.php");
$sel1=mysqli_query($con,"select sum(amount) as debit from caisse where  date<'$date1' and action='debit' and coopid='$_SESSION[coopid]' group by action") or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysqli_query($con,"select sum(amount) as credit from caisse where  date<'$date1' and action='credit' and coopid='$_SESSION[coopid]' group by action") or die(mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$credit=$med2['credit'];
$z=$balance=$debit-$credit;
$balancef=number_format($balance);

$sel=mysqli_query($con,"select * from caisse where date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]' order by date asc") or die(mysqli_error($con));
if(mysqli_num_rows($sel)<=0){echo"<center>Sorry no record found</center>";}
else{

    echo"<table class='table table-striped table-bordered table-list' id='example'>
   <thead>
   	<tr> <th align=center colspan=6>Opening balance: $balancef</th></tr>
   <tr>
   <th align=center>Date</td><th align=center>Order No</td><th align=center>Reference No</td>  <th align=center>Particular</td><th align=center>Reason</td><th align=center>Amount debited</td>
   <th align=center>Amount credited</td><th align=center>Balance</td>
  
   </TR></thead><tbody>";
   $x=$i=0;
while($med=mysqli_fetch_array($sel))
{
$i++;

$date=$med['date'];
$amount=$med['amount'];
$particular=$med['particulars'];
 $reason=$med['reason'];
 $refno=$med['refno'];
$id=$med['id'];
 $action=$med['action'];
$sel1=mysqli_query($con,"select amount as am from caisse where action='debit' and id='$id' and coopid='$_SESSION[coopid]' order by id asc");
$med1=mysqli_fetch_array($sel1);
$amountdebit=$med1['am'];
$sel2=mysqli_query($con,"select amount as amcredit from caisse where action='credit'  and id='$id' and coopid='$_SESSION[coopid]'  order by id asc");
$med2=mysqli_fetch_array($sel2);
$amountcredit=$med2['amcredit'];
if($amountcredit==null){$amountcredit=0;}
if($amountdebit==null){$amountdebit=0;}
$amountcreditf=number_format($amountcredit);
$amountdebitf=number_format($amountdebit);
if($action=='debit'){$balance=$balance+$amountdebit;}else{$balance=$balance-$amountcredit;}
$balancef=number_format($balance);

$amt=$amountdebit-$amountcredit;
$x+=$amt;
print("<tr><td align=center> $date</td><td align=center> $i</td><td align=center> $refno</td><td align=center> $particular</td><td align=center> $reason</td><td align=center> $amountdebitf</td>
<td align=center> $amountcreditf</td><td align=center> $balancef</td>

</tr>");
}
}

  ?>
</tbody></table>
    <br /><?php
	$sel1=mysqli_query($con,"select sum(amount) as debit from caisse where  date>='$date1' AND date<='$date2' and action='debit' and coopid='$_SESSION[coopid]' group by action") or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysqli_query($con,"select sum(amount) as credit from caisse where  date>='$date1' AND date<='$date2' and action='credit' and coopid='$_SESSION[coopid]' group by action") or die(mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$credit=$med2['credit'];
$z1=$debit-$credit;
$z2=$z1+$z;
$z2f=number_format($z2);
	echo"TOTAL BALANCE = $z2f";?><br /><hr />
       <br />
</div>
</body>
</html>
