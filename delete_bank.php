<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deleting item</title>
</head>

<body>
<?php
include("dbcon.php");
$id=$_GET['id'];
$bline=$_GET['bline'];
$am=$_GET['amount'];
$date=$_GET['date'];
$reason=$_GET['reason'];

$result=mysqli_query($con,"delete from bank where id='$id'")or die(mysqli_error($con));
$year=date("Y");
$result=mysqli_query($con,"delete from bank where bline='$bline' and date='$date' and amount='$am' and bordereau='$reason'")or die(mysqli_error($con));
mysqli_query($con,"update account set amountremain=(amountremain+'$am') where year='$year' and codename='$bline' and year='$year' and coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
$result=mysqli_query($con,"delete from caisse where date='$date' and amount='$am' and reason='$reason'")or die(mysqli_error($con));
$result=mysqli_query($con,"delete from expenses where duedate='$date' and amount='$am' and reason='$reason'")or die(mysqli_error($con));

if($result)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=update_bank.php\">";
}

?>
</body>
</html>
