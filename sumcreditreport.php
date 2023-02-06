<?php include("session.php");?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint>
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" ><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include('menu.php'); ?>

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 1px 1px 0 #FFFFFF;">BANKS</DIV>
<div class="panel-body">
<FORM action="savebudget.php" method="post">
<?php include('header.php'); ?>
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
                                include('dbcon.php');
                                include './helpers.php';
								  
$sel=mysqli_query($con,"SELECT particulars, COUNT(id) AS times_count, SUM(amount) AS amount FROM bank WHERE coopid='$_SESSION[coopid]' AND `action` = 'credit' GROUP BY particulars, bankname, account");
   echo"<thead> <tr><td>N&deg;</td>
   <th align=center>Particular</td> <th align=center>Count</td><th align=center>Amount credited</td>
   </TR></thead><tbody>";

   $i = 0;
while($med=mysqli_fetch_array($sel))
{
    $i++;
$particulars=$med['particulars'];
$count = $med["times_count"];
$amount = $med["amount"];
print("<tr bgcolor=white>
<td>$i</td>
<td align=center><a href='./particular-credit-report.php?q=$particulars'>$particulars</a></td><td align=center> $count</td><td align=center> $amount</td>
</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
