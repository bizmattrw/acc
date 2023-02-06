<?php include("session.php");?>

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
<?php $date1=$_POST['date1']; $date2=$_POST['date2'];
?>
<div style="padding-bottom: 10px"><div style="text-align: center; color: #ccc; font-size: 14px; font-weight: bold; text-shadow: 1px 1px 0px #fff">
CAISSE TRIAL BALANCE 
<?php
                        		include('dbcon.php');
 echo" From $date1 UNTIL $date2"; echo"<a href='caissedebitcredit.php?date1=$date1&&date2=$date2'>IN DEEP</A>";?></div>
</div></td></tr><tr><td style="width: 50%; padding-right: 10px; vertical-align: top">
<div class="panel"><div class="header">
  <div class="balance">
    <?php 
						
                        		
 $user_query=mysqli_query($con,"select * from caisse WHERE date>='$date1' and date<='$date2' and action='debit' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
								  $totincome=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['amount'];
									$totincome+=$value;
									}
                                    $totincome=number_format($totincome);
									echo"Total Amount=$totincome";  
									?>

  
  
  </div><div class="title">DEBIT SIDE</div></div><div class="body">
  
  <table><tr>
  <td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
  
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								
								  
								  
 $user_query=mysqli_query($con,"select * from caisse WHERE date>='$date1' and date<='$date2' and action='debit' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
   echo"<thead> <tr>
   <th align=center>No</td><th align=center>Date</td><th align=center>Particular</td>
   <th align=center>Source</td><th align=center>account</td>
   <th align=center>Amount</td> <th align=center>Reason</td>
   </TR></thead><tbody>";
$totincome=$i=0;
while($row=mysqli_fetch_array( $user_query))
{
$date=$row['date'];
 $receiver=$row['bankname'];
  $r=$row['reason'];
 $account=$row['account'];
$particular=$row['particulars'];
$amount=number_format($row['amount']);
$amount1=$row['amount'];
 $totincome+=$amount1;
 $i++;
print("<tr bgcolor=white>
<td align=center> $i</td><td align=center> $date</td><td align=center> $particular</td><td align=center> $receiver</td>
<td align=center> $account</td><td align=center> $amount</td><td align=center> $r</td>

</tr>");
}
$totincome1=$totincome;
$totincome=number_format($totincome);
echo"<tr><th colspan=5>TOTAL</TD><TH>$totincome</th></tr>";
?>									
							
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
  
  </td></tr></table></div></div>
</td>
<td style="width: 50%; padding-left: 10px; vertical-align: top"><div style="padding-bottom: 1px">
<div style="text-align: center; color: #ccc; font-size: 12px; text-shadow: 1px 1px 0px #fff">     
  </div></div>
  <div class="panel"><div class="header"><div class="balance">
      <?php 
								
 $user_query=mysqli_query($con,"select * from caisse WHERE date>='$date1' and date<='$date2' and action='credit' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
								  $totexpenses=0;
									while($row=mysqli_fetch_array($user_query)){
									$value=$row['amount'];
									$totexpenses+=$value;
									}
                                    $totexpenses=number_format($totexpenses);
									echo"Total Amount=$totexpenses";  
									?>

  </div>
  
  <div class="title"> Credit side</div></div>
  <div class="body"><table><tr><td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
 
                             <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								
								  
								  
 $user_query=mysqli_query($con,"select * from caisse WHERE date>='$date1' and date<='$date2' and action='credit' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
   echo"<thead> <tr>
   <th align=center>No</td><th align=center>Date</td><th align=center>Particular</td>
   
   <th align=center>Amount</td><th align=center>Reason</td>
   </TR></thead><tbody>";
$totexpenses=$i=0;
while($row=mysqli_fetch_array( $user_query))
{
$date=$row['date'];
 $receiver=$row['bankname'];
 $account=$row['account'];
$particular=$row['particulars'];
$amount=number_format($row['amount']);
$amount1=$row['amount'];
$r=$row['reason'];
 $totexpenses+=$amount1;
 $i++;
print("<tr bgcolor=white>
<td align=center> $i</td><td align=center> $date</td><td align=center> $particular</td>
<td align=center> $amount</td><td align=center> $r</td>

</tr>");
}
$totexpenses1=$totexpenses;
$totexpenses=number_format($totexpenses);
echo"<tr><th colspan=3>TOTAL</TD><TH>$totexpenses</th></tr>";

?>									
							
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>
  

 </td></tr></table></div></div>
 </td></tr><tr><td colspan="2">
 <div class="panel"><div class="body" style="background-color: #ffffee">
 
 <div class="balance"><?php $netprofit=$totincome1-$totexpenses1; $netprofit=number_format($netprofit); echo"$netprofit";?></div><div class="title">Balance</div></div></div></table></div></div>
                            </table></table>


