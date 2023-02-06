<?php include'session.php';?>
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

<body bgcolor="">

<?PHP
$date1=$_POST['date1'];
$date2=$_POST['date2'];
echo"<center><H2><strong><u><a href='operationalreportexcel.php?date1=$date1&&date2=$date2'><img src='images/xls.png'>
</A>RAPORO Y'UKWEZI KUVA $date1 KUGEZA $date2 </H2></strong></u>
</CENTER>";
include("dbcon.php");

//OPENING BALANCE ON BANKS

   echo"<table border=1 id=employees  class='table table-striped'><thead>
   <tr class=warning>";
   echo"<th align=center COLSPAN=3>IBYINJIJE AMAFARANGA</th>
  </tr><tr class=warning>";
   echo"<th align=center COLSPAN=3>I: BILAN INITIAL(AYIMUKANWE)</th>
  </tr></thead>";
   $sel1=mysqli_query($con,"select sum(amount) as debit,bankname from bank where date<'$date1' and action='debit' and coopid='$_SESSION[coopid]' group by bankname") or die("FAILED TO SELECT BANK DEBIT".mysqli_error($con));
$totopening=$i=0;
while($med1=mysqli_fetch_array($sel1))
{
$debit=$med1['debit'];
$bn=$med1['bankname'];
$sel2=mysqli_query($con,"select 
sum(amount) as credit from bank where  bankname='$bn' and date<'$date1' and action='credit' and coopid='$_SESSION[coopid]'  group by bankname ")
or die("FAILED TO SELECT CREDIT".mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$credit=$med2['credit'];
$z=$balance=$debit-$credit;

 $totopening+=$z; 

$i++;
$balancef=number_format($balance);
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $bn</td><td align=center>$balancef</td>
</tr>");
}
$sel1=mysqli_query($con,"select sum(amount) as debit from caisse where  date<'$date1' and action='debit' and coopid='$_SESSION[coopid]'  group by action") or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysqli_query($con,"select sum(amount) as credit from caisse where  date<'$date1' and action='credit' and coopid='$_SESSION[coopid]'  group by action") or die(mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$credit=$med2['credit'];
$z=$balance=$debit-$credit;
$balancef=number_format($balance);
$i=$i+1;
print("<tr bgcolor=white><td align=center> $i</td><td align=center> ISANDUKU</td><td align=center>$balancef</td>
</tr>");

$totopening=$totopening+$z;
$totopeningf=number_format($totopening);
echo"<tr bgcolor=white><th COLSPAN=2>S.TOTAL</TH><TH>$totopeningf</th>
</tr>";
  
  //INCOMES TABLE 
  
   echo"<TR class=warning><th align=center COLSPAN=3>II: IBYINJIJE UMUTUNGO</th>
  </tr></thead>";
   $selinc=mysqli_query($con,"select sum(amount) as amount,source from income where date>='$date1' and date<='$date2' and coopid='$_SESSION[coopid]'  group by source") or die("FAILED TO SELECT INCOME".mysqli_error($con));
$totinc=$i=0;
while($medinc=mysqli_fetch_array($selinc))
{
$income=$medinc['amount'];
$source=$medinc['source'];
$incomef=number_format($income);

 $totinc+=$income; 

$i++;
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $source</td><td align=center>$incomef</td>
</tr>");
}
$totincf=number_format($totinc);
echo"<tr bgcolor=white><th COLSPAN=2>S.TOTAL</TH><TH>$totincf</th>
</tr>";
$first=$totinc+$totopening;
$firstf=number_format($first);
echo"<tr bgcolor=white><th COLSPAN=2>IGITERANYO(I)</TH><TH>$firstf</th>
</tr>";

echo"</table>";

//EXPENSES TABLE

   echo"<table border=1 id=employees  class='table table-striped'><thead>
  <tr class=warning>";
   echo"<th align=center COLSPAN=3>III: IBYATUBIJE UMUTUNGO</th>
  </tr></thead>";
   $selexp=mysqli_query($con,"select sum(amount) as amount,account from expenses where duedate>='$date1' and duedate<='$date2' and coopid='$_SESSION[coopid]'  group by account") or die("FAILED TO SELECT EXPENSES".mysqli_error($con));
$totexp=$i=0;
while($medexp=mysqli_fetch_array($selexp))
{
$amexp=$medexp['amount'];
$account=$medexp['account'];
$amexpf=number_format($amexp);

 $totexp+=$amexp; 

$i++;
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $account</td><td align=center>$amexpf</td>
</tr>");
}
$totexpf=number_format($totexp);
echo"<tr bgcolor=white><th COLSPAN=2>IGITERANYO (II)</TH><TH>$totexpf</th>
</tr>";
$second=$first-$totexp;
$secondf=number_format($second);
echo"<tr bgcolor=white><th COLSPAN=2>AYO KOPERATIVE YASIGARANYE (III)=(I-II)</TH><TH>$secondf</th>
</tr>";

echo"</table>";

//BALANCE ON BANKS

   echo"<table border=1 id=employees  class='table table-striped'><thead>";
 
   echo"<tr class=warning>;
 <th align=center COLSPAN=3>IV: AHO UMUTUNGO UHEREREYE</th>
  </tr></thead>";
   $sel3=mysqli_query($con,"select sum(amount) as debit,bankname from bank where  date<='$date2' and action='debit' and coopid='$_SESSION[coopid]'  group by bankname") or die("FAILED TO SELECT BANK DEBIT".mysqli_error($con));
$totbank=$i=0;
while($med3=mysqli_fetch_array($sel3))
{
$debit1=$med3['debit'];
$bn=$med3['bankname'];
$sel4=mysqli_query($con,"select 
sum(amount) as credit from bank where date<='$date2' and action='credit' AND bankname='$bn' and coopid='$_SESSION[coopid]'  group by bankname ")
or die("FAILED TO SELECT CREDIT".mysqli_error($con));
$med4=mysqli_fetch_array($sel4);
$credit1=$med4['credit'];
$z1=$balance1=$debit1-$credit1;

 $totbank+=$z1; 

$i++;
$balance1f=number_format($balance1);
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $bn</td><td align=center>$balance1f</td>
</tr>");
}
$sel1=mysqli_query($con,"select sum(amount) as debit from caisse where  date<='$date2' and action='debit' and coopid='$_SESSION[coopid]'  group by action") or die(mysqli_error($con));
$med1=mysqli_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysqli_query($con,"select sum(amount) as credit from caisse where  date<='$date2' and action='credit' and coopid='$_SESSION[coopid]'  group by action") or die(mysqli_error($con));
$med2=mysqli_fetch_array($sel2);
$credit=$med2['credit'];
$z=$balance=$debit-$credit;
$balancef=number_format($balance);
$i=$i+1;
print("<tr bgcolor=white><td align=center> $i</td><td align=center> ISANDUKU</td><td align=center>$balancef</td>
</tr>");
$totbank=$totbank+$z;
$totbankf=number_format($totbank);
echo"<tr bgcolor=white><th COLSPAN=2>IGITERANYO(IV)</TH><TH>$totbankf</th>
</tr>";
echo"</table>";


//IMYENDA TWARANGIZANYIJE UKWEZI TABLE

   echo"<table border=1 id=employees  class='table table-striped'><thead>
   <tr class=warning>";
   echo"<th align=center COLSPAN=3> IMYENDA YARANGIRANYE N'UKWEZI</th>
  </tr>
  <tr class=warning>";
   echo"<th align=center COLSPAN=3>I: AYO KOPERATIVE IBEREYEMWO ABANDI</th>
  </tr></thead>";
 
   $selideni1=mysqli_query($con,"select sum(value) as amount,reason as ideni from amadeni where date<='$date2' and coopid='$_SESSION[coopid]'
   and type='cooperative'  group by ideni") or die("FAILED TO SELECT AMADENI1".mysqli_error($con));
$totideni2=$i=0;
while($medeideni2=mysqli_fetch_array($selideni1))
{
$amideni2=$medeideni2['amount'];
$source=$medeideni2['ideni'];
$amideni2f=number_format($amideni2);
if($amideni2>0){
 $totideni2+=$amideni2; 

$i++;

print("<tr bgcolor=white><td align=center> $i</td><td align=center> $source</td><td align=center>$amideni2f</td>
</tr>");
}
}
$totideni2f=number_format($totideni2);
echo"<tr bgcolor=white><th COLSPAN=2>IGITERANYO (V)</TH><TH>$totideni2f</th>
</tr>";
$second=$first-$totexp;
$secondf=number_format($second);
//echo"<tr bgcolor=white><th COLSPAN=2>AYO KOPERATIVE YASIGARANYE (III)=(I-II)</TH><TH>$secondf</th>
//</tr>";
//IMYENDA ABANTU BAREYEMWO KOPERATIVE

   echo"
   <tr class=warning>";
   echo"<th align=center COLSPAN=3> II: IMYENDA BABEREYEMWO KOPERATIVE</th>
  </tr>";
 
   $selideni1=mysqli_query($con,"select sum(value) as amount,reason as ideni from amadeni where date<='$date2' and coopid='$_SESSION[coopid]'
   and type='cooperative'  group by ideni") or die("FAILED TO SELECT AMADENI1".mysqli_error($con));
$totideni1=$i=0;
while($medeideni1=mysqli_fetch_array($selideni1))
{
$amideni1=$medeideni1['amount'];
$source=$medeideni1['ideni'];
$amideni1f=number_format($amideni1);
if($amideni1>0){
 $totideni1+=$amideni1; 

$i++;

print("<tr bgcolor=white><td align=center> $i</td><td align=center> $source</td><td align=center>$amideni1f</td>
</tr>");
}
}

$totamadeni=$totideni1;
$totamadenif=number_format($totamadeni);
echo"<tr bgcolor=white><th COLSPAN=2>IGITERANYO (VI)</TH><TH>$totamadenif</th>
</tr>";

echo"</table>";
//STOCK TABLE
   echo"<table border=1 id=employees  class='table table-striped'><thead>
  <tr class=warning>";
   echo"<th align=center COLSPAN=4>III: STOCK N'AGACIRO KAYO</th>
  </tr></thead>";
   $selstock=mysqli_query($con,"select sum(quantityadded) as qtya,sum(quantityremoved) as qtyr,item from stock where date<='$date2' and coopid='$_SESSION[coopid]'  group by item") or die("FAILED TO SELECT STOCK".mysqli_error($con));
$totstock=$totvalue=$i=0;
while($row=mysqli_fetch_array($selstock))
{
$qtya=$row['qtya'];
$qtyr=$row['qtyr'];
$item=$row['item'];
$year=date("Y");
$selp=mysqli_query($con,"select sprice from levels where item='$item' and year='$year' and sprice>0  and coopid='$_SESSION[coopid]' ")
or die("FAILED TO SELECT PRICE".mysqli_error($con));
$row2=mysqli_fetch_array($selp);
$sprice=$row2['sprice'];
$x=$qtya-$qtyr;
$totstock+=$x;
$value=$x*$sprice;
$totvalue+=$value;
$xf=number_format($x);
$valuef=number_format($value);
$i++;
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $item</td><td align=center>$xf</td><td align=center>$valuef</td>
</tr>");
}
$totvaluef=number_format($totvalue);
echo"<tr bgcolor=white><th COLSPAN=2>AGACIRO KOSE (II)</TH><TH>$totvaluef</th>
</tr>";
echo"</table>";

?>
</body>
</html>
