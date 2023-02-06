<?php include("session.php");?>
<!DOCTYPE html><html
 moznomarginboxes mozdisallowselectionprint><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="panel panel-default"><div class="panel-heading"><span class="header">
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">Updating Income</div>
  <?php include('header.php'); ?>
                                <?php 
								include('dbcon.php');
								  $id=$_GET['id'];
$sel=mysqli_query($con,"select * from income where id='$id'");

while($med=mysqli_fetch_array($sel))
{
$source=$med['source'];
$amount=$med['amount'];
$id=$med['id'];
$date=$med['date'];
}
?>
<FORM action="update_income1.php" method="post">
<div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 30px"><table><tr><td style="padding: 0px">
<div class="form-group">
                        <label>Source</label>
                        <select  name="reason"  class="form-control input-sm" id="reason" style="width: 180px" required value="<?php echo $source?>" />
						<option value="<?php echo $source?>" ><?php echo $source?></option>
						<?php
						$sel=mysqli_query($con,"select * from sources where coopid='$_SESSION[coopid]'")or die(mysqli_error($con));

                        while($med=mysqli_fetch_array($sel))
                          {
                           $source=$med['codename'];
						   echo"<option value'$source'>$source</option>";
                          }
                          ?>

						</select>
						<input  name="id" type="hidden"  required value="<?php echo $id?>" />

</div></td><td style="padding: 0px; padding-left: 5px"><div class="form-group">
                        <label>Amount</label>
                        <input name="value" type="text" class="form-control input-sm" id="value" style="width: 100px; text-align: center" placeholder="Amount" required
						 value="<?php echo $amount?>"   />
</div></td></tr>
<tr>
<td style="padding: 0px; padding-left: 5px"><div class="form-group"><label>Date</label><div class="controls">
                        <input name="date" type="text" class="form-control input-sm" id="date"  style="width: 100px; margin-bottom: 0px; text-align: center"  title=" date " 
						 onclick="ds_sh(this);" value="<?php echo $date?>"
 data-bind="datePicker: StartDate" />
                      </div></div></td>

</table><div></div></div>

<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">
<img src="resources/ajax-loader.gif" id="ajaxIndicator" style="display: none; margin-right: 10px" /><div class="btn-group">
<input type="submit" id="btnCreate" class="btn btn-primary" style="font-weight: bold" value="Update" name="submit"/>

</FORM>
            <a href="updateincome.php">
            <input type="button" id="btnCreate" class="btn" style="font-weight: bold" aria-hidden="true" value="Edit" />
            </a></div>
        </div></div></div></TABLE></TABLE></TABLE></TABLE>

<?php include_once "footer.php" ?>

