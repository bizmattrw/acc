<?php session_start();
?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint>
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
	

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; 
border-right: 1px solid #ccc; padding: 30px"><style>#printable-content table { width: 100%; border-collapse: separate }#printable-content td, #printable-content th { padding: 0px; 
vertical-align: top; font-weight: normal }#printable-content * { border-width: 0px; border-color: #000; border-style: solid }</style><div class="panel panel-default">
<div class="panel-heading"><table style="border-collapse: separate; width: 100%"><tr><td style="padding-right: 10px; white-space: nowrap; width: 1px; height: 32px">
<?php 


$date1=$_POST['date1'];
$date2=$_POST['date2'];

echo"EXPORT TO EXCEL <a href='reportabatishyuweexcel.php?date1=$date1&&date2=$date2'><img src='images/xls.png'>";?>
</a>&nbsp;</tr></table></div>
<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: center; min-width: 800px">

<table style="padding: 30px"><thead><tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo" Igitabo cy'ibibitswe";?></th></tr>
<tr><th style="font-weight: bold; font-size: 24px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"Urutondo rw'ibibitswe na Koperative";?></th></tr>
<tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"KUVA $date1 KUGEZA $date2";?></th></tr>
<tr><th style="border-bottom-width: 1px"></th>
<th style="border-bottom-width: 1px; font-weight: bold; width: 80px; padding: 3px; text-align: right"></th></tr>
<tr></tr></thead>
<tbody><tr>

<td style="padding: 10px; text-align: left; white-space: nowrap; font-weight: bold">
                            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
									<th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">No</th>
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">ITARIKI</th>
										<th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">
										IKIBITSWE</th> 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">
										IKIRANGUZO CYA 1
										</th>                                 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">
										IBYINJIYE
										</th>                                 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">IBISOHOTSE
										</th>                                 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">IBIHARI
										</th>                                 
										                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								  
$sel=mysqli_query($con,"select sum(quantityadded) as qty1,sum(quantityremoved) as qty2,impamvu as reason,id,item,date,sum(currentquantity) as qty3 from stock 
 where coopid='$_SESSION[coopid]' and date>='$date1' and date<='$date2' group by item,date,reason
ORDER BY date asc") or die(mysqli_error($con));
								  $totqty1=$totqty2=$totbalance=$i=0;
									while($row=mysqli_fetch_array($sel)){
									$i++;
									$id=$row['id']; ?>
									 <tr>
<td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $i; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php $date=$row['date'];
 echo "$date"; ?></td> 
<?php $item=$row['item']; $reason=$row['reason'];  $qty1=$row['qty1']; $qty2=$row['qty2']; $totqty1+=$qty1; $totqty2+=$qty2; 
$qty1f=number_format($qty1); $qty2f=number_format($qty2);  $qty3=$row['qty3'];
$balance=$qty3; $balancef=number_format($balance); $totbalance+=$balance;

$sel2=mysqli_query($con," select * from levels
 where coopid='$_SESSION[coopid]' and item='$item'") or die(mysqli_error($con));
								  
									$row2=mysqli_fetch_array($sel2);
									$pprice=$row2['pprice'];
									$ppricef=number_format($pprice);
									
 ?>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $item; ?></td>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $ppricef; ?></td>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $qty1f; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $qty2f; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $balancef; ?></td>
                                
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
</table>
</td></tr>

<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Ibyinjiye byose</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold"><?php $totqty1f=number_format($totqty1);
 echo"$totqty1f";?></td>
</tr>
<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Ibyasohotse byose</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold"><?php $totqty2f=number_format($totqty2); 
echo"$totqty2f";?>
</td>
</tr>
<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">IBISIGAYE BYOSE</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold">
<?php $totbalancef=number_format($totbalance); echo"$totbalancef";?></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr></tbody><tfoot><tr><td style="text-align: center; padding-top: 20px" colspan="2"></td></tr></tfoot></table>
</div><div style="clear: both">
</div></div></div>

