<?php include("session.php");?>
<!DOCTYPE html><html
 moznomarginboxes mozdisallowselectionprint><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">SETTING STOCK ITEMS PRICES
                  </DIV>
				  <br><br>
<div class="panel-body">
<?php
if(isset($_SESSION['success']))
{
	echo"$_SESSION[success]";
	unset($_SESSION["success"]);
}
if(isset($_SESSION['deny']))
{
	echo"$_SESSION[deny]";
	unset($_SESSION["deny"]);
}
?>
<?php include('header.php'); ?>
<script type="text/javascript" src="script.js"></script>

<div class="panel panel-default"><div class="panel-heading"><span class="header">

<FORM action="savepricestock.php" method="post">
<div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 40px"><table><tr><td style="padding: 0px">
<div class="form-group">
<input type="button" value="+" class="" onClick="addRow('dataTable');" />
							<input type="button" value="Remove"  onClick="deleteRow('dataTable');" />
							<table id="dataTable">
							<tbody id="budget-based" style="display: YES;">
							<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
<td style="padding: 0px"><label>Item</label>
                        <input  name="item[]" type="text" 
						class="form-control input-sm" id="item" style="width: 180px; text-align: center" placeholder="Item name" required />
						
                                  <?php 
								  /*
								  $year=date("Y");
								include('dbcon.php');
								  
								  $user_query=mysqli_query($con,"select * from stock where coopid='$_SESSION[coopid]' group by item order by item asc")or die(mysqli_error($con));
									while($row=mysqli_fetch_array($user_query)){
									$account=$row['item']; 
									echo"<option>$account</option>";
									}
									*/
									?>
						</select>
						</div>
						</td>
<div class="form-group">
  <td style="padding: 0px">                      
<label>Purchasing Price </label><input type="text" class="form-control input-sm" style="width: 100px"  name="pprice[]" required />
</div></td><td style="padding: 0px; padding-left: 5px"></td><div class="form-group"><td><label>Selling Price</label>
<input type="text" class="form-control input-sm" style="width: 100px; text-align: center" name="sprice[]" placeholder="" required  />
</div></td></tr></table>
<!-- <div class="form-group"><label>Year</label><div class="controls">
<select  name="year" required><option></option>
<option >2018</option>
<option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option>
<option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2030</option>
</select>
<select style="min-width: 5px"  data-placeholder="Uncategorized" name="season" required><option></option>
<option >1</option>
<option>2</option></select>

</div></div>
-->
<div></div></div>

<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">
<img src="resources/ajax-loader.gif" id="ajaxIndicator" style="display: none; margin-right: 10px" /><div class="btn-group">
<input type="submit" id="btnCreate" class="btn btn-primary" style="font-weight: bold" value="Create" name="submit"/>

</FORM><a href="updateprice.php"><input type="button" id="btnCreate" class="btn" style="font-weight: bold" aria-hidden="true" value="Edit" />
</a></button><ul class="dropdown-menu"><li></ul></div></div></div></div></div></div></TABLE></TABLE></TABLE></TABLE>

<?php include_once "footer.php" ?>

