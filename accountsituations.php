<?php include("session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COOPA SYSTEM</title>
<?php include('grid.php'); ?>
<body>
  <div class="container">
<p> </p>
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
				  <div id="navbar" class="print-display-none">
				  <?PHP $account=$_GET['account'];?>
                    <h3 class="panel-title"><font color="#FFFFFF"><<</font><a href="updatebank.php"><img src="images/home.png" title="Home"/></A>THE DETAILS ON ACCOUNT: 
					<?php echo"$account";?></h3>
                  </div></div>
                  <div class="col col-xs-6 text-right">
				  			<div class="form-group">
				</div>

                  </div>
                </div>
              </div>
              <div class="panel-body">

 
 <?PHP

include("dbcon.php");

$sel=mysqli_query($con,"select * from bank where account='$account' order by id asc");
if(mysqli_num_rows($sel)<=0){echo"<center>Sorry no record found</center>";}
else{

    echo"<table class='table table-striped table-bordered table-list' id='example'>
   <thead><tr>
   <th align=center>Account</td> <th align=center>Bank name</td><th align=center>Amount debited</td><th align=center>Amount credited</td>
   <th align=center>Date</td>
   </TR></thead><tbody>";
   $x=0;
while($med=mysqli_fetch_array($sel))
{
$bankname=$med['bankname'];
$account=$med['account'];
$date=$med['date'];
$amount=$med['amount'];
$id=$med['id'];
$sel1=mysqli_query($con,"select amount as am from bank where action='debit' and account='$account' and id='$id' order by id asc");
$med1=mysqli_fetch_array($sel1);
$amountdebit=$med1['am'];
$sel2=mysqli_query($con,"select amount as amcredit from bank where action='credit' and account='$account' and id='$id'  order by id asc");
$med2=mysqli_fetch_array($sel2);
$amountcredit=$med2['amcredit'];
if($amountcredit==null){$amountcredit=0;}
if($amountdebit==null){$amountdebit=0;}
$amt=$amountcredit-$amountdebit;
$x+=$amt;
print("<tr><td align=center> $account</td><td align=center> $bankname</td><td align=center> $amountdebit</td><td align=center> $amountcredit</td>
<td align=center> $date</td>
</tr>");
}
}

  ?>
</tbody></table>
    <br /><br /><hr />
       <br />
</div>
</body>
</html>
