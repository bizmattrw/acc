<?php include("session.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>BANK MANAGEMENT</title>
</head>

<body bgcolor="#CCCCCC">
   <?php
   if(isset($_POST['save']))
   {
   include("dbcon.php");
   include './helpers.php';
   $subcat = $_POST['subcat'];
   $subcatId = $subcat;
   $names = $_POST['names'];
   $date = $_POST['date'];
   $particular = $_POST['particular'];
   $bordereau = $_POST['bordereau'];
   $cat = $_POST['cat'];
   $action = $_POST['action'];
   $ref = $_POST['ref'];
   $l1 = mysqli_query($con, "select Level from level WHERE  Level_id='$cat'");
   while ($info = mysqli_fetch_array($l1)) {
      $bank = $info['Level'];
   }
   $subcat = fetchNow("Combination", "combination", "id = '$subcat'");
   $selspeaker1 = mysqli_query($con, "select balance from bank WHERE bankname = '$bank' AND account='$subcat'");
   if (mysqli_num_rows($selspeaker1) <= 0) {
      $balance = 0;
   }
   while ($speak = mysqli_fetch_array($selspeaker1)) {
      $balance = $speak['balance'];
   }
   $selspeaker1c = mysqli_query($con, "select balance from caisse where coopid='$_SESSION[coopid]' order by id desc limit 1");
   if (mysqli_num_rows($selspeaker1c) <= 0) {
      $balancec = 0;
   } else {
      while ($speakc = mysqli_fetch_array($selspeaker1c)) {
         $balancec = $speakc['balance'];
      }
   }

   if ($action == 'debit') {
      $slip = $_POST['slip'];
      $filename = $_FILES["photodebit"]["name"];

      move_uploaded_file($_FILES["photodebit"]["tmp_name"], "pieces/" . $filename);
      $balance = $balance + $particular;

      $l1 = mysqli_query($con, "select Level from level WHERE  Level_id='$cat'");
      while ($info = mysqli_fetch_array($l1)) {
         $bank = $info['Level'];
      }

      $upspeak1 = mysqli_query($con, "insert into bank values('null','$bank','$subcat','$names','$particular','$bordereau','$action','$balance','$date','Slip','$slip','',
	  '$_SESSION[coopid]','$ref','')")
         or die("whats hell ON BANK" . mysqli_error($con));

      $insertdebit_query = mysqli_query($con, "insert into piece values('','$action','$names','$date','$filename')");
      //$upspeak2=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','debit','$balancec',now())");
      $upspeak2 = mysqli_query($con, "insert into iyongeramutungo values('','$date','$bordereau','$particular','','$date','','$filename','$_SESSION[coopid]')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));
      $upspeak3 = mysqli_query($con, "UPDATE `level` SET `status` = 1 WHERE Level_id = '$cat'") or die(mysqli_error($con));
      $upspeak4 = mysqli_query($con, "UPDATE `combination` SET `status` = 1 WHERE id = '$subcatId'") or die(mysqli_error($con));

      if (!$upspeak1) {
         echo "failed to insert   " . mysqli_error($con);
      } else {
         echo "<script>alert('Data saved successfully..')</script>";
         echo "<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";
         exit();
      }
   }
   if ($action == 'credit') {
      $l2 = mysqli_query($con, "select Level from level WHERE  Level_id='$cat'");
      while ($info = mysqli_fetch_array($l2)) {
         $bank = $info['Level'];
      }



      $sel1 = mysqli_query($con, "select sum(amount) as am from bank where action='debit' and account='$subcat' group by account");
      $med1 = mysqli_fetch_array($sel1);
      $amountdebit = $med1['am'];
      $sel2 = mysqli_query($con, "select sum(amount) as amcredit from bank where action='credit' and account='$subcat' group by account");
      $med2 = mysqli_fetch_array($sel2);
      $amountcredit = $med2['amcredit'];
      $amt = $amountdebit - $amountcredit;

      if ($particular >= $amt) {
         echo "Sorry there is not enough money for this account..$subcat";
         echo "<meta http-equiv=\"refresh\" content=\"2;URL=updatebank.php\">";
         exit();
      } else {
         $balance = $balance - $particular;
         $issa = mysqli_query($con, "update bank set status='1' where account='$subcat' ") or die("FAILED TO UPDATE BANK" . mysqli_error($con));

         $upspeak1 = mysqli_query($con, "insert into bank values('','$bank','$subcat','$names','$particular','$bordereau','$action','$balance','$date','Credit','','',
		 '$_SESSION[coopid]','$ref','')")
            or die("FAILED1 BANK" . mysqli_error($con));
         //$upspeak1=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balancecv',now())");

         $balancecv = $balancec + $particular;

         $upspeak2 = mysqli_query($con, "insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','debit','$balancecv','$date','','$_SESSION[coopid]','1','$ref')") or die("failed to insert" . mysqli_error($con));;
         $upspeak3 = mysqli_query($con, "UPDATE `level` SET `status` = 1 WHERE Level_id = '$cat'") or die(mysqli_error($con));
         $upspeak4 = mysqli_query($con, "UPDATE `combination` SET `status` = 1 WHERE id = '$subcatId'") or die(mysqli_error($con));
         echo "<script>alert('Data saved successfully..')</script>";
         echo "<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";
      }
   }
   if ($action == 'other') {
      $l2 = mysqli_query($con, "select Level from level WHERE  Level_id='$cat'");
      while ($info = mysqli_fetch_array($l2)) {
         $bank = $info['Level'];
      }

      if (mysqli_num_rows($selspeaker1) <= 0) {
         $balance = 0;
      }
      while ($speak = mysqli_fetch_array($selspeaker1)) {
         $balance = $speak['balance'];
      }

      $sel1 = mysqli_query($con, "select sum(amount) as am from bank where action='debit' and account='$subcat' group by account");
      $med1 = mysqli_fetch_array($sel1);
      $amountdebit = $med1['am'];
      $sel2 = mysqli_query($con, "select sum(amount) as amcredit from bank where action='credit' and account='$subcat' group by account");
      $med2 = mysqli_fetch_array($sel2);
      $amountcredit = $med2['amcredit'];
      $amt = $amountdebit - $amountcredit;

      if ($particular >= $amt) {
         echo "Sorry there is not enough money for this account..";
         echo "<meta http-equiv=\"refresh\" content=\"3;URL=updatebank.php\">";
         exit();
      } else {
         $balance = $balance - $particular;
         $upspeak1 = mysqli_query($con, "INSERT into bank values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balance','$date','Credit','',
		 '','$_SESSION[coopid]','$ref','')") or die("FAILED BANK" . mysqli_error($con));
         //$upspeak1=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balancecv',now())");
         $balancecv = $balancec + $particular;
         $year = date("Y");
         $movement = $_POST['movement'];
         mysqli_query($con, "update liabilities set amount=(amount-'$particular') where source='$movement' and year(date)='$year'") or die("FAILED LIABILITIES" . mysqli_error($con));
         $upspeak3 = mysqli_query($con, "UPDATE `level` SET `status` = 1 WHERE Level_id = '$cat'") or die(mysqli_error($con));
         $upspeak4 = mysqli_query($con, "UPDATE `combination` SET `status` = 1 WHERE id = '$subcatId'") or die(mysqli_error($con));
         //$upspeak2=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','debit','$balancecv','$date','')")OR die("failed to insert".mysqli_error($con));;
         echo "<script>alert('Data saved successfully..')</script>";
         echo "<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";
      }
   }

   //WHEN USED CHECQUE

   if ($action == 'cheque') {

      $account = $_POST['account'];
      $chequeno = $_POST['chequeno'];
      $account = fetchNow("codename", "account", "id = '$account'");
      $l2 = mysqli_query($con, "select Level from level WHERE  Level_id='$cat'");
      while ($info = mysqli_fetch_array($l2)) {
         $bank = $info['Level'];
      }



      $sel1 = mysqli_query($con, "select sum(amount) as am from bank where action='debit' and account='$subcat' group by account");
      $med1 = mysqli_fetch_array($sel1);
      $amountdebit = $med1['am'];
      $sel2 = mysqli_query($con, "select sum(amount) as amcredit from bank where action='credit' and account='$subcat' group by account");
      $med2 = mysqli_fetch_array($sel2);
      $amountcredit = $med2['amcredit'];
      $amt = $amountdebit - $amountcredit;

      if ($particular >= $amt) {
         echo "Sorry there is not enough money for this account..$subcat";
         //  echo "<meta http-equiv=\"refresh\" content=\"2;URL=bank.php\">";
      } else {
         $year = date("Y");
         $selspeaker1 = mysqli_query($con, "select amount,amountremain,id,codename,year from account where codename='$account'") or die(mysqli_error($con));
         while ($speak = mysqli_fetch_array($selspeaker1)) {
            $am = $speak['amount'];
            $amrem = $speak['amountremain'];
         }
         $current = $amrem - $particular;
         if ($particular > $am) {
            echo "Mwihangane amafaranga mushaka arenze ayateganyijwe..";
            // echo "<meta http-equiv=\"refresh\" content=\"2;URL=bank.php\">";
            exit();
         }

         if ($particular > $amrem) {
            echo "Mwihangane amafaranga mushaka arenze asigaye Kuri iyi $account.. ";
            // echo "<meta http-equiv=\"refresh\" content=\"2;URL=bank.php\">";
            exit();
         } else {


            $filename = $_FILES["photo"]["name"];

            move_uploaded_file($_FILES["photo"]["tmp_name"], "pieces/" . $filename);

            $issa = mysqli_query($con, "update account set amountremain='$current',status='1' where year='$year' and codename='$account' and coopid='$_SESSION[coopid]' ") or die(mysqli_error($con));
            $issa = mysqli_query($con, "update bank set status='1' where account='$subcat' ") or die("FAILED TO UPDATE BANK" . mysqli_error($con));
            $ins1 = mysqli_query($con, "insert into expenses values('$particular','$bordereau','$account','','$date','$bank','$subcat','$names','$_SESSION[coopid]')") or die("failed to select" . mysqli_error($con));

            $balance = $balance - $particular;
            $upspeak1 = mysqli_query($con, "insert into bank values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balance','$date','Cheque','$chequeno','$account',
'$_SESSION[coopid]','$ref','')") or die("failed to insert
cheque" . mysqli_error($con));
            $upspeak2 = mysqli_query($con, "insert into itubyamutungo values('','$date','$bordereau','$particular','','$date','','$filename','$_SESSION[coopid]')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));
            $insertdebit_query = mysqli_query($con, "insert into piece values('','$action','$names','$date','$filename')");
            //$upspeak1=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balancecv',now())");
            $upspeak3 = mysqli_query($con, "UPDATE `level` SET `status` = 1 WHERE Level_id = '$cat'") or die(mysqli_error($con));
            $upspeak4 = mysqli_query($con, "UPDATE `combination` SET `status` = 1 WHERE id = '$subcatId'") or die(mysqli_error($con));

            require_once 'pdf.php';
            $output = '';
            $output .= 'PAYMENT PROOF <HR>';
            $output .= '<table width=50% border=0 cellpadding=5 cellspacing=0>
            <tr><td rowspan=5><img src="images/Chmsc_logo.png" width=100 height=100></td>
            <td>COOPERATIVE NAME</TD></TR>
            <TR><TD>COOPERATIVE ADDRESS</td></tr>
            <TR><TD>TEL: 0783838338</td></tr>
            <TR><TD>Email: biz.matt01@gmail.com</td></tr>
            <TR><TD>TIN: 10123444</td></tr>
            </table> <br><br>';
            $output .= '<table width=100% border=1 cellpadding=5 cellspacing=0>
            <tr><th>Date</th><th>Cheque No</th><th>Bank</th><th>Particular</th><th>Reason</th><th>Amount</th></tr>
            <tr><td>' . $date . '</td><td>' . $chequeno . '</td><td>' . $bank . ' ' . ' ' . $subcat . '</td><td>' . $names . '</td><td>' . $bordereau . '</td><td>' . $balance . '</td></tr></table><br><br><br><br>';
            $output .= 'I ' . $names . ' accept that I have received the amount stated above from COOPERATIVE NAME <BR><BR><BR>';

            $pdf = new Pdf();
            $file_name = 'PaymentProof-.pdf';
            $pdf->loadHtml($output);
            $pdf->render();
            ob_end_clean();
            $pdf->stream($file_name, array("Attachment" => false));
            /*
            echo "<script>alert('Data saved successfully..')</script>";
            echo "<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";
            */
         }
      }
   }

   //WHEN USED BANK TRANSFER

   if ($action == 'transfer') {

      $transaccount = $_POST['transaccount'];
      $transbank = $_POST['transbank'];
      $l2 = mysqli_query($con, "select Level from level WHERE  Level_id='$cat'");
      while ($info = mysqli_fetch_array($l2)) {
         $bank = $info['Level'];
      }
      $l3 = mysqli_query($con, "select Level from level WHERE  Level_id='$transbank'");
      while ($info = mysqli_fetch_array($l3)) {
         $transbank = $info['Level'];
      }
      $transbankAmount = getOrZero("balance", "bank", "bankname = '$transbank' AND account = '$transaccount' ORDER BY id DESC LIMIT 1");
      $transbankAmount += $particular;


      $sel1 = mysqli_query($con, "select sum(amount) as am from bank where action='debit' and account='$subcat' group by account");
      $med1 = mysqli_fetch_array($sel1);
      $amountdebit = $med1['am'];
      $sel2 = mysqli_query($con, "select sum(amount) as amcredit from bank where action='credit' and account='$subcat' group by account");
      $med2 = mysqli_fetch_array($sel2);
      $amountcredit = $med2['amcredit'];
      $amt = $amountdebit - $amountcredit;

      if ($particular >= $amt) {
         echo "Sorry there is not enough money for this account..$subcat";
         echo "<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";
      } else {


         //$upspeak1=mysqli_query($con,"insert into caisse values('','$bank','$compte','$fn1 $ln1','$amount1','$reason','debit','$balance','$date1')")or die(mysqli_error($con));
         //echo"Data saved successfully..";
         //     echo"<meta http-equiv=\"refresh\" content=\"1;URL=expenses.php\">";
         //$amleft=$muh1-$amount1;

         $balance = $balance - $particular;
         $issa = mysqli_query($con, "update bank set status='1' where account='$subcat' ") or die("FAILED TO UPDATE BANK" . mysqli_error($con));
         $upspeak1 = mysqli_query($con, "insert into bank values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balance','$date',
		 'Transfer','To $transbank','To $transaccount','$_SESSION[coopid]', '$ref','')")
            or die("failed to insert transfer" . mysqli_error($con));
         $upspeak1 = mysqli_query($con, "insert into bank values('','$transbank','$transaccount','$names','$particular','$bordereau','debit','$transbankAmount','$date','Transfer','from $transbank',
'From $transaccount','$_SESSION[coopid]','$ref','')") or die("failed to insert transfer" . mysqli_error($con));
         $upspeak3 = mysqli_query($con, "UPDATE `level` SET `status` = 1 WHERE Level_id = '$cat'") or die(mysqli_error($con));
         $upspeak4 = mysqli_query($con, "UPDATE `combination` SET `status` = 1 WHERE id = '$subcatId'") or die(mysqli_error($con));

         echo "Data saved successfully..";
         echo "<meta http-equiv=\"refresh\" content=\"1;URL=bank.php\">";
      }
   }
}


   ?>
</body>

</html>