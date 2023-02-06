<?php include("session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COOPA SYSTEM</title>
<style type="text/css">
body
{
   
   margin: auto;
   margin-top: 0px;
   margin-bottom: 20px;    
   background-image: url("images/fond.png");
   background-color:#E4E2E0 ;

}

#window{
background-color:#FFFFFF;
	height:auto;
	width:60%;
font-family:Geneva, Arial, Helvetica, sans-serif;
   color:#4D4D4D;
	margin-top:0px;
	margin-left:21%;
	size:100px;
	-moz-border-radius: 0.5em 0.5em 0.5em 0.5em;
      border-radius: 0.5em 0.5em 0.5em 0.5em;
	  box-shadow:
  rgba(0,0,0,0.3)
  0px 1px 1px 1px;
  
	}
	
	#catalog1{
	background-color:#000000;
	height:35px;
	margin-left:3px;
	width:99%;
	color:#FFFFFF;
	margin-top:10px;
	-moz-border-radius: 1em 1em 0em 0em;
      border-radius: 1em 1em 0em 0em;
	}

    </style>
    

</head>

<body>
<br />
<div id="window">

<table width="100%" align="center"><tr><td><font color="#FFFFFF">...</font><a href="updatebank.php"><img src="images/home.png" title="Home"/></a>
</td>
        <td><a href="logout.php" title="logg out of the system"><img src="images/logout.png"/></a></td></tr></table>
<hr/><br />
 <form action="update_bank2.php" name="" method="post">
 <?php
include("dbcon.php");
     $id=$_GET['id']; 
	 
    $searchbyrequestor=mysqli_query($con,"SELECT * FROM bank where id='$id'");
      $proof=mysqli_num_rows($searchbyrequestor);
 if($proof!=null)
 {
     while($med=mysqli_fetch_array($searchbyrequestor))
   {
    $bankname=$med['bankname'];
$quantity=$med['amount'];
$account=$med['account'];
$names=$med['particulars'];
$bordereau=$med['bordereau'];
$action=$med['action'];
$balance=$med['balance'];
$date=$med['date'];
   }
     
	  echo"<table align=center><tr><td align=center>Bank Name:</td><td> <input type=text value='$bankname' name='bank'/></td></tr>
	  
	  	 <tr><td> Account: </td><td>  <input type=Text value='$account' name='account'/></tr>
	  <tr><td> Particular: </td><td>  <input type=Text value='$names' name='names'/></tr>
	  	 <tr><td> Bordereau:  </td><td> <input type=Text value='$bordereau' name='bordereau'/></tr>
	 <tr><td> Amount </td><td> <input type=Text name='amount' value='$quantity' /></td>
	  </tr>
	 <tr><td> action:  </td><td> <input type=Text value='$action' name='action'/></tr>
	 <tr><td> Date:  </td><td> <input type=Text value='$date' name='date'/></tr>
	  	  <input type=hidden value='$id' name='id'/></tr>

	  ";
   }
  
 ?>  
<tr><td align="center"><input type="submit" value="Update" style="font-size:18px"/></td><td align="center"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
</table>
</form>
    <br /><br /><hr>
       <br />
</div>
</body>
</html>
