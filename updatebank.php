<?php include("session.php");?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint>
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" ><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include('menu.php'); ?>

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 1px 1px 0 #FFFFFF;">BANKS
                   <a href="bank.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Transaction</button></a>
				   <a href="subjects.php"> <button type="button" class="btn btn-sm btn-primary btn-create">Create New Bank</button></a>
                   <a href="subjects.php"> <button type="button" class="btn btn-sm btn-primary btn-create">Summerized Debit Report</button></a>
                   <a href="sumcreditreport.php"> <button type="button" class="btn btn-sm btn-primary btn-create">Summerized Credit Report</button></a></DIV>
<div class="panel-body">
<FORM action="savebudget.php" method="post">
<?php include('header.php'); ?>
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								include('dbcon.php');
								  
$sel=mysqli_query($con,"select sum(amount) as amount,bankname,id,account from bank where coopid='$_SESSION[coopid]' group by bankname,account");
   echo"<thead> <tr><td colspan=2 align=center><em class='fa fa-cog'></em></td>
   <th align=center>Account</td> <th align=center>Bank name</td><th align=center>Amount debited</td><th align=center>Amount credited</td><th align=center>Balance</td>
   </TR></thead><tbody>";

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
<td style=\"width: 1px\"><a href=\"update_bank.php?account=$account\" class=\"btn-xs btn-default btn\">Edit</a></td>
<td style=\"width: 1px\"><a href=\"accountsituations.php?account=$account\" class=\"btn-xs btn-default btn\">View</a></td>
<td align=center> $account</td><td align=center> $bankname</td><td align=center> $amountdebit</td><td align=center> $amountcredit</td>
<td align=center>$amt</td>
</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
