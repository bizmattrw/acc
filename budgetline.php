<!DOCTYPE html><html
 moznomarginboxes mozdisallowselectionprint><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">Budgetline
                   <a href="liability.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Entry</button></a></DIV>
<div class="panel-body">

<?php include('header.php'); ?>

<script type="text/javascript" src="script.js"></script> 
<div class="panel panel-default"><div class="panel-heading"><span class="header">

<FORM action="savebudget.php" method="post">
<div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 40px">
							<input type="button" value="+" class="" onClick="addRow('dataTable');" />
							<input type="button" value="Remove"  onClick="deleteRow('dataTable');" />
							<table id="dataTable">
								<tbody id="budget-based" style="display: YES;">
									<tr>
										<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
										<td style="padding: 0px; padding-left: 5px">
										
<div class="form-group"><label>Budgetline</label><input type="text" class="form-control input-sm" style="width: 250px"  name="account[]" placeholder="Budgetline" /></td>
<td style="padding: 0px; padding-left: 5px">
<div class="form-group"><label>Code</label><input type="text" class="form-control input-sm" style="width: 150px"  name="code[]" placeholder="Budgetline Code"/>
</div></td>
<td style="padding: 0px; padding-left: 5px"><div class="form-group"><label>Amount</label>
<input type="text" class="form-control input-sm" style="width: 100px; text-align: center" name="amount[]" placeholder="Amount"  />
</div></td></tr></tbody></table>

<div class="form-group"><label>Year</label><div class="controls">
<select style="min-width: 50px"  data-placeholder="Uncategorized" name="year"><option></option>
<option >2018</option>
<option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option>
<option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2030</option>
</select></div></div><div></div></div>

<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">
<img src="resources/ajax-loader.gif" id="ajaxIndicator" style="display: none; margin-right: 10px" /><div class="btn-group">
<input type="submit" id="btnCreate" class="btn btn-primary" style="font-weight: bold" value="Create" name="submit"/>

</FORM>
</a></button><ul class="dropdown-menu"><li></ul></div></div></div></div></div></div></TABLE></TABLE></TABLE></TABLE>

<?php include_once "footer.php" ?>

