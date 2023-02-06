<?php include("session.php");?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" ><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">

<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 2px 2px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 1px 1px 0 #FFFFFF;">STOCK
                   <a href="addstock.php"> <button type="button" class="btn btn-sm btn-primary btn-create">Add to Stock</button></a>
				    <a href="removestock.php"> <button type="button" class="btn btn-sm btn-primary btn-create">Remove to Stock</button></a>
					<a href="pricestock.php"> <button type="button" class="btn btn-sm btn-primary btn-create">Add Prices</button></a></DIV>
<div class="panel-body">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
 
                             
                                  <?php 
								include('dbcon.php');
								  
$sel=mysqli_query($con,"select sum(quantityadded) as quantityadded,sum(quantityremoved) as quantityremoved,date,item,currentquantity,balance,id,impamvu as reason from stock 
 where coopid='$_SESSION[coopid]' group by item,date,impamvu
ORDER BY id desc") or die(mysqli_error($con));
   echo"<thead> <tr><td align=center colspan=2><em class='fa fa-cog'></em></td>
    <th align=center>Item</td><th align=center>Reason</td><th align=center>Qauantity added</td><th align=center>Quantity removed</td><th align=center>Date</td>
   </TR></thead><tbody>";

while($med=mysqli_fetch_array($sel))
{
$item=$med['item'];
$quantitya=$med['quantityadded'];
$reason=$med['reason'];
$quantityr=$med['quantityremoved'];
$cqty=$med['currentquantity'];
$balance=$med['balance'];
$date=$med['date'];
$id=$med['id'];
//$amt=$amountcredit-$amountdebit;
print("<tr bgcolor=white>
<td style=\"width: 1px\"><a href=\"editstock.php?id=$id\" class=\"btn btn-success\"><em class='fa fa-pencil'>Edit</em></a></td>
<td style=\"width: 1px\"><a href=\"deletestock.php?id=$id&&item=$item\" class=\"btn btn-danger\"><em class=fa fa-trash>Remove</em></a></td>
<td align=center> $item</td><td align=center> $reason</td><td align=center> $quantitya</td><td align=center> $quantityr</td><td align=center>$date</td>
</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
