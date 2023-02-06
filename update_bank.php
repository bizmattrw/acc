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
                    <h3 class="panel-title"><font color="#FFFFFF"><<</font><a href="updatebank.php"><img src="images/home.png" title="Home"/></A>UPDATING BANK TRANSACTIONS</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
				  			<div class="form-group">
				</div>

                  </div>
                </div>
              </div>
              <div class="panel-body">

 
 <?PHP

include("dbcon.php");
$account=$_GET['account'];
$sel=mysqli_query($con,"select * from bank where coopid='$_SESSION[coopid]'  and account='$account' and status=0 order by date desc");
if(mysqli_num_rows($sel)<=0){echo"<center>Sorry no record found</center>";}
else{

    echo"<table class='table table-striped table-bordered table-list>' id='example'> <thead>
   <tr><td align=center><em class='fa fa-cog'></em></td>
   <td align=center>Bank name</td> <td align=center>Particular</td> <td align=center>Amount</td><td align=center>Reason</td><td align=center>Action</td>
<td align=center>Date</td>
   </TR></thead><tbody>";
   $x=$amt=0;
while($med=mysqli_fetch_array($sel))
{
$bankname=$med['bankname'];
$quantity=$med['amount'];
$names=$med['particulars'];
$bordereau=$med['bordereau'];
$action=$med['action'];
$balance=$med['balance'];
$bline=$med['bline'];
$date=$med['date'];
$id=$med['id'];
print("<tr bgcolor=white>
	</a><td align=center style=\"width: 1px\"><a href='delete_bank.php?id=$id&&account=$account&&bline=$bline&&amount=$quantity&&date=$date&&reason=$bordereau' title='delete this record' border=0 class='btn btn-danger'><em class='fa fa-trash'>Delete</em></a>
<td align=center> $bankname</td><td align=center> $names</td><td align=center> $quantity</td><td align=center> $bordereau </td><td align=center> $action </td>
<td align=center>$date</td>
	 </TD></tr>");
}
print("</tbody></table>");
}

  ?>
</table>
    <br /><br /><hr />
       <br />
</div>
</body>
</html>
