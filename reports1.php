<?php include'session.php';?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 30px">
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; font-size: 14px; 
font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">Reports</div><style>a.list-group-item { color: #428BCA }a.list-group-item:hover { color: #2A6496 }</style>
<div style="margin-top: 20px">
<table style="width: 100%; border-spacing: 0px; border-collapse: collapse">
<tr><td style="width: 50%; vertical-align: top; padding: 0px; padding-right: 10px">
<div class="panel panel-default">
<div class="panel-heading">
<span class="header">Financial Statements</span></div>
<div class="list-group">
<a href="reportformincome.php" class="list-group-item" style="font-weight: bold; font-size: 12px">
Incomes Statement</a>
<a href="reportformexpenses.php" class="list-group-item" style="font-weight: bold; font-size: 12px">
Expenses Summary</a>
<a href="reportformbudget.php" class="list-group-item" style="font-weight:
 bold; font-size: 12px">Budget Statement (Actual vs Budget)</a>
 <a href="revisionform.php" class="list-group-item" style="font-weight:
 bold; font-size: 12px">Budget Revision</a>
  <a href="monthlyform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Monthly Operational Report</a>

 <a href="balancesheetform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Balance Sheet</a>


 <a href="bankreportsform.php" class="list-group-item" style="font-weight: bold; font-size: 12px" target="_blank">Bank Trial Balance</a>
 <a href="caisseform.php" class="list-group-item" style="font-weight: bold; font-size: 12px" target="_blank">Caisse Trial Balance</a>
 <!-- <a href="" class="list-group-item" style="font-weight: bold; font-size: 12px">Caisse Summary</a> -->
 </div>
 </div></td><td style="width: 50%; vertical-align: top; padding: 0px; padding-left: 10px">
 <div class="panel panel-default"><div class="panel-heading"><span class="header">Equity and Liabilities</span></div><div class="list-group">
 <a href="assetsreportform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Assets</a>
<a href="stockform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Stock</a> 
<a href="creditform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Credits</a>
<!-- <a href="liabilitiesform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Liabilities</a> -->
<a href="incomesourceform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Income Sources</a>
<a href="abatishyuweform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Abatishyuwe</a>
<a href="itubyamutungoform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Itubyamutungo</a>
<a href="iyongeramutungoform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Iyongeramutungo</a>
<a href="ibibitsweform.php" class="list-group-item" style="font-weight: bold; font-size: 12px">Igitabo cy'ibibitswe</a>


 </div></div></td>
 </tr></table></div>
 
</div></div></div></div></div></div></div></div></table>

<?php include("footer.php");?>