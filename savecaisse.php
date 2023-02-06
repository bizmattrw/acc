<?php
include "./session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>CAISSE MANAGEMENT</title>
</head>

<body bgcolor="#CCCCCC">
     <?php
     if(isset($_POST['submit']))
     {
     include("dbcon.php");
     // print_r($_POST);
     $action = $_POST['destination'];
     $date = $_POST['date'];
     $selspeaker1c = mysqli_query($con, "select balance from caisse where coopid='$_SESSION[coopid]' order by id desc limit 1");

     if (mysqli_num_rows($selspeaker1c) <= 0) {
          $balancec = 0;
     } else {
          while ($speakc = mysqli_fetch_array($selspeaker1c)) {
               $balancec = $speakc['balance'];
          }
     }

     if ($action == "hand") {
          $handAmount = $_POST['hand-amount'];
          $sources = $_POST['hand-source'];
          $references = $_POST["hand-reference"];
          $upspeak1 = mysqli_query($con, "update caisse set status=1");
          foreach ($handAmount as $key => $amount) {
               $source = $sources[$key];
               $reference = $references[$key];
               $balance = $balancec + $amount;
               $sel5 = mysqli_query($con, "select count(id) as id from caisse order by id DESC LIMIT 1") or die(mysqli_error($con));
               $row1 = mysqli_fetch_array($sel5);
               $id = $row1['id'];
               $id = $id + 1;
               $upspeak1 = mysqli_query($con, "INSERT INTO caisse(`bankname`, `particulars`, `amount`, `reason`, `action`, `balance`, `date`, `coopid`, `refno`)
               VALUES('hand', '$source', '$amount', 'hand', 'debit', '$balance', '$date', '$_SESSION[coopid]', '$reference')") or die("FAILED TO INSERT CAISSE" . mysqli_error($con));

               $upspeak2 = mysqli_query($con, "insert into iyongeramutungo values('','$date','$source','$amount','$id','','',
                    '','$_SESSION[coopid]')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));

               // exit();
          }
          echo "<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\"><center><font color=green size=20>Data save successfully";
          /* $upspeak1 = mysqli_query($con, "update caisse set status=1");
          $balance = $balancec + $particular;
          $upspeak1 = mysqli_query($con, "insert into caisse values('','$source','','$names','$particular','$bordereau','debit','$balance','$date','$account','$_SESSION[coopid]','')")
               or die("FAILED TO INSERT CAISSE" . mysqli_error($con));
          $sel1 = mysqli_query($con, "select id from caisse where coopid='$_SESSION[coopid]' order by id desc limit 1") or die(mysqli_error($con));
          $med1 = mysqli_fetch_array($sel1);
          $id = $med1['id'];
          $filename = $_FILES["photo"]["name"];
          move_uploaded_file($_FILES["photo"]["tmp_name"], "pieces/" . $filename);
          $upspeak2 = mysqli_query($con, "insert into iyongeramutungo values('','$date','$bordereau','$particular','$id','','','$filename','$_SESSION[coopid]')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));
          echo "<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\">";
          exit(); */
     }

     if ($action == "account") {
          $transferAmount = $_POST['amount-spent'];
          $accounts = $_POST['budget-line'];
          $particulars = $_POST['budget-particular'];
          $reasons = $_POST['budget-reason'];
          $references = $_POST["budget-reference"];
          $year = date("Y");
          // print_r($_POST);
          require_once 'pdf.php';
          $output = '';
          $output .= 'PAYMENT PROOF <HR>';
      
          mysqli_query($con, "UPDATE caisse SET status='1'");
          foreach ($transferAmount as $key => $amount) {
               $account = $accounts[$key];
               $particular = $particulars[$key];
               $reason = $reasons[$key];
               $reference = $references[$key];
               $balance = $balancec + $amount;
               $selSql = "select amount,amountremain,id,codename,year from account where id='$account' and year='$year' and coopid='$_SESSION[coopid]'";
               //echo "$selSql";
               $selspeaker1 = mysqli_query($con, $selSql) or die(mysqli_error($con));
               $am = $amrem = $current = 0;

               while ($speak = mysqli_fetch_array($selspeaker1)) {
                    $am = $speak['amount'];
                    $bline = $speak['codename'];
                    $amrem = $speak['amountremain'];
                    $current = $amrem - $amount;
               }
               $balance = $balancec - $amount;
               $sel5 = mysqli_query($con, "select count(id) as id from caisse order by id DESC LIMIT 1") or die(mysqli_error($con));
               $row1 = mysqli_fetch_array($sel5);
               $id = $row1['id'];
               $id = $id + 1;

               $issa = mysqli_query($con, "UPDATE account SET amountremain='$current', `status`='1' WHERE year='$year' AND codename='$bline' AND coopid='$_SESSION[coopid]'") or die(mysqli_error($con));
               $ins1 = mysqli_query($con, "INSERT INTO expenses VALUES('$amount', ' $reason','$bline',' ','$date', 'caisse',' ',' ', '$_SESSION[coopid]')") or die("failed to select" . mysqli_error($con));
               $upspeak1 = mysqli_query($con, "INSERT INTO `caisse`(`particulars`, `amount`, `reason`, `action`, `balance`, `date`, `budgetline`, `coopid`, `refno`) 
                    VALUES ('$particular', '$amount' ,'$reason', 'credit', '$balance', '$date', '$bline', '$cooperativeId', '$reference')") or die("FAILED TO INSERT CAISSE" . mysqli_error($con));
               $upspeak2 = mysqli_query($con, "insert into itubyamutungo values('','$date','$reason','$amount','$id','','',
                    '','$cooperativeId')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));
                   

                    $output .= '<table width=50% border=0 cellpadding=5 cellspacing=0>
                    <tr><td rowspan=5><img src="images/Chmsc_logo.png" width=100 height=100></td>
                    <td>COOPERATIVE NAME</TD></TR>
                    <TR><TD>COOPERATIVE ADDRESS</td></tr>
                    <TR><TD>TEL: 0783838338</td></tr>
                    <TR><TD>Email: biz.matt01@gmail.com</td></tr>
                    <TR><TD>TIN: 10123444</td></tr>
                    </table> <br>';
          
                    $output .= '<table width=100% border=1 cellpadding=5 cellspacing=0>
                    <tr><th>Date</th><th>Reference No</th><th>Budget Line</th><TH>Particular</th><th>Reason</th><th>Amount</th></tr>';
                    $output .= '<tr><td>' . $date . '</td><td>' . $reference . '</td><td>' . $account . '</td><td>' . $particular . '</td><td>' . $reason . '</td><td>' . $amount . '</td></tr></table><br>';

                    $output .= 'I ' . $particular . ' accept that I have received the amount stated above from COOPERATIVE NAME <BR><BR>';       

          }
        

          $pdf = new Pdf();
          $file_name = 'PaymentProof-.pdf';
          $pdf->loadHtml($output);
          $pdf->render();
          ob_end_clean();
          $pdf->stream($file_name, array("Attachment" => false));
          /*echo "<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\"><center><font color=green size=20>Data save successfully";
          */
          // exit();
     }

     if ($action == "transfer") {
          $transaccounts = $_POST['account'];
          $transbanks = $_POST['bank'];
          $transferAmount = $_POST['transfer-amount'];
          $references = $_POST["transfer-reference"];

          foreach ($transferAmount as $key => $amount) {
               $transbank = $transbanks[$key];
               $transaccount = $transaccounts[$key];
               $reference = $references[$key];
               $sel4 = mysqli_query($con, "select balance from bank WHERE account='$transaccount'");
               $row = mysqli_fetch_array($sel4);
               $balanceb = $row['balance'];
               $balanceb = $balanceb + $amount;
               $sel5 = mysqli_query($con, "select count(id) as id from caisse order by id DESC LIMIT 1") or die(mysqli_error($con));
               $row1 = mysqli_fetch_array($sel5);
               $id = $row1['id'];
               $id = $id + 1;

               $l3 = mysqli_query($con, "select Level from level WHERE Level_id='$transbank'");
               while ($info = mysqli_fetch_array($l3)) {
                    $transbank = $info['Level'];
               }
               $balance = $balancec - $amount;
               $upspeak1 = mysqli_query($con, "INSERT INTO bank VALUES('','$transbank','$transaccount',' ','$amount',' ','debit','$balanceb','$date'
			   ,'Transfer','From Caisse $transbank', 'From Caisset $transaccount','$_SESSION[coopid]', '$reference', '1')") or die("failed to insert transfer" . mysqli_error($con));
               $balance = $balancec - $amount;
               $upspeak1 = mysqli_query($con, "INSERT INTO caisse values('','caisse','','','$amount', 'Transfer to $transbank ','credit', '$balance','$date','', '$_SESSION[coopid]', 
			   '', '$reference')") or die("FAILED TO INSERT CAISSE" . mysqli_error($con));
               $upspeak2 = mysqli_query($con, "insert into iyongeramutungo values('','$date','Transfer from bank $transbank ($transaccount)','$amount','$id','','',
                    '','$_SESSION[coopid]')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));
          }
          echo "<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\">";
          //$upspeak1=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balancecv',now())");
     }

     /* $selspeaker1c = mysqli_query($con, "select balance from caisse where coopid='$_SESSION[coopid]'");
     if (mysqli_num_rows($selspeaker1c) <= 0) {
          $balancec = 0;
     } else {
          while ($speakc = mysqli_fetch_array($selspeaker1c)) {
               $balancec = $speakc['balance'];
          }
     }


     $sel1 = mysqli_query($con, "select sum(amount) as am from caisse where action='debit' and coopid='$_SESSION[coopid]' group by action");
     $med1 = mysqli_fetch_array($sel1);
     $amountdebit = $med1['am'];
     $sel2 = mysqli_query($con, "select sum(amount) as amcredit from caisse where action='credit' and coopid='$_SESSION[coopid]' group by action");
     $med2 = mysqli_fetch_array($sel2);
     $amountcredit = $med2['amcredit'];
     $amt = $amountdebit - $amountcredit;

     if ($particular > $amt) {
          echo "MWIHANGANE NTAMAFARANGA AHAGIJE ARI MU ISANDUKU ";
          echo "<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\">";
          exit();
     } else {
          $year = date("Y");

          // WHEN DESTINATION IS FOR BUDGET LINE

          if ($action == "account") {
               $account = $_POST['account'];
               $selspeaker1 = mysqli_query($con, "select amount,amountremain,id,codename,year from account where codename='$account' and year='$year' and coopid='$_SESSION[coopid]'") or die(mysqli_error($con));
               while ($speak = mysqli_fetch_array($selspeaker1)) {
                    $am = $speak['amount'];
                    $amrem = $speak['amountremain'];
               }
               $current = $amrem - $particular;
               if ($particular > $am) {
                    echo "Mwihangane amafaranga mushaka arenze ayateganyijwe..";
                    // echo"<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\">";
                    exit();
               }

               if ($particular > $amrem) {
                    echo "Mwihangane amafaranga mushaka arenze asigaye Kuri iyi Budget Line $account.. muri $year";
                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=caissetransactions.php\">";
                    exit();
               } else {

                    $balance = $balancec + $particular;
                    $issa = mysqli_query($con, "update account set amountremain='$current',status='1' where year='$year' and codename='$account' and coopid='$_SESSION[coopid]'") or die(mysqli_error($con));
                    $ins1 = mysqli_query($con, "insert into expenses values('$particular','$bordereau','$account','','$date','caisse','','$names','$_SESSION[coopid]')") or die("failed to select" . mysqli_error($con));
                    $upspeak1 = mysqli_query($con, "insert into caisse values('','caisse','','$names','$particular','$bordereau','credit','$balance','$date','$account','$_SESSION[coopid]')")
                         or die("FAILED TO INSERT CAISSE" . mysqli_error($con));
                    $sel1 = mysqli_query($con, "select id from caisse where coopid='$_SESSION[coopid]' order by id desc limit 1") or die(mysqli_error($con));
                    $med1 = mysqli_fetch_array($sel1);
                    $id = $med1['id'];

                    $filename = $_FILES["photo"]["name"];
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "pieces/" . $filename);
                    $upspeak2 = mysqli_query($con, "insert into itubyamutungo values('','$date','$bordereau','$particular','$id','','','$filename','$_SESSION[coopid]')") or die("whats hell IYONGERAMUTUNGO" . mysqli_error($con));
                    $balance = $balancec - $particular;
                    echo "<meta http-equiv=\"refresh\" content=\"1;URL=caissetransactions.php\">";
                    echo "<font size=25 color=green> Data saved successfully";
                    exit();
               }
          }

          // WHEN DESTINATION IS FOR BANK TRANSFER

          if ($action == "transfer") {
               $transaccount = $_POST['transaccount'];
               $transbank = $_POST['transbank'];
               $l3 = mysqli_query($con, "select Level from level WHERE  Level_id='$transbank'");
               while ($info = mysqli_fetch_array($l3)) {
                    $transbank = $info['Level'];
               }

               $upspeak1 = mysqli_query($con, "insert into bank values('','$transbank','$transaccount','$names','$particular','$bordereau','debit','','$date','Transfer','From Caisse $transbank',
'From Caisset $transaccount','$_SESSION[coopid]','1')") or die("failed to insert transfer" . mysqli_error($con));

               $balance = $balancec - $particular;
               $upspeak1 = mysqli_query($con, "insert into caisse values('','caisse','','$names','$particular','$bordereau','credit','$balance','$date','Transfer to $transbank ','$_SESSION[coopid]')") or die("FAILED TO INSERT CAISSE" . mysqli_error($con));
               //$upspeak1=mysqli_query($con,"insert into caisse values('','$bank','$subcat','$names','$particular','$bordereau','credit','$balancecv',now())");
          } else {
               $upspeak1 = mysqli_query($con, "insert into caisse values('','caisse','','$names','$particular','$bordereau','credit','$balance','$date','Other','$_SESSION[coopid]')") or die("FAILED TO INSERT CAISSE2" . mysqli_error($con));
               $year = date("Y");
               $movement = $_POST['movement'];

               mysqli_query($con, "update liabilities set amount=(amount-'$particular') where source='$movement' and year(date)='$year' and coopid='$_SESSION[coopid]'") or die("FAILED LIABILITIES" . mysqli_error($con));
          }

          echo "<meta http-equiv=\"refresh\" content=\"1;URL=caissetransactions.php\">";
          echo "<font size=25 color=green> Data saved successfully";
     } */

}
     ?>
</body>

</html>