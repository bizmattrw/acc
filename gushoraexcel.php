<?php session_start();
ob_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>


<center><img src="images/coprorizbanner.png"></center><hr>
<?php $season=$_GET['season'];?>
<center><h3>URUTONDE RW'ABANYAMURYANGO BOSE BATAGEMUYE UMUSARURO MURI SEZO <?PHP echo"$season";echo"
 </h3></center>

  <?php

  include("dbcon.php");
	header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=ABATARASHOYE.xls");
$season=$_POST['season'];
  $leon=mysql_query("select * from membersv order by pin asc");
  
  $count=mysql_num_rows($leon);
if($count==0)
{
echo"There is no member registered yet ";
} 
else{
          
		echo("<table border=1 id=example  class='table table-striped'><thead><tr class=warning><th>No</th><th>Pin</th><th>Izina</th>
		<th>Irindi&nbsp;Izina</th><th>Itsinda</th><th>Sous-Zone</th>

<th>Ubuso(Ari)</th>
</tr></THEAD><TBODY>");
$i=1;
$tot=0;
         while($info=mysql_fetch_array($leon))
       {
	   	  
		  $pin=$info['pin'];

	  $firstname=$info['first_name'];
	  $lastname=$info['second_name'];
						
						  	  $group=$info['groupname'];
							  	  $land=$info['landsize'];
								  	  $zone=$info['landzone'];

	  $leon1=mysql_query("select * from pytv where pin='$pin' and season='$season'") or die(mysql_error());
				$counta=mysql_num_rows($leon1);
				if($counta<=0)							  
			{
												  
	  echo"<tr><td>$i</td>";
	   
	   echo"<td align=center>$pin </td>";
	  echo"<td align=center>$firstname </td>";
	 
	  echo"<td align=center>$lastname </td>";
	   echo"<td align=center>$group </td>";
	      echo"<td align=center>$zone </td>";

	  
	  $i++;
$tot+=$land;

	  	 
	  //echo"<td align=center>$land</td>";
	//  echo"<td align=center>$dis</td>";
	 
	//  echo"<td align=center>$umudugudu</td>";

	 
	  echo"<td align=center>$land</td>
</tr>";

	  
	  

	}  
      

   }
      echo("</TBODY></table>");

   }
  ?>
  

  
</body>

</html>
