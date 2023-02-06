<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" ><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include('menu.php'); ?>

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">Expenses
                   <a href="expenses.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Transaction</button></a></DIV>
<div class="panel-body">
<FORM action="savebudget.php" method="post">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								  
								include('dbcon.php');
								
								  
$sel=mysql_query("select reason,account,amount,duedate,id,year(duedate) as year from expenses")or die(mysql_error());
   echo"<thead> <tr><td align=center><em class='fa fa-cog'>Settings</em></td>
   <th align=center>Reason</td><th align=center>Budget Line</td> <th align=center>Amount</td><th align=center>Date</td>
   </TR></thead><tbody>";

while($med=mysql_fetch_array($sel))
{
$reason=$med['reason'];
$account=$med['account'];
$amount=$med['amount'];
$id=$med['id'];
$date=$med['duedate'];
$year=$med['year'];
print("<tr bgcolor=white>
<td style=\"width: 1px\"><a href='deleteexpenses.php?id=$id&&amount=$amount&&account=$account&&year=$year' class=\"btn btn-danger\"><em class='fa fa-trash'>Remove</em></a></td>
<td align=center> $reason</td><td align=center> $account</td><td align=center> $amount</td><td align=center> $date</td>

</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
