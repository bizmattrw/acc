<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint>
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
	


<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: left; min-width: 800px">
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
<tr><th style="border-bottom-width: 1px"></th><th style="border-bottom-width: 1px; font-weight: bold; width: 80px; padding: 3px; text-align: right"></th></tr>
<tr></tr></thead>
<tbody><tr>

<td style="padding: 3px; text-align: right; white-space: nowrap; font-weight: bold">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example" border="2">
 
                             
                                  <?php 
								include('dbcon.php');
								  
$sel=mysql_query("select sum(amount) as amount,source,date from income group by source order by source asc ");
$totincome=0;
   echo"<thead> <tr>
   <th align=center>Sources</td> <th align=center>Amount</td>
   </TR></thead><tbody>";

while($med=mysql_fetch_array($sel))
{
$source=$med['source'];
$amount=$med['amount'];
$totincome+=$amount;
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

</td></tr>

<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Total Income</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold"><?php echo"$totincome";?></td>
</tr><tr><td colspan="2">&nbsp;</td></tr></tbody><tfoot><tr><td style="text-align: center; padding-top: 20px" colspan="2"><?php echo"$footer";?></td></tr></tfoot></table>
</div><div style="clear: both">
</div></div></div>

