<?php include'session.php';?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
	  
	
  

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 30px">
<style>div.panel { min-width: 0px; margin-bottom: 10px }div.panel div.header { background-color: ivory; border-bottom: 1px solid #EEEEEE; border-top-left-radius: 4px; 
border-top-right-radius: 4px; text-shadow: 1px 1px 0 #FFFFFF; padding: 20px; box-shadow: inset 0px 1px 0px #fff; }div.panel div.title { font-weight: bold; font-size: 18px 
}div.panel div.title span.emphasis { border-bottom: 2px solid #333 }div.panel div.description { color: #333; font-size: 12px; padding-top: 10px }div.panel div.balance 
{ float: right; font-size: 18px; font-weight: bold }div.panel div.body { padding: 20px }div.panel div.footer { background-color: #f6f6f6; border-top: 1px solid #EEEEEE; 
border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; text-shadow: 1px 1px 0 #FFFFFF; padding: 10px 20px; 
text-align: center }div.panel div.placeholder { padding: 20px; color: #999; text-align: center; font-size: 14px; 
line-height: 28px }div.panel table { width: 100%; font-size: 12px }div.panel table td { padding: 5px 0px }</style>
<div class="panel panel-default">
<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: center; min-width: 100px">
<p><p><p><p><p><p><p><p><p><p><p><p><div><div><table style="width: 100%"><tr><td style="width: 50%; padding-right: 10px; vertical-align: top" colspan="2">
<?php $date1=$_GET['date1']; $date2=$_GET['date2'];?>
<div style="padding-bottom: 10px"><div style="text-align: center; color: #ccc; font-size: 14px; font-weight: bold; text-shadow: 1px 1px 0px #fff">BALANCE SHEET FROM 
<?php echo"$date1 UNTIL $date2";?></div>
</div></td></tr><tr><td style="width: 50%; padding-right: 10px; vertical-align: top">
<div class="panel"><div class="header">
  <div class="balance">
    <?php 
include("dbcon.php");
								 header("Content-type: application/vnd-ms-excel");
                                 header("Content-Disposition: attachment; filename=BALANCESHEET.xls");



								  $user_query=mysqli_query($con,"select amount as value from income where date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]'")or die("FAILED INCOME".mysqli_error($con));
								  $totincome=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['value'];
									$totincome+=$value;
									}
									 
									?>

  
  
  </div><div class="title">CURRENT ASSETS</div></div><div class="body">
  
  <table><tr>
  <td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
  
					
                            <table cellpadding="0" cellspacing="0" border="2" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								
								  //BANK VALUE
								  $user_query=mysqli_query($con,"select amount from bank where action='credit'  and date<='$date2' and coopid='$_SESSION[coopid]'")or die("FAILED BANK".mysqli_error($con));
								  $totcredit=$totbank=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totcredit+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select amount from bank where action='debit' and  date<='$date2' and coopid='$_SESSION[coopid]'")or
								   die("FAILED BANK".mysqli_error($con));
								  $totdebit=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totdebit+=$amount;
									}
									$totbank=$totdebit-$totcredit;
									
							//CAISSE VALUE
								$user_query=mysqli_query($con,"select amount from caisse where action='credit' and  date<='$date2' and coopid='$_SESSION[coopid]'")or die("FAILED CAISSE".mysqli_error($con));
								  $totcreditcaisse=$totcaisse=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totcreditcaisse+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select amount from caisse where action='debit' and date<='$date2' and coopid='$_SESSION[coopid]'")or die("FAILED CAISSE".mysqli_error($con));
								  $totdebitcaisse=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totdebitcaisse+=$amount;
									}
									$totcaisse=$totdebitcaisse-$totcreditcaisse;
									
		//CREDITS IN
								  $user_query=mysqli_query($con,"select value from amadeni where  date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]' and type='member'")or die("FAILED CAISSE".mysqli_error($con));
								  $totcreditincome=$totamadeni=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['value'];
									

									$totcreditincome+=$amount;
									}
									/* mysql_close($connect); 
                                   $con = mysql_connect("localhost","root","") or die ("could not connect");
                                    mysql_select_db("bugaramaok")or die ("could not connect");									
									 $user_query=mysqli_query($con,"select sum(ideni) as ideni from amadeni where status='unpaid' group by status")or die(mysqli_error($con));
									 $row1=mysqli_fetch_array($user_query);
									$ideni=$row1['ideni'];
									
								  $user_query1=mysqli_query($con,"select chargename,sum(chargeqty) as qty,type from umusarurov where status='unpaid' group by chargename,type")or die(mysqli_error($con));
								  $totcharge=0;
									while($row1=mysqli_fetch_array($user_query1)){
									$qty=$row1['qty'];
									$type=$row1['qty'];
									$charge=$row1['chargename'];
									$user_query2=mysqli_query($con,"select cost from pricev where chargename='$charge' ")or die(mysqli_error($con));
									$row2=mysqli_fetch_array($user_query2);
									$price=$row2['cost'];
									$x=$qty*$price;
									
									$totcharge+=$x;
									}
									

									$totcreditincome=$totcreditincome+$ideni;
									mysql_close($con);
									*/
									
									//AMOUNT FROM STOCK
								  
								  $user_query=mysqli_query($con,"select quantityadded as qty1,item from stock where action='credit' 
								  and date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]'")or die("FAILED STOCK".mysqli_error($con));
								  $totcreditstock=$totstock=0;
									while($row=mysqli_fetch_array($user_query)){
									$qty1=$row['qty1'];
									$item=$row['item'];
								  $selp=mysqli_query($con,"select sprice from levels where item='item' 
								   and coopid='$_SESSION[coopid]'")or die("FAILED SELLING PRICE".mysqli_error($con));
								   $rows=mysqli_fetch_array($selp);
								   $sprice=$rows['sprice'];
								   $amount=$sprice*$qty1;
									$totcreditstock+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select quantityremoved as qty2,item from stock where action='debit' and date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
								  $totdebitstock=0;
									while($row=mysqli_fetch_array($user_query)){
									$qty2=$row['qty2'];
									$item=$row['item'];
					              $selp2=mysqli_query($con,"select sprice from levels where item='item' 
								   and coopid='$_SESSION[coopid]'")or die("FAILED SELLING PRICE".mysqli_error($con));
								   $rows1=mysqli_fetch_array($selp2);
								   $sprice1=$rows1['sprice'];
								   $amount=$sprice*$qty2;

									$totdebitstock+=$amount;
									}
									$totstock=$totcreditstock-$totdebitstock;

								  
   echo"<thead> <tr>
   <th align=center>ASSET</td> <th align=center>VALUE</td> 
   </TR></thead><tbody>";

$totbankf=number_format($totbank);
print("<tr bgcolor=white>
<td align=left>CASH IN BANK</td><td align=left> $totbankf</td>

</tr>");
$totcaissef=number_format($totcaisse);
print("<tr bgcolor=white>
<td align=left> CASH AT HAND</td><td align=left> $totcaissef</td>

</tr>");
$totcreditincomef=number_format($totcreditincome);
print("<tr bgcolor=white>
<td align=left> DEBTORS</td><td align=left> $totcreditincomef</td>

</tr>");
$totstockf=number_format($totstock);
print("<tr bgcolor=white>
<td align=left>STOCK</td><td align=left> $totstockf</td>

</tr>");
$totcurrent=$totstock+$totcreditincome+$totcaisse+$totbank;
$totcurrentf=number_format($totcurrent);
print("<tr bgcolor=white>
<td align=right><strong>TOTAL</td><td align=right> <strong><u><u>$totcurrentf</td>

</tr>");

?>									
							
								     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
  
  </td></tr></table></div></div>
  <div class="panel"><div class="header">
  <div class="balance">
  <?php 
								
								  
								  $user_query=mysqli_query($con,"select value from assets where coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
								  $totvalue=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['value'];
									$totvalue+=$value;
									}
									 
									?>
								
									
									</div><div class="title">Non Current Assets</div></div>
									<div class="body">
									<table><tr>
<td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">

					
                            <table cellpadding="0" cellspacing="0" border="2" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
                                        <th>ASSET</th>
                                        <th>VALUE</th>                                 
                                                                        
                                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								
								  
								  $user_query=mysqli_query($con,"select id,value,asset,depreciation,date,year(date) as year from assets  where coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
								  $totfixed=0;
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr bgcolor="">
                                    <td align="left"><?php echo $row['asset']; ?></td> 
									<?php $y=date("Y"); $year=$row['year']; $dep=$row['depreciation']; $time=$y-$year;$loss=$time*$dep;?>
                                    <td align="left"><?php $value1=$row['value']; $value=$value1*$loss/100; $value=$value1-$value;
									$totfixed+=$value;
									 $valuef=number_format($value); echo "$valuef"; ?></td> 
                                    
                                  
                                 
                                 
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } 
$totfixedf=number_format($totfixed);
print("<tr bgcolor=white>
<td align=right><strong>TOTAL</td><td align=right> <strong><u><u>$totfixedf</td>

</tr>");
$totassets=$totfixed+$totcurrent;
$totassetsf=number_format($totassets);
print("<tr></tr><tr></tr><tr bgcolor=white>
<td align=right><strong>TOTAL ASSETS</td><td align=right> <strong><u><u>$totassetsf</td>

</tr>");

									?>
                           
                                </tbody>
                            </table>

</td></tr></table></div></div>

</td>
<td style="width: 50%; padding-left: 10px; vertical-align: top"><div style="padding-bottom: 1px">
<div style="text-align: center; color: #ccc; font-size: 12px; text-shadow: 1px 1px 0px #fff">     
  </div></div>
  <div class="panel"><div class="header"><div class="balance">
      <?php 
								
								  $user_query=mysqli_query($con,"select amount as value from expenses where duedate>='$date1' and duedate<='$date2' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
								  $totexpenses=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['value'];
									$totexpenses+=$value;
									}
									 
									?>

  </div>
  
  <div class="title"> Liabilities+Owner's Equity(Capital)</div></div>
  <div class="body"><table><tr><td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
 
                             <table cellpadding="0" cellspacing="0" border="2" class="table table-striped table-bordered table-list" id="example">
 
                             <tr bgcolor="#FFFFFF"><th align="center">Item</th><th>Value</th></tr>
	
	                                  
			                                  <?php 
						  
$sel=mysqli_query($con,"select sum(amount) as term,source from liabilities where date>='$date1' and date<='$date2' and source like '%pital%' and coopid='$_SESSION[coopid]'
 group by source") or die(mysqli_error($con));
$netcapital=0;

while($med=mysqli_fetch_array($sel))
{
$source=$med['source'];
$capital=$med['term'];
$netcapital+=$capital;
//$id=$med['id'];
//$date=$med['date'];
}
$capitalf=number_format($capital);
print("<tr bgcolor=white>

<td align=left> $source</td><td align=left> $capitalf</td>

</tr>");

?>	
			                                  <?php 
		$totliabilities=0;						  
$sel=mysqli_query($con,"select sum(amount) as term,source from liabilities where date>='$date1' and date<='$date2' and source NOT LIKE '%pital%' and coopid='$_SESSION[coopid]' group by source") or die(mysqli_error($con));
while($med=mysqli_fetch_array($sel))
{
$source=$med['source'];
$valeur=$med['term'];
$totliabilities+=$valeur;
//$date=$med['date'];
}
$valeurf=number_format($valeur);
print("<tr bgcolor=white>

<td align=left> $source</td><td align=left> $valeurf</td>

</tr>");

?>	

<?PHP
		//CREDITS IN
								  $user_query=mysqli_query($con,"select value from amadeni where  date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]' 
								  and type='cooperative'")or die("FAILED AMADENI COOPS".mysqli_error($con));
								  $totcreditout=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['value'];
									

									$totcreditout+=$amount;
								}
$creditoutf=number_format($amount);
print("<tr bgcolor=white>

<td align=left>Coop Credit</td><td align=left> $creditoutf</td>

</tr>");


?>

<?PHP
$totliab=$netcapital+$totliabilities+$totcreditout;
$totliabf=number_format($totliab);
print("<tr bgcolor=white>

<td align=right>TOTAL (L+C) </td><td align=right> <u>$totliabf</td>

</tr>");
?>	
			
						
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
  

 </td></tr></table></div></div>
 </td></tr><tr><td colspan="2">
 <div class="panel"><div class="body" style="background-color: #ffffee">
 
 <div class="balance"></div><div class="title"></div></div></div></table></div></div>
                            </table></table>


