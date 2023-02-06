<?php session_start();
ob_start();
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


$date1=$_GET['date1'];
$date2=$_GET['date2'];
?>
</a>&nbsp;</tr></table></div>
<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: center; min-width: 800px">

<table style="padding: 30px"><thead><tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo" Igitabo cy'abatishyuwe";?></th></tr>
<tr><th style="font-weight: bold; font-size: 24px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"Urutondo rw'abo Koperative ibereyemwo umwenda";?></th></tr>
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
										No Y'IKEMEZO</th>
										<th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">
										UHAWE UMWENDA</th>                                 
										<th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">
										IMPAMVU</th> 
										<th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">
										UMWENDA</th>                                 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">IGIHE AZISHYURIRWA
										</th>                                 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">AYISHYUWE
										</th>                                 
                                        <th style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">ASIGAYE
										</th>                                 
										                              
										                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								 header("Content-type: application/vnd-ms-excel");
                                 header("Content-Disposition: attachment; filename=ABATISHYUWE.xls");

								  
								  $user_query=mysqli_query($con,"select * from amadeni WHERE date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]' and type='cooperative'")or die(mysqli_error($con));
								  $totvalue=$totused=$totremain=$i=0;
									while($row=mysqli_fetch_array($user_query)){
									$i++;
									$id=$row['id']; ?>
									 <tr>
<td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $i; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php $date=$row['date'];
 echo "$date"; ?></td> 
<?php $piece=$row['pieceno']; $reason=$row['reason'];  $owner=$row['owner']; $value=$row['value']; $totvalue+=$value; $valuef=number_format($value); $datetopay=$row['datetopay'];
$ayishyuwe=$row['ayishyuwe']; $ayishyuwef=number_format($ayishyuwe); $totremain+=$ayishyuwe;
$asigaye=$row['asigaye'];  $asigayef=number_format($asigaye);
$totused+=$asigaye; 
 ?>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $piece; ?></td>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $reason; ?></td>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $owner; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $valuef; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $datetopay; ?></td>
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $ayishyuwef; ?></td> 
<td style="padding: 3px; padding-left: 25px; padding-center: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold"><?php echo $asigayef; ?></td> 
                                
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
</table>
</td></tr>

<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Umwenda Wose</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold"><?php $totvaluef=number_format($totvalue); echo"$totvaluef";?></td>
</tr>
<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Ayishyuwe yose</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold"><?php $totremainf=number_format($totremain); echo"$totremainf";?>
</td>
</tr>
<tr><td style="padding: 3px; padding-left: 25px; padding-left: 5px; border-top-width: 1px; border-bottom-width: 1px; font-weight: bold">Asigaye yose</td>
<td style="padding: 3px; border-top-width: 1px; border-bottom-width: 1px; white-space: nowrap; text-align: right; font-weight: bold">
<?php $totusedf=number_format($totused); echo"$totusedf";?></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr></tbody><tfoot><tr><td style="text-align: center; padding-top: 20px" colspan="2"></td></tr></tfoot></table>
</div><div style="clear: both">
</div></div></div>

