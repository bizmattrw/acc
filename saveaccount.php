<?php
session_start();

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

<BODY>
	<center>
		<?php
		$combname = $_POST['combname'];
		$lev = $_POST['lev'];
		$chk = $_POST['chk'];
		include("dbcon.php");
		$vie = mysqli_query($con, "select Level_id,Level from level where Level_id='$lev'");
		$add = FALSE;
		while ($dany = mysqli_fetch_array($vie)) {
			$faid = $dany['Level_id'];
			$facna = $dany['Level'];

			for ($i = 0; $i < count($chk); $i++) {
				$chkv = "select * from combination where '$combname[$i]'=Combination";
				$chk1 = mysqli_query($con, $chkv) or die(mysqli_error($con));
				$chk2 = mysqli_num_rows($chk1);
				$account = "$combname[$i]";
				if ($chk2 != null) {
					echo "<script>$combname[$i] already exists in the Banks</script>";
					include("bankaccount.php");
					exit();
				} else {

					$add = mysqli_query($con, "insert into Combination values('', '$faid','$combname[$i]','$_SESSION[coopid]', '')");
					if (!$add) {
						echo "not saved" . mysqlI_error($con);
					} else {
						echo "<br><br><br><center><font color=green size=+2>New Account $account added to $lev  Bank!</font><br>";
					}
				}
			}
		}
		if ($add) {
			echo "<meta http-equiv=\"refresh\" content=\"2;URL='updatebankaccount.php'\">";
		}
		?>
</BODY>

</HTML>