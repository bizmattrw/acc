<?php
include('dbcon.php');
if(!empty($_POST["bankid"])) 
{
 $sql=mysqli_query($con,"select * from combination where Level_id='$_POST[bankid]'")or die(mysqli_error($con));?>
 <option selected="selected">Select Account </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['Combination']); ?>"><?php echo htmlentities($row['Combination']); ?></option>
  <?php
  }
}

if(!empty($_POST["catidsubcont"])) 
{
 $sql=mysqli_query($con,"select * from functionssub where catid='$_POST[catidsubcont]'")or die(mysqli_error($sql));?>
 <option selected="selected">Select Function </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['function']); ?>"><?php echo htmlentities($row['function']); ?></option>
  <?php
  }
}

?>

