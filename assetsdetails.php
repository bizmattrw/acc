<?php include'session.php';?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
	  
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 30px">
<style>div.panel { min-width: 0px; margin-bottom: 10px }div.panel div.header { background-color: ivory; border-bottom: 1px solid #EEEEEE; border-top-left-radius: 4px; 
border-top-right-radius: 4px; text-shadow: 1px 1px 0 #FFFFFF; padding: 20px; box-shadow: inset 0px 1px 0px #fff; }div.panel div.title { font-weight: bold; font-size: 18px 
}div.panel div.title span.emphasis { border-bottom: 2px solid #333 }div.panel div.description { color: #333; font-size: 12px; padding-top: 10px }div.panel div.balance 
{ float: right; font-size: 18px; font-weight: bold }div.panel div.body { padding: 20px }div.panel div.footer { background-color: #f6f6f6; border-top: 1px solid #EEEEEE; 
border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; text-shadow: 1px 1px 0 #FFFFFF; padding: 10px 20px; 
text-align: center }div.panel div.placeholder { padding: 20px; color: #999; text-align: center; font-size: 14px; 
line-height: 28px }div.panel table { width: 100%; font-size: 12px }div.panel table td { padding: 5px 0px }</style>
<div class="panel panel-default">
<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: center; min-width: 100px">
<p><p><p><p><p><p><p><p><p><p><p><p><div><div><table style="width: 100%"><tr><td style="width: 50%; padding-right: 10px; vertical-align: top" colspan="2">
<?php $date1=$_POST['date1']; $date2=$_POST['date2'];
?>
<div style="padding-bottom: 10px"><div style="text-align: center; color: #ccc; font-size: 14px; font-weight: bold; text-shadow: 1px 1px 0px #fff">
ASSETS REPORT
<?php
 echo" From $date1 UNTIL $date2"; ?></div>
</div></td></tr><tr><td style="width: 50%; padding-right: 10px; vertical-align: top">
<div class="panel"><div class="header">
  <div class="balance">

  
  
  </div><div class="title">ASSETS</div></div><div class="body">
  
  <table><tr>
  <td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">
  
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
									<th>DATE</th> 
                                        <th>ASSET</th>
                                        <th>COST</th>                                 
                                        <th>DEPRECIATION</th>
										<th>TIME-STANDING</th>
										<th>Annual Depreciation</th>
										<th>Total Depreciation</th>
										<th>CURRENT Value</th>                                  
                                               
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								  								
								  
								  $user_query=mysqli_query($con,"select value from assets where coopid='$_SESSION[coopid]'")or die(mysql_error());
								  $totvalue=0;
									
									
								  $user_query=mysqli_query($con,"select id,value,asset,depreciation,date,year(date) as year from assets where coopid='$_SESSION[coopid]'")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
									    <td align="center"><?php echo $row['date']; ?></td>
                                    <td align="center"><?php echo $row['asset']; ?></td>
									<?php $y=date("Y"); $year=$row['year']; $dep=$row['depreciation']; $time=$y-$year;$loss=$time*$dep;
									 $value=$row['value']; $andep=$value*$dep/100; $totdep=$andep*$time; $agaciro=$value*$loss/100; ?> 
                                    <td align="center"><?php $valuef=number_format($value);echo $valuef;?></td> 
                                    <td align="center"><?php echo $row['depreciation']; ?></td>
									<td align="center"><?php echo $time; ?></td>
									<td align="center"><?php echo number_format($andep); ?></td>
									<td align="center"><?php echo number_format($totdep); ?></td> 
									<td align="center"><?php $agaciro=$value-$agaciro; $totvalue+=$agaciro; $agacirof=number_format($agaciro);echo $agacirof; ?></td> 
                                  
                                 
                                 
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
</td>
 </td></tr><tr><td colspan="2">
 <div class="panel"><div class="body" style="background-color: #ffffee">
 
 <div class="balance"><?php  $totvaluef=number_format($totvalue); echo"$totvaluef";?></div>
 <div class="title">TOTAL</div></div></div></table></div></div>
                            </table></table>


