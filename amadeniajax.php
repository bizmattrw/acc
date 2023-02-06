<?php include'session.php';
include'dbcon.php';
// fetch records

$sql = "select * from amadeni where coopid='$_SESSION[coopid]' order by id desc";
$result = mysqli_query($con, $sql);
$array = array();
while($row = mysqli_fetch_array($result)) {
$id=$row['id'];
$pieceno=$row['pieceno'];
$number = sprintf('%04d',$pieceno);

//UPDATE BUTTON
  $updateButton = "<a href=\"update_amadeni.php?id=$id\" class=\"btn btn-success\"><em class='fa fa-pencil'>Edit</em></a>";
        // Delete Button
        $deleteButton = "<a href=\"deleteamadeni.php?id=$id\" class=\"btn btn-danger\"><em class='fa fa-trash'>Remove</em></a>";
        // Payment Button
        $payButton = "<a href=\"payamadeni.php?id=$id\" class=\"btn-xs btn-default btn\">Payment</a>";
        $action1 =$updateButton;
		$action2=$deleteButton;
		$action3=$payButton;
		
	   $sub_array   = array();
	        $sub_array[] =$action1;
			$sub_array[] =$action2;
			$sub_array[] =$action3;
	        $sub_array[] =$row['date'];
			$sub_array[] =$row['reason'];
    	    $sub_array[] =$number;
			$sub_array[] =$row['value'];
			$sub_array[] =$row['ayishyuwe'];
			$sub_array[] =$row['asigaye'];
			$sub_array[] =$row['type'];
			$sub_array[] =$row['owner'];
			$sub_array[] =$row['datetopay'];
				
				$array[] = $sub_array;

}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
?>