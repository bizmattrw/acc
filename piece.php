<?php
	include 'dbcon.php';
	if(isset($_POST['print'])){
		//$ex = explode(' - ', $_POST['date_range']);
		$from = $_POST['date1'];
		$to = $_POST['date2'];
		$from_title = $_POST['date1'];
		$to_title = $_POST['date2'];
 require_once 'pdf.php';
 include('database_connection.php');
 include('dbcon.php');
 $address=$_SESSION['location'];
 $output = '';
 $output.='<h2>EXPENSES REPORT';
 $output.=' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
     <td colspan="5" align="center" style="font-size:18px"><b>From '.$from_title."&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;".$to_title.'</b></td>
    </tr><tr>
				<th>No</th>
                  
				  <th>Date</th>
				  <th>Name</th>
                  
				  <th>Reason</th>
				  <th>Amount</th>
				  
                 
				  </tr>
				  

	';
				  $statement = mysqli_query($con,"SELECT * FROM expenses WHERE address='$address' and date>='$from' and date<='$to' order by id desc");
				  $i=$totqty=$totam=0;
				  while($row=mysqli_fetch_array($statement))
                    {
					
					$i++;
                    $date=$row['date'];
					$name=$row['particulars'];
					$amount=$row['amount'];
					//$totqty+=$qty;
					
				//  $statement1 = mysqli_query($con,"select price from products WHERE name='$name'");
				 // $row1=mysqli_fetch_array($statement1);
				  $reason=$row['reason'];
				  //$am=$qty*$pprice;
				  $totam+=$amount;
				  
				  $amf=number_format($amount);
				$output.='<tr><td>'.$i.'</td><td>'.$date.'</td><td>'.$name.'</td><td>'.$reason.'</td><td>'.$amf.'</td></tr>';
					
					}
					
					$totamf=number_format($totam);
					$output.='<tr><th colspan=3>TOTAL</th><th></th><th>'.$totamf.'</th></tr>';
					  $output .= '
      </table>

  ';
//echo"$output";
$pdf = new Pdf();
 $file_name = 'Sales-.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));

 
}

?>