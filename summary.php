<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	  
<?php include('menu.php'); ?>				
<?php include('header.php'); ?>				

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 30px">
<style>div.panel { min-width: 0px; margin-bottom: 10px }div.panel div.header { background-color: ivory; border-bottom: 1px solid #EEEEEE; border-top-left-radius: 4px; 
border-top-right-radius: 4px; text-shadow: 1px 1px 0 #FFFFFF; padding: 20px; box-shadow: inset 0px 1px 0px #fff; }div.panel div.title { font-weight: bold; font-size: 18px 
}div.panel div.title span.emphasis { border-bottom: 2px solid #333 }div.panel div.description { color: #333; font-size: 12px; padding-top: 10px }div.panel div.balance 
{ float: right; font-size: 18px; font-weight: bold }div.panel div.body { padding: 20px }div.panel div.footer { background-color: #f6f6f6; border-top: 1px solid #EEEEEE; 
border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; text-shadow: 1px 1px 0 #FFFFFF; padding: 10px 20px; 
text-align: center }div.panel div.placeholder { padding: 20px; color: #999; text-align: center; font-size: 14px; 
line-height: 28px }div.panel table { width: 100%; font-size: 12px }div.panel table td { padding: 5px 0px }</style>
<div class="panel panel-default"><div class="panel-heading">
<span class="header">Summary</span><a href="" 
class="btn btn-default btn-sm" style="font-weight: bold; margin-left: 10px">Set Period</a></div>
<div class="panel-body well">
<table style="width: 100%"><tr><td style="width: 50%; padding-right: 10px; vertical-align: top">
<div style="padding-bottom: 10px"><div style="text-align: center; color: #ccc; font-size: 14px; font-weight: bold; text-shadow: 1px 1px 0px #fff">Balance Sheet</div>
<div style="text-align: center; color: #ccc; font-size: 12px; text-shadow: 1px 1px 0px #fff">As at 3/15/2018</div></div><div class="panel">
<div class="header">
<div class="balance">
Value=
  <?php 
								include('dbcon.php');
								  
								  $user_query=mysqli_query($con,"select value from assets")or die(mysqli_error());
								  $totvalue=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['value'];
									$totvalue+=$value;
									}
									echo"$totvalue";  
									?>
									</div>
									<div class="title">Assets</div></div>
									<div class="body">
									<table><tr><td style="padding-left: 0px"></td>
<td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
                             
                                    <tr>
                                        <th>ASSET</th>
                                        <th>VALUE</th>                                 
                                        <th>DEPRECIATION</th>                                 
                                          <th>DATE</th>      
                                    </tr>
                               
								 
                                  <?php 
								  
								  $user_query=mysqli_query($con,"select * from assets")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['asset']; ?></td> 
                                    <td><?php echo $row['value']; ?></td> 
                                    <td><?php echo $row['depreciation']; ?></td> 
                                    <td><?php echo $row['date']; ?></td> 
                                 
                                 
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                               
                            </table>

</td></tr></table></div></div>
<div class="panel"><div class="header"><div class="balance">
  <?php 
								  
								  $user_query=mysqli_query($con,"select amount from bank where action='credit'")or die(mysqli_error());
								  $totcredit=$tot=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totcredit+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select amount from bank where action='debit'")or die(mysqli_error());
								  $totdebit=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totdebit+=$amount;
									}
									$tot=$totdebit-$totcredit;
									echo"Total Balance=$tot";
									?>

</div><div class="title"><span class="emphasis">Banks</span> Situation
</div></div><div class="body"><table>
<tr>
<td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								  
$sel=mysqli_query($con,"select sum(amount) as amount,bankname,id,account from bank group by bankname,account");
   echo" <tr>
   <th align=center>Account</td> <th align=center>Bank name</td><th align=center>Amount debited</td><th align=center>Amount credited</td><th align=center>Balance</td>
   </TR>";

