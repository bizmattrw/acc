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

<body bgcolor="">

<?PHP
$date1=$_GET['date1'];
$date2=$_GET['date2'];
echo"<center><H2><strong><u>
</A>RAPORO Y'UKWEZI KUVA $date1 KUGEZA $date2 </H2></strong></u>
</CENTER>";
include("dbcon.php");
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=OPERATIONALREPORT.xls");

//OPENING BALANCE ON BANKS

   echo"<table border=1 id=employees  class='table table-striped'><thead>
   <tr class=warning>";
   echo"<th align=center COLSPAN=3>IBYINJIJE AMAFARANGA</th>
  </tr><tr class=warning>";
   echo"<th align=center COLSPAN=3>I: BILAN INITIAL(AYIMUKANWE)</th>
  </tr></thead>";
   $sel1=mysql_query("select sum(amount) as debit,bankname from bank where date<'$date1' and action='debit' group by bankname") or die("FAILED TO SELECT BANK DEBIT".mysql_error());
$totopening=$i=0;
while($med1=mysql_fetch_array($sel1))
{
$debit=$med1['debit'];
$bn=$med1['bankname'];
$sel2=mysql_query("select 
sum(amount) as credit from bank where  bankname='$bn' and date<'$date1' and action='credit' group by bankname ")
or die("FAILED TO SELECT CREDIT".mysql_error());
$med2=mysql_fetch_array($sel2);
$credit=$med2['credit'];
$z=$balance=$debit-$credit;

 $totopening+=$z; 

$i++;
$balancef=number_format($balance);
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $bn</td><td align=center>$balancef</td>
</tr>");
}
$sel1=mysql_query("select sum(amount) as debit from caisse where  date<'$date1' and action='debit' group by action") or die(mysql_error());
$med1=mysql_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysql_query("select sum(amount) as credit from caisse where  date<'$date1' and action='credit' group by action") or die(mysql_error());
$med2=mysql_fetch_array($sel2);
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
   $selinc=mysql_query("select sum(amount) as amount,source from income where date>='$date1' and date<='$date2' group by source") or die("FAILED TO SELECT INCOME".mysql_error());
$totinc=$i=0;
while($medinc=mysql_fetch_array($selinc))
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
   $selexp=mysql_query("select sum(amount) as amount,account from expenses where duedate>='$date1' and duedate<='$date2' group by account") or die("FAILED TO SELECT EXPENSES".mysql_error());
$totexp=$i=0;
while($medexp=mysql_fetch_array($selexp))
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
echo"<tr bgcolor=white><th COLSPAN=2>AYO UNION YASIGARANYE (III)=(I-II)</TH><TH>$secondf</th>
</tr>";

echo"</table>";

//BALANCE ON BANKS

   echo"<table border=1 id=employees  class='table table-striped'><thead>";
 
   echo"<tr class=warning>;
 <th align=center COLSPAN=3>IV: AHO UMUTUNGO UHEREREYE</th>
  </tr></thead>";
   $sel3=mysql_query("select sum(amount) as debit,bankname from bank where  date<='$date2' and action='debit' group by bankname") or die("FAILED TO SELECT BANK DEBIT".mysql_error());
$totbank=$i=0;
while($med3=mysql_fetch_array($sel3))
{
$debit1=$med3['debit'];
$bn=$med3['bankname'];
$sel4=mysql_query("select 
sum(amount) as credit from bank where date<='$date2' and action='credit' AND bankname='$bn' group by bankname ")
or die("FAILED TO SELECT CREDIT".mysql_error());
$med4=mysql_fetch_array($sel4);
$credit1=$med4['credit'];
$z1=$balance1=$debit1-$credit1;

 $totbank+=$z1; 

$i++;
$balance1f=number_format($balance1);
print("<tr bgcolor=white><td align=center> $i</td><td align=center> $bn</td><td align=center>$balance1f</td>
</tr>");
}
$sel1=mysql_query("select sum(amount) as debit from caisse where  date<='$date2' and action='debit' group by action") or die(mysql_error());
$med1=mysql_fetch_array($sel1);
$debit=$med1['debit'];
$sel2=mysql_query("select sum(amount) as credit from caisse where  date<='$date2' and action='credit' group by action") or die(mysql_error());
$med2=mysql_fetch_array($sel2);
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
   echo"<th align=center COLSPAN=3>I: AYO UNION IBEREYEMWO ABANDI</th>
  </tr></thead>";
   $sell=mysql_query("select sum(amount) as amount,source from liabilities where date<='$date2'  and amount>0 and source!='Add profit' and source!='LONGTERM LOAN' and source!='Less loss'
 and source!='Capital' group by source") or die("FAILED TO SELECT LIABILITIES".mysql_error());
$totl=$i=0;
while($medel=mysql_fetch_array($sell))
{
$aml=$medel['amount'];
$source=$medel['source'];
$amlf=number_format($aml);
if($aml>0){
 $totl+=$aml; 

$i++;

print("<tr bgcolor=white><td align=center> $i</td><td align=center> $source</td><td align=center>$amlf</td>
</tr>");
}
}
$totlf=number_format($totl);
echo"<tr bgcolor=white><th COLSPAN=2>IGITERANYO (V)</TH><TH>$totlf</th>
</tr>";
$second=$first-$totexp;
$secondf=number_format($second);
//echo"<tr bgcolor=white><th COLSPAN=2>AYO KOPERATIVE YASIGARANYE (III)=(I-II)</TH><TH>$secondf</th>
//</tr>";



//IMYENDA ABANTU BAREYEMWO KOPERATIVE

   echo"
   <tr class=warning>";
   echo"<th align=center COLSPAN=3> II: IMYENDA BABEREYEMWO UNION</th>
  </tr>";
 
   $selideni1=mysql_query("select sum(value) as amount,ideni from amadeni where date<='$date2' group by ideni") or die("FAILED TO SELECT AMADENI1".mysql_error());
$totideni1=$i=0;
while($medeideni1=mysql_fetch_array($selideni1))
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
include("dbcon.php");
//STOCK TABLE
   echo"<table border=1 id=employees  class='table table-striped'><thead>
  <tr class=warning>";
   echo"<th align=center COLSPAN=4>III: STOCK N'AGACIRO KAYO</th>
  </tr></thead>";
   $selstock=mysql_query("select sum(quantityadded) as qtya,sum(quantityremoved) as qtyr,item from stock where date<='$date2' group by item") or die("FAILED TO SELECT STOCK".mysql_error());
$totstock=$totvalue=$i=0;
while($row=mysql_fetch_array($selstock))
{
$qtya=$row['qtya'];
$qtyr=$row['qtyr'];
$item=$row['item'];
$year=date("Y");
$selp=mysql_query("select sprice from levels where item='$item' and year='$year' and sprice>0 ")
or die("FAILED TO SELECT PRICE".mysql_error());
$row2=mysql_fetch_array($selp);
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
