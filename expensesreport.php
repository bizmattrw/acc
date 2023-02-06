<?php include("session.php");?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint>
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
	

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; 
border-center: 1px solid #ccc; padding: 30px"><style>#printable-content table { width: 100%; border-collapse: separate }#printable-content td, #printable-content th { padding: 0px; 
vertical-align: top; font-weight: normal }#printable-content * { border-width: 0px; border-color: #000; border-style: solid }</style><div class="panel panel-default">
<div class="panel-heading"><table style="border-collapse: separate; width: 100%"><tr><td style="padding-right: 10px; white-space: nowrap; width: 1px; height: 32px">
</td><td style="padding: 0px 10px; white-space: nowrap; width: 1px">
<a href="expensesreportexcel.php" 
class="btn btn-sm btn-default" style="font-weight: bold">
<?php 
$title=$_POST['title'];
$description=$_POST['description'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$footer=$_POST['footer'];
echo"EXPORT TO EXCEL <a href='expensesreportexcel.php?date1=$date1&&date2=$date2&&title=$title&&description=$description&&footer=$footer'><img src='images/xls.png'>";?>
</a>&nbsp;<div id="email-modal" class="modal"><div class="modal-dialog"><div class="modal-content">
<div class="modal-header" style="background-color: #f5f5f5; border-top-left-radius: 6px; border-top-right-radius: 6px;">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><div class="header" style="font-size: 18px">Email</div>
</div><div class="modal-body" style="background-color: #f9f9f9; padding: 10px; box-shadow: inset 0px 1px 0px #fff"><table style="width: 100%; border-spacing: 10px; 
border-collapse: separate"><tr><td style="vertical-align: middle; width: 1px; white-space: nowrap"><label>To</label></td>
<td><input type="text" id="email-modal-to" class="form-control input-sm" style="width: 100%" name="To" /></td>
</tr><tr><td style="vertical-align: middle; width: 1px; white-space: nowrap"><label>Subject</label></td><td><input type="text" id="email-modal-subject" class="form-control input-sm" style="width: 100%" name="Subject" value="kjkjhkhjk" placeholder="kjkjhkhjk" />
</td></tr><tr><td colspan="2"><textarea id="email-modal-body" class="form-control input-sm" style="width: 100%; height: 150px" name="Body" spellcheck="true"></textarea>
</td></tr></table><div id="emailError" style="color: red; font-weight: bold; display: none; padding: 10px; padding-top: 0px"></div></div>
<div class="modal-footer" style="margin-top: 0px; box-shadow: 1px 1px 0 #fff inset; background-color: #f5f5f5; border-top: 
1px solid #dddddd; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;"><button class="btn btn-link btn-sm" style="font-weight: bold" 
data-dismiss="modal">Cancel</button><button id="email-btn" class="btn btn-default btn-sm" style="font-weight: bold" onclick="javascript:email()">Send</button>
<img src="resources/ajax-loader.gif" style="display: none; margin-left: 10px; margin-right: 10px" id="email-ajax-indicator" /></div></div></div></div>


</td><td></td></tr></table></div>
<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: center; min-width: 800px">
  <?php
$title=$_POST['title'];
$description=$_POST['description'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$footer=$_POST['footer'];

?>
<table style="padding: 30px"><thead><tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"$title";?></th></tr>
<tr><th style="font-weight: bold; font-size: 24px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"$description";?></th></tr>
<tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"From :$date1 until:$date2";?></th></tr>
<tr><th style="border-bottom-width: 1px"></th>
<th style="border-bottom-width: 1px; font-weight: bold; width: 80px; padding: 3px; text-align: right"></th></tr>
<tr></tr></thead>
<tbody><tr>

<td style="padding: 10px; text-align: left; white-space: nowrap; font-weight: bold">
    <table class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								include('dbcon.php');
								  
$sel=mysqli_query($con,"select sum(amount) as amount,account,duedate from expenses where duedate>='$date1' and duedate<='$date2' and coopid='$_SESSION[coopid]' group by account order by account asc ") or die(mysqli_error($con));
$totexpenses=0;
   echo"<thead> <tr>
   <th style='padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold'>Budget Line</td> 
   <th style='padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold'> Budgeted Amount</td
   ><th style='padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold'>
    Used Amount</td><th style='padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold'> Budget Remaining Amount</td>
   </TR></thead><tbody>";

while($med=mysqli_fetch_array($sel))
{
$source=$med['account'];
$amount=$med['amount'];
$totexpenses+=$amount; 

$sel1=mysqli_query($con,"select amount as ambudget from account where codename='$source' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$amb=$med1['ambudget'];
$amexp=$amb;
$amrem=$amexp-$amount;
//$date=$med['date'];
$amountf=number_format($amount);
$amexpf=number_format($amexp);
$amremf=number_format($amrem);
print("<tr bgcolor=white>
<td style='padding: 1px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold'> $source</td>
<td style='padding: 1px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold'> $amexpf</td>
<td style='padding: 1px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: left; font-weight: bold'> $amountf</td>
<td style='padding: 1px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: left; font-weight: bold'> $amremf</td>

</tr>");
}
?>									
							
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>

</td></tr>

<tr><td style="padding: 3px; padding-right: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Total Expenses</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold">
<?php $totexpensesf=number_format($totexpenses); echo"$totexpensesf";?></td>
</tr><tr><td colspan="2">&nbsp;</td></tr></tbody><tfoot><tr><td style="text-align: center; padding-top: 20px" colspan="2"><?php echo"$footer";?></td>
</tr></tfoot><td> 
</table>
</div><div style="clear: both">
</div></div></div>

