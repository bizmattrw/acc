<?php
session_start();
if(!isset($_SESSION['username']))
{
header("location: logg.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>

 <BODY><center>
  <?php
  if(empty($combname))
{
print("<FONT COLOR=red><b>Empty Account</FONT>");
include("addcombination.php");
exit();

}

	else{
include("dbcon.php");
$y=date("Y");
$chk="select * from combinations where '$combname'=Combination and season='$lev' and year='$y'";
$chk1=mysql_query($chk);
if(!$chk1){echo"failed to insert  ".mysql_error();}

$chk2=mysql_num_rows($chk1);
if($chk2!=null)
{
print("<FONT COLOR=red><b>$combname already exists in the Accounts in $lev Season</FONT>");
include("addcombination.php");
exit();	
}
else{
$vie=mysql_query("select Level_id,Level from levels where Level='$lev'");
while($dany=mysql_fetch_array($vie))
{
	$faid=$dany['Level_id'];
	$facna=$dany['Level'];
}
$y=date("Y");
$add="insert into Combinations values('$faid','$combname',$y,'','$lev')";
mysql_query($add);

print("<FONT COLOR=blue><b>Account of $combname Added!</FONT>");
include("addcombination.php");
}
}
  ?>
 </BODY>
</HTML>
