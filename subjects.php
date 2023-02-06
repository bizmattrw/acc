<?php include("session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BANK MANAGEMENT</title>
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
	width:70%;
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
    
    <SCRIPT language=JavaScript>
	
function reload(form)
{
var val=form.status.options[form.status.options.selectedIndex].value;

self.location='requests.php?status=' + val;

}

</script>

<script type="text/javascript" src="scripts/jqueryy.js"></script>
<link rel="stylesheet" href="styles/demo_table.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#example').dataTable({
			"sPaginationType" : "full_numbers"
		});
});
</script>
</head>

<body>
<center><img src="images/logo4.png"></center>

<br />
<div id="window">

<table width="100%" align="center"><tr><td><font color="#FFFFFF">...</font>
<a href="updatebank.php"><img src="images/home.png" title="Home"/></a>
</td>
<td><a href="" title="Update charges"><img src="images/update.jpg"/></a></td>			
        <td></td>
		<TD><A href="bankaccount.php">Bank&nbsp;Account</A></TD>
		
		</tr></table>
<hr/><br />
 
 
 <FORM METHOD=POST  name=frmTest ACTION="savesubject.php" onsubmit='return formValidator()'; enctype="multipart/form-data">
  <table align="center" bgcolor="#E6E0D9">
		
	
			<tr>
  <td><span class="style3"><font size="+1">Bank </span></td>
  <td><input name="s" type="text" id="s" size=45></td>
	</tr>
	<tr><td><INPUT type="submit" name="" value="Save" onclick="return confirm('you are about to add a new bank.Do you want to continue?');"> 
		  </table>
		  
    <br /><br /><hr />
          <table width="100%"><tr><td align="left"> </td><td align="right"><font color="#999999" size=-1>&nbsp;</font><font color="#FFFFFF">......</font></td></tr></table>
       <br />
</div>
</body>
</html>