while($med=mysqli_fetch_array($sel))
{
$bankname=$med['bankname'];
$account=$med['account'];
$amount=$med['amount'];
$id=$med['id'];
$sel1=mysqli_query($con,"select sum(amount) as am from bank where action='debit' and account='$account' group by bankname,account");
$med1=mysqli_fetch_array($sel1);
$amountdebit=$med1['am'];
$sel2=mysqli_query($con,"select sum(amount) as amcredit from bank where action='credit' and account='$account' group by bankname,account");
$med2=mysqli_fetch_array($sel2);
$amountcredit=$med2['amcredit'];
if($amountcredit==null){$amountcredit=0;}
if($amountdebit==null){$amountdebit=0;}
$amt=$amountdebit-$amountcredit;
print("<tr bgcolor=white>
<td align=center> $account</td><td align=center> $bankname</td><td align=center> $amountdebit</td><td align=center> $amountcredit</td>
<td align=center>$amt</td>
</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>

</td></tr>
</table></div></div><div class="panel"><div class="header"><div class="balance">
  <?php 
								  
								  $user_query=mysqli_query($con,"select amount from caisse where action='credit'")or die(mysqli_error());
								  $totcreditcaisse=$totcaisse=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totcreditcaisse+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select amount from caisse where action='debit'")or die(mysqli_error());
								  $totdebitcaisse=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totdebitcaisse+=$amount;
									}
									$totcaisse=$totdebitcaisse-$totcreditcaisse;
									echo"Total Balance=$totcaisse";
									?>

</div><div class="title">Caisse</div></div><div class="body">
<center>
<table><tr><td style="padding-left: 0px"></td>
<td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
  <?php 
							   echo"<thead> <tr>
   <th align=center>Amount Credited</td><th align=center>Amount Debited</td><th align=center>Balance</td>
   </TR></thead><tbody>";
	  
								  $user_query=mysqli_query($con,"select amount from caisse where action='credit'")or die(mysqli_error());
								  $totcreditcaisse=$totcaisse=0;
									while($row=mysqli_fetch_array($user_query)){
									$amountcredited=$row['amount'];
									$totcreditcaisse+=$amountcredited;
									}
								  
								  $user_query=mysqli_query($con,"select amount from caisse where action='debit'")or die(mysqli_error());
								  $totdebitcaisse=0;
								  if(mysqli_num_rows($user_query)<=0){$amountdebited=0;}
								  else{
									while($row=mysqli_fetch_array($user_query)){
									$amountdebited=$row['amount'];
									$totdebitcaisse+=$amountdebited;
									}
									}
									$totcaisse=$totdebitcaisse-$totcreditcaisse;
																		
print("<tr bgcolor=white>
<td align=center> $amountcredited</td><td align=center> $amountdebited</td>
<td align=center>$totcaisse</td>
</tr>");
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
									


</td></tr>
</table></center></div></div>

<div class="panel"><div class="header"><div class="balance">
  <?php 
								  
								  $user_query=mysqli_query($con,"select value from amadeni where action='incoming'")or die(mysqli_error());
								  $totcreditincome=$totamadeni=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['value'];
									$totcreditincome+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select value from amadeni where action='outgoing'")or die(mysqli_error());
								  $totdebitoutgoing=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['value'];
									$totdebitoutgoing+=$amount;
									}
									$totamadeni=$totcreditincome-$totdebitoutgoing;
									echo"Total Balance=$totamadeni";
									?>

</div><div class="title">Amadeni</div></div><div class="body">
<center>
<table><tr><td style="padding-left: 0px"></td>
<td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
  <?php 
							   echo"<thead> <tr>
   <th align=center>Credit In</td><th align=center>Credit Out</td><th align=center>Balance</td>
   </TR></thead><tbody>";
	  
								  $user_query=mysqli_query($con,"select value as amount from amadeni where action='incoming'")or die(mysqli_error());
								  $totcreditincome=$totamadeni=0;
									while($row=mysqli_fetch_array($user_query)){
									$amountin=$row['amount'];
									$totcreditincome+=$amountin;
									}
								  
								  $user_query=mysqli_query($con,"select value as amount from amadeni where action='outgoing'")or die(mysqli_error());
								  $totdebitoutgoing=0;
								  if(mysqli_num_rows($user_query)<=0){$amountout=0;}
								  else{
									while($row=mysqli_fetch_array($user_query)){
									$amountout=$row['amount'];
									$totdebitoutgoing+=$amountout;
									}
									}
									$totamadeni=$totcreditincome-$totdebitoutgoing;
																		
print("<tr bgcolor=white>
<td align=center> $amountin</td><td align=center> $amountout</td>
<td align=center>$totamadeni</td>
</tr>");
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
									


</td></tr>
</table></center></div></div>


<div class="panel"><div class="header"><div class="balance">
  <?php 
								  
								  $user_query=mysqli_query($con,"select value as amount from stock where action='credit'")or die(mysqli_error());
								  $totcreditstock=$totstock=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totcreditstock+=$amount;
									}
								  
								  $user_query=mysqli_query($con,"select value as amount from stock where action='debit'")or die(mysqli_error());
								  $totdebitstock=0;
									while($row=mysqli_fetch_array($user_query)){
									$amount=$row['amount'];
									$totdebitstock+=$amount;
									}
									$totstock=$totcreditstock-$totdebitstock;
									echo"Total Balance=$totstock";
									?>

</div><div class="title">Stock</div></div><div class="body">
<center>
<table><tr><td style="padding-left: 0px"></td>
<td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
  <?php 
								  
$sel=mysqli_query($con,"select sum(quantityadded) as quantityadded,sum(quantityremoved) as quantityremoved,item,sum(value) as value from stock group by item
ORDER BY item asc") or die(mysqli_error());
   echo"<thead> <tr>
    <th align=center>Item</td><th align=center>Qauantity added</td><th align=center>Quantity removed</td><th align=center>current qty</td>
   <th align=center>Balance</td>
   </TR></thead><tbody>";

while($med=mysqli_fetch_array($sel))
{
$item=$med['item'];
$quantitya=$med['quantityadded'];
$quantityr=$med['quantityremoved'];
$cqty=$quantitya-$quantityr;
$selc=mysqli_query($con,"select sum(value) as value from stock where item='$item' and action='credit' group by item")or die(mysqli_error());
$med1=mysqli_fetch_array($selc);
$amcredit=$med1['value'];
$selc1=mysqli_query($con,"select sum(value) as value from stock where item='$item' and action='debit' group by item");
$med2=mysqli_fetch_array($selc1);
$amdebit=$med2['value'];
$balance=$amcredit-$amdebit;
//$amt=$amountcredit-$amountdebit;
print("<tr bgcolor=white>
<td align=center> $item</td><td align=center> $quantitya</td><td align=center> $quantityr</td><td align=center> $cqty</td>
<td align=center>$balance</td>
</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
									


</td></tr>
</table></center></div></div>


</td>
<td style="width: 50%; padding-left: 10px; vertical-align: top"><div style="padding-bottom: 10px">
<div style="text-align: center; color: #ccc; font-size: 14px; font-weight: bold;
 text-shadow: 1px 1px 0px #fff">Profit and Loss Statement</div><div style="text-align: center; color: #ccc; font-size: 12px; text-shadow: 1px 1px 0px #fff">For the period from 3/15/2018
  to 3/15/2018</div></div><div class="panel">
  <div class="header"><div class="balance">
    <?php 
								  $user_query=mysqli_query($con,"select amount as value from income")or die(mysqli_error());
								  $totincome=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['value'];
									$totincome+=$value;
									}
									echo"Total Amount=$totincome";  
									?>

  
  
  </div><div class="title">Incomes</div></div><div class="body"><table><tr>
  <td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
  
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								  
$sel=mysqli_query($con,"select sum(amount) as amount,source,date from income group by source order by source asc ");
   echo"<thead> <tr>
   <th align=center>Sources</td> <th align=center>Amount</td>
   </TR></thead><tbody>";

while($med=mysqli_fetch_array($sel))
{
$source=$med['source'];
$amount=$med['amount'];
//$id=$med['id'];
$date=$med['date'];
print("<tr bgcolor=white>
<td align=center> $source</td><td align=center> $amount</td>

</tr>");
}
?>									
							
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
  
  </td></tr></table></div></div>
  <div class="panel"><div class="header"><div class="balance">
      <?php 
								  $user_query=mysqli_query($con,"select amount as value from expenses")or die(mysqli_error());
								  $totexpenses=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['value'];
									$totexpenses+=$value;
									}
									echo"Total Amount=$totexpenses";  
									?>

  </div>
  
  <div class="title"> Expenses</div></div>
  <div class="body"><table><tr><td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
 
                             <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								  
$sel=mysqli_query($con,"select sum(amount) as amount,account from expenses group by account order by account asc ");
   echo"<thead> <tr>
   <th align=center>Budget line</td> <th align=center>Amount</td>
   </TR></thead><tbody>";

while($med=mysqli_fetch_array($sel))
{
$source=$med['account'];
$amount=$med['amount'];
//$id=$med['id'];
//$date=$med['date'];
print("<tr bgcolor=white>
<td align=center> $source</td><td align=center> $amount</td>

</tr>");
}
?>									
							
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
  

 </td></tr></table></div></div>
 
 
                            </table></table>

<?php include_once "footer.php" ?>

