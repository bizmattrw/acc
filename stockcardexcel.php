<?php session_start();
ob_start();
?>
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
				  <?PHP $date1=$_GET['date1'];$date2=$_GET['date2'];?>
                    <h3 class="panel-title"><font color="#FFFFFF"></font>STOCK SUMMARY: 
					<?php echo"FROM $date1 UNTIL $date2";
					?></a>
					</h3>
                  </div></div>
                  <div class="col col-xs-6 text-right">
				  			<div class="form-group">
				</div>

                  </div>
                </div>
              </div>
              <div class="panel-body">

   <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-list" id="example">
                                  <?php 
								  
								include('dbcon.php');
								header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=STOCKCARDREPORT.xls");

								  
$sel=mysql_query("select sum(quantityadded) as quantityadded,sum(quantityremoved) as quantityremoved,date,item,currentquantity,balance,action,id FROM stock where
 date>='$date1' and date<='$date2'  group by item
ORDER BY id asc") or die(mysql_error());
   echo"<thead> <tr>
    <th align=center>No</td><th align=center>Date</td><th align=center>Item</td><th align=center>Qauantity added</td><th align=center>U.P</td><th align=center>Total Value</td>
	<th align=center>Quantity removed</td><th align=center>U.P</td><th align=center>Total Value</td>
	<th align=center>current qty</td><th align=center>Remaining Value</td>
   </TR></thead><tbody>";
  $x=$i=0;
while($med=mysql_fetch_array($sel))
{
$item=$med['item'];
$quantitya=$med['quantityadded'];
$quantityr=$med['quantityremoved'];
//$cqty=$med['currentquantity'];
//$balance=$med['balance'];
//$value=$med['value'];
$action=$med['action'];
$date=$med['date'];
//$up=$med['up'];
$year=date("Y");
$sel2=mysql_query("select pprice from levels where year='$year' and pprice>0 and item='$item'");
$med2=mysql_fetch_array($sel2);
$pprice=$med2['pprice'];
$sel3=mysql_query("select sprice from levels where year='$year' and sprice>0 and item='$item'");
$med3=mysql_fetch_array($sel3);

$sprice=$med3['sprice'];

$valuea=$quantitya*$pprice;
$valuer=$quantityr*$sprice;
$id=$med['id'];
$x=$quantitya-$quantityr;
$balance=$x*$sprice;
$i++;

print("<tr bgcolor=white>

<td align=center> $i</td><td align=center>$date</td><td align=center> $item</td><td align=center> $quantitya</td><td align=center> $pprice</td><td align=center>$valuea</td>
<td align=center> $quantityr</td><td align=center> $sprice</td><td align=center>$valuer</td><td align=center> $x</td>
<td align=center>$balance</td>
</tr>");
}
?>									
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table></table>
    <br />
</div>
</body>
</html>
