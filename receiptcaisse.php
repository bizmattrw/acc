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
<span class="header">Balance Sheet</span></td><td style="padding: 0px 10px; white-space: nowrap; width: 1px"
><a href="balance-sheet-form?Referrer=ea9657c3-278d-4d05-aa4c-873e8fe353a1&Key=a2d08a92-47c6-43dd-85f4-7ad2f665d5ef&FileID=6d85f30c-9b6b-4d68-9bbd-068f00e13e29" 
class="btn btn-sm btn-default" style="font-weight: bold">Edit</a>&nbsp;<button class="btn btn-default btn-sm" style="font-weight: bold; margin-right: 5px" 
onclick="javascript:window.print()">Print</button><button id="btn-print" class="btn btn-default btn-sm" style="font-weight: bold; margin-right: 5px" onclick="javascript:printToPdf()">
PDF<img src="resources/ajax-loader.gif" id="btn-print-ajax" style="margin-left: 10px; display: none" /></button><button class="btn btn-default btn-sm" style="font-weight: bold; 
margin-right: 5px" data-toggle="modal" data-target="#email-modal">Email</button><div id="email-modal" class="modal"><div class="modal-dialog"><div class="modal-content">
<div class="modal-header" style="background-color: #f5f5f5; border-top-left-radius: 6px; border-top-right-radius: 6px;">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><div class="header" style="font-size: 18px">Email</div>
</div><div class="modal-body" style="background-color: #f9f9f9; padding: 10px; box-shadow: inset 0px 1px 0px #fff"><table style="width: 100%; border-spacing: 10px; border-collapse: separate"><tr><td style="vertical-align: middle; width: 1px; white-space: nowrap"><label>To</label></td><td><input type="text" id="email-modal-to" class="form-control input-sm" style="width: 100%" name="To" /></td></tr><tr><td style="vertical-align: middle; width: 1px; white-space: nowrap"><label>Subject</label></td><td><input type="text" id="email-modal-subject" class="form-control input-sm" style="width: 100%" name="Subject" value="kjkjhkhjk" placeholder="kjkjhkhjk" />
</td></tr><tr><td colspan="2"><textarea id="email-modal-body" class="form-control input-sm" style="width: 100%; height: 150px" name="Body" spellcheck="true"></textarea>
</td></tr></table><div id="emailError" style="color: red; font-weight: bold; display: none; padding: 10px; padding-top: 0px"></div></div>
<div class="modal-footer" style="margin-top: 0px; box-shadow: 1px 1px 0 #fff inset; background-color: #f5f5f5; border-top: 
1px solid #dddddd; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;"><button class="btn btn-link btn-sm" style="font-weight: bold" 
data-dismiss="modal">Cancel</button><button id="email-btn" class="btn btn-default btn-sm" style="font-weight: bold" onclick="javascript:email()">Send</button>
<img src="resources/ajax-loader.gif" style="display: none; margin-left: 10px; margin-right: 10px" id="email-ajax-indicator" /></div></div></div></div>


</td><td></td></tr></table></div>
<div class="panel-body well"><div id="printable-content" class="panel" style="font-size: 12px; float: left; min-width: 800px">
  <?php
$reason=$_GET['reason'];
$amount=$_GET['amount'];
$names=$_GET['names'];
$date=$_GET['date'];

?>
<table style="padding: 30px"><thead><tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2">
<img src="images/image.png" height="50"></th></tr>
<tr><th style="font-weight: bold; font-size: 16px; text-align: center; padding-bottom: 10px" colspan="2"><?php echo"On $date";?></th></tr>
<tr><th style="border-bottom-width: 1px"></th>
<th style="border-bottom-width: 1px; font-weight: bold; width: 80px; padding: 3px; text-align: right"></th></tr>
<tr></tr></thead>
<tbody><tr>
<font size="+10">
<td style="padding: 25px; text-align: left; white-space: nowrap; font-weight: bold">
    <table>
 
                             
                                  <?php 
								include('dbcon.php');
echo("<tr>
<td style='padding: 5px';> <font size='+1'>Je, soussign&eacute;...<strong>$names</strong>...,</td></tr>
<tr><td  style='padding: 5px';> <font size='+1'> avoir re&ccedilue; la somme de...<strong>$amount</strong>...
de la part du COOPERATIVE <strong>XXX</STRONG></td></tr>
<tr><td  style='padding: 5px';>  <font size='+1'>pour...<strong>$reason</strong>...
</td></tr>
<tr><td  style='padding: 5px';> <font size='+1'> ce montant est re&ccedilue; par cash (par la main) 

</td>

</tr>");
mysql_query("insert into receipt values('','$names','$reason','$amount','caisse','$date')") OR die(mysql_error());

?>									
<tr><th style="border-bottom-width: 1px"></th>
<th style="border-bottom-width: 1px; font-weight: bold; width: 100px; padding: 3px; text-align: right"></th></tr>
							
									     <!-- Modal edit user -->
								
                                    </tr>
									
                           
                                </tbody>
                            </table>

</td></tr>
</tfoot></table>
</div><div style="clear: both">
</div></div></div>

