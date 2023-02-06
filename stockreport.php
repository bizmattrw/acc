<?php include("session.php");?>
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
				  <?PHP $date1=$_GET['date1'];$date2=$_GET['date2']; $item=$_GET['item'];?>
                    <h5 class="panel-title"><font color="#FFFFFF"></font><a href="stockform.php"><img src="images/home.png" title="Home"/></A>THE DETAILS ON STOCK: 
					<?php echo"FROM $date1 UNTIL $date2 ON $item";
					echo"<a href='stockreportexcel.php?date1=$date1&&date2=$date2&&item=$item'><img src='images/xls.png'>";?></A>
					<?php echo"<a href='stockcard.php?date1=$date1&&date2=$date2&&item=$item'>";?>SUMMARY</a>
					</h3>
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
$sel1=mysqli_query($con,"select sum(quantityadded) as debit from stock where  date<'$date1' and action='credit' and item='$item' and coopid='$_SESSION[coopid]' group by action") or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysqli_query($con,"select sum(quantityremoved) as credit from stock where  date<'$date1' and action='debit' and item='$item' and coopid='$_SESSION[coopid]' group by action") or die(mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$credit=$med2['credit'];
$z=$balance=$debit-$credit;
$balancef=number_format($balance);

$sel=mysqli_query($con,"select * from stock where date>='$date1' and date<='$date2' and item='$item'  and coopid='$_SESSION[coopid]' order by date,id asc") or die(mysqli_error($con));
if(mysqli_num_rows($sel)<=0){echo"<center>Sorry no record found</center>";}
else{

    echo"<table class='table table-striped table-bordered table-list' id='example'>
  
   	<tr> <th align=center colspan=11>Opening balance: $balancef</th></tr>
   <tr>
      	<tr> <th colspan=2></th><th align=center colspan=3>ENTRY</th><th align=center colspan=3>EXIT</th><th colspan=3></th></tr>
   <tr>

   <th align=center>No</td>  <th align=center>Date</td><th align=center>Quantity Added</td><th align=center>U.Price</td><th align=center>Total Cost</td>
   <th align=center>Quantity Removed</td><th align=center>U.Price</td><th align=center>Total Value</td><th align=center>Balance</td><th align=center>U.P</td><th align=center>Value in Amount</td>
  
   </TR>";
   $x=$i=$totqa=$totqr=$totva=$totvr=0;
while($med=mysqli_fetch_array($sel))
{
$i++;

$date=$med['date'];
//$qa=$med['quantityadded'];
//$qr=$med['quantityremoved'];
$id=$med['id'];
 $action=$med['action'];
$sel1=mysqli_query($con,"select quantityadded as am from stock where action='credit' and id='$id' and item='$item' order by date,id asc");
$med1=mysqli_fetch_array($sel1);
$amountdebit=$med1['am'];
$sel2=mysqli_query($con,"select quantityremoved as amcredit from stock where action='debit'  and id='$id' and item='$item'  order by date,id asc") or die(mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$amountcredit=$med2['amcredit'];
if($amountcredit==0){$amountcredit=0;}
if($amountdebit==0){$amountdebit=0;}
$amountcreditf=number_format($amountcredit);
$amountdebitf=number_format($amountdebit);
if($action=='credit'){$balance=$balance+$amountdebit;}else{$balance=$balance-$amountcredit;}
$balancef=number_format($balance);
$totqr+=$amountcredit;
$totqa+=$amountdebit;
$year=date("Y");
$sel2=mysqli_query($con,"select pprice from levels where year='$year' and pprice>0 and item='$item' and coopid='$_SESSION[coopid]'");
$med2=mysqli_fetch_array($sel2);
$pprice=$med2['pprice'];
$sel3=mysqli_query($con,"select sprice from levels where year='$year' and sprice>0 and coopid='$_SESSION[coopid]'");
$med3=mysqli_fetch_array($sel3);

$sprice=$med3['sprice'];
$amt=$amountdebit-$amountcredit;
$x+=$amt;
$valuea=$amountdebit*$pprice;
$totva+=$valuea;

$valuer=$amountcredit*$sprice;
$totvr+=$valuer;
$valueaf=number_format($valuea);
$valuerf=number_format($valuer);
$valueb=$balance*$sprice;
$valuebf=number_format($valueb);
print("<tr><td align=center> $i</td><td align=center> $date</td><td align=center> $amountdebitf</td><td align=center> $pprice</td><td align=center> $valueaf</td>
<td align=center> $amountcreditf</td><td align=center> $sprice</td><td align=center> $valuerf</td><td align=center> $balancef</td><td align=center> $sprice</td><td align=center>
 $valuebf</td>

</tr>");
}
$totqaf=number_format($totqa);
$totqrf=number_format($totqr);
$totvaf=number_format($totva);
$totvrf=number_format($totvr);
echo"<tr><th colspan=2>TOTALS</TH><th>$totqaf</th><th></th><th>$totvaf</th><th>$totqrf</th><th></th><th>$totvrf</th></tr>";
}

  ?>
</tbody></table>
    <br /><?php
$sel1=mysqli_query($con,"select sum(quantityadded) as debit from stock where  date>='$date1' AND date<='$date2' and action='credit' and item='$item' group by action") or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysqli_query($con,"select sum(quantityremoved) as credit from stock where  date>='$date1' AND date<='$date2' and action='debit' and item='$item' group by action") or die(mysqli_error($con));
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
