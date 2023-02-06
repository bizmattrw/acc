<?php include("session.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
	<title>BANK RECORD</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<?php
	$s = $_POST['s'];

	if (empty($s)) { ?>
		<script type="text/javascript">
			alert(" All fields are not filled. Please try to fill them ")
			window.location = "subjects.php"
		</script>
		<?php
	} else {
		if ($s > 0) { ?>
			<script type="text/javascript">
				alert(" SORRY ONLY THE STRINGS ARE ALLOWED FOR SCHOOL ")
				window.location = "subjects.php"
			</script>
	<?php
		} else {
			include("dbcon.php");
			include './helpers.php';
			if (getOrZero("SUM(Level_id)", "level", "Level = '$s' AND coopid = '$_SESSION[coopid]'") != 0) {
				echo "<script>alert('It seems like a bank with this name already exists in the cooperative.');</script>";
				echo "<script>history.back();</script>";
			} else {
				$insert1 = mysqli_query($con, "insert into level values('','$s','$_SESSION[coopid]', '')");

				if (!$insert1) {
					echo "not  dsved" . mysqlI_error($con);
				} else {
					echo "<meta http-equiv=\"refresh\" content=\"1;URL='bankaccount.php'\">";
					echo "<br><br><br><center><font color=green size=+2>New Bank added!</font><br>";
				}
			}
		}
	}
	?>
</body>

</html>