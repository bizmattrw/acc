<!DOCTYPE html><html
 moznomarginboxes mozdisallowselectionprint><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">Credits Editing
                   </div>
<div class="panel-body">

<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								include('dbcon.php');
								  
$sel=mysql_query("select * from login");
   echo"<thead> <tr><td align=center><em class='fa fa-cog'>Settings</em></td>
   <th align=center>Date</td><th align=center>Credit Owner</td> <th align=center>Amount</td>
   </TR></thead><tbody>";

while($med=mysql_fetch_array($sel))
{
$source=$med['ideni'];
$amount=$med['value'];
$id=$med['id'];
$lid=$med['lid'];
$date=$med['date'];
print("<tr bgcolor=white>
<td style=\"width: 1px\"><a href=\"deletecredits.php?id=$id&&amount=$amount&&lid=$lid\"  class=\"btn btn-danger\">Delete</a></td><td align=center> $date</td>
<td align=center> $source</td><td align=center> $amount</td>

</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
