<?php include("session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COOPA SYSTEM</title>
<style type="text/css">
body
{
   
   margin: auto;
   margin-top: 0px;
   margin-bottom: 20px;    
   background-image: url("images/fond.png");
   background-color:#E4E2E0 ;

}

#window{
background-color:#FFFFFF;
	height:auto;
	width:70%;
font-family:Geneva, Arial, Helvetica, sans-serif;
   color:#4D4D4D;
	margin-top:0px;
	margin-left:21%;
	size:100px;
	-moz-border-radius: 0.5em 0.5em 0.5em 0.5em;
      border-radius: 0.5em 0.5em 0.5em 0.5em;
	  box-shadow:
  rgba(0,0,0,0.3)
  0px 1px 1px 1px;
  
	}
	
	#catalog1{
	background-color:#000000;
	height:35px;
	margin-left:3px;
	width:99%;
	color:#FFFFFF;
	margin-top:10px;
	-moz-border-radius: 1em 1em 0em 0em;
      border-radius: 1em 1em 0em 0em;
	}

    </style>
    <script>
function numbersonly(e, decimal) {
var key;
var keychar;

if (window.event) {
   key = window.event.keyCode;
}
else if (e) {
   key = e.which;
}
else {
   return true;
}
keychar = String.fromCharCode(key);

if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
   return true;
}
else if ((("0123456789").indexOf(keychar) > -1)) {
   return true;
}
else if (decimal && (keychar == ".")) { 
  return true;
}
else
   return false;
}
</script> 

<script language="javascript">

        //Start JavaScript Function
 <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='banktransactions.php?cat=' + val ;
}

</script>

<style type="text/css">

.ds_box {
        background-color: #FFF;
        border: 1px solid #000;
        position: absolute;
        z-index: 32767;
}

.ds_tbl {
        background-color: #FFF;
}

.ds_head {
        background-color: #333;
        color: #FFF;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        font-weight: bold;
        text-align: center;
        letter-spacing: 2px;
}

.ds_subhead {
        background-color: #CCC;
        color: #000;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        width: 32px;
}

.ds_cell {
        background-color: #EEE;
        color: #000;
        font-size: 13px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        padding: 5px;
        cursor: pointer;
}

.ds_cell:hover {
        background-color: #F3F3F3;
} /* This hover code won't work for IE */
body {
	background-color:;
}
</style>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<td> <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
                <tr> 
                  <td id="ds_calclass"> </td>
                </tr>
              </table>
              <script>
var ds_i_date = new Date();
ds_c_month = ds_i_date.getMonth() + 1;
ds_c_year = ds_i_date.getFullYear();
function ds_getel(id) {
        return document.getElementById(id);
}
function ds_getleft(el) {
        var tmp = el.offsetLeft;
        el = el.offsetParent
        while(el) {
                tmp += el.offsetLeft;
                el = el.offsetParent;
        }
        return tmp;
}
function ds_gettop(el) {
        var tmp = el.offsetTop;
        el = el.offsetParent
        while(el) {
                tmp += el.offsetTop;
                el = el.offsetParent;
        }
        return tmp;
}

// Output Element
var ds_oe = ds_getel('ds_calclass');
// Container
var ds_ce = ds_getel('ds_conclass');

// Output Buffering
var ds_ob = ''; 
function ds_ob_clean() {
        ds_ob = '';
}
function ds_ob_flush() {
        ds_oe.innerHTML = ds_ob;
        ds_ob_clean();
}
function ds_echo(t) {
        ds_ob += t;
}

var ds_element; // Text Element...

var ds_monthnames = [
'January', 'February', 'March', 'April', 'May', 'June',
'July', 'August', 'September', 'October', 'November', 'December'
]; // You can translate it for your language.

var ds_daynames = [
'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
]; // You can translate it for your language.

// Calendar template
function ds_template_main_above(t) {
        return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
             + '<tr>'
                 + '<td class="ds_head" style="cursor: pointer" onclick="ds_py();">&lt;&lt;</td>'
                 + '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();">&lt;</td>'
                 + '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Close]</td>'
                 + '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">&gt;</td>'
                 + '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">&gt;&gt;</td>'
                 + '</tr>'
             + '<tr>'
                 + '<td colspan="7" class="ds_head">' + t + '</td>'
                 + '</tr>'
                 + '<tr>';
}

function ds_template_day_row(t) {
        return '<td class="ds_subhead">' + t + '</td>';
        // Define width in CSS, XHTML 1.0 Strict doesn't have width property for it.
}

function ds_template_new_week() {
        return '</tr><tr>';
}

function ds_template_blank_cell(colspan) {
        return '<td colspan="' + colspan + '"></td>'
}

function ds_template_day(d, m, y) {
        return '<td class="ds_cell" onclick="ds_onclick(' + d + ',' + m + ',' + y + ')">' + d + '</td>';
        // Define width the day row.
}

function ds_template_main_below() {
        return '</tr>'
             + '</table>';
}

// This one draws calendar...
function ds_draw_calendar(m, y) {
        // First clean the output buffer.
        ds_ob_clean();
        // Here we go, do the header
        ds_echo (ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
        for (i = 0; i < 7; i ++) {
                ds_echo (ds_template_day_row(ds_daynames[i]));
        }
        // Make a date object.
        var ds_dc_date = new Date();
        ds_dc_date.setMonth(m - 1);
        ds_dc_date.setFullYear(y);
        ds_dc_date.setDate(1);
        if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12) {
                days = 31;
        } else if (m == 4 || m == 6 || m == 9 || m == 11) {
                days = 30;
        } else {
                days = (y % 4 == 0) ? 29 : 28;
        }
        var first_day = ds_dc_date.getDay();
        var first_loop = 1;
        // Start the first week
        ds_echo (ds_template_new_week());
        // If sunday is not the first day of the month, make a blank cell...
        if (first_day != 0) {
                ds_echo (ds_template_blank_cell(first_day));
        }
        var j = first_day;
        for (i = 0; i < days; i ++) {
                // Today is sunday, make a new week.
                // If this sunday is the first day of the month,
                // we've made a new row for you already.
                if (j == 0 && !first_loop) {
                        // New week!!
                        ds_echo (ds_template_new_week());
                }
                // Make a row of that day!
                ds_echo (ds_template_day(i + 1, m, y));
                // This is not first loop anymore...
                first_loop = 0;
                // What is the next day?
                j ++;
                j %= 7;
        }



        // Do the footer
        ds_echo (ds_template_main_below());
        // And let's display..
        ds_ob_flush();
        // Scroll it into view.
        ds_ce.scrollIntoView();
}

// A function to show the calendar.
// When user click on the date, it will set the content of t.
function ds_sh(t) {
        // Set the element to set...
        ds_element = t;
        // Make a new date, and set the current month and year.
        var ds_sh_date = new Date();
        ds_c_month = ds_sh_date.getMonth() + 1;
        ds_c_year = ds_sh_date.getFullYear();
        ds_draw_calendar(ds_c_month, ds_c_year);
        ds_ce.style.display = '';
        the_left = ds_getleft(t);
        the_top = ds_gettop(t) + t.offsetHeight;
        ds_ce.style.left = the_left +'px';
        ds_ce.style.top = the_top + 'px';
        ds_ce.scrollIntoView();
}

function ds_hi() {
        ds_ce.style.display = 'none';
}

function ds_nm() {
        ds_c_month ++;
        if (ds_c_month > 12) {
                ds_c_month = 1; 
                ds_c_year++;
        }
        ds_draw_calendar(ds_c_month, ds_c_year);
		}
function ds_pm() {
        ds_c_month = ds_c_month - 1; 
        if (ds_c_month < 1) {
                ds_c_month = 12; 
                ds_c_year = ds_c_year - 1; 
        }
        ds_draw_calendar(ds_c_month, ds_c_year);
}

function ds_ny() {
        ds_c_year++;
        ds_draw_calendar(ds_c_month, ds_c_year);
}

function ds_py() {
        ds_c_year = ds_c_year - 1; // Can't use dash-dash here, it will make the page invalid.
        ds_draw_calendar(ds_c_month, ds_c_year);
}

function ds_format_date(d, m, y) {
        m2 = '00' + m;
        m2 = m2.substr(m2.length - 2);
        // 2 digits day.
        d2 = '00' + d;
        d2 = d2.substr(d2.length - 2);
        // YYYY-MM-DD
        return y + '-' + m2 + '-' + d2;
}

function ds_onclick(d, m, y) {
        ds_hi();
        if (typeof(ds_element.value) != 'undefined') {
                ds_element.value = ds_format_date(d, m, y);
        } else if (typeof(ds_element.innerHTML) != 'undefined') {
                ds_element.innerHTML = ds_format_date(d, m, y);
        } else {
                alert (ds_format_date(d, m, y));
        }
}
// ]]> -->
</script>


     <script>
function numbersonly(e, decimal) {
var key;
var keychar;

if (window.event) {
   key = window.event.keyCode;
}
else if (e) {
   key = e.which;
}
else {
   return true;
}
keychar = String.fromCharCode(key);

if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
   return true;
}
else if ((("0123456789").indexOf(keychar) > -1)) {
   return true;
}
else if (decimal && (keychar == ".")) { 
  return true;
}
else
   return false;
}
</script> 
 <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='banktransactions.php?cat=' + val ;
}

</script>

</head>

<body>
<br />
<div id="window">

<table width="100%" align="center"><tr>
    <td><font color="#FFFFFF">...</font><a href="updatebank.php"><img src="images/home.png" title="Home"/></a> 
    </td>
<td><a href="update_bank.php" title="Update Bank"><img src="images/update.jpg"/></a></td>			
        <td><a href="logout.php" title="logg out of the system"><img src="images/logout.png"/></a></td></tr></table>
<hr/><br />
 <form action="savebank.php" method="post" name="form1">
 
<table width="50%" align="center">
  <tr> 
    <td align="left"><font size="+1">Bank&nbsp;Name</span> </td>
              
                <td align="left">
			<?php
include("dbcon.php");

/*
If register_global is off in your server then after reloading of the page to get the value of cat from query string we have to take special care.
To read more on register_global visit.
  http://www.plus2net.com/php_tutorial/register-globals.php
*/
@$cat=$_GET['cat']; // Use this line or below line if register_global is off
if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}


//@$cat=$HTTP_GET_VARS['cat']; // Use this line or above line if register_global is off

///////// Getting the data from Mysql table for first list box//////////
$quer2=mysql_query("SELECT DISTINCT Level,Level_id FROM level order by Level_id"); 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory/////
if(isset($cat) and strlen($cat) > 0){
$quer=mysql_query("SELECT DISTINCT Combination FROM combination where Level_id=$cat order by Combination"); 
}else{$quer=mysql_query("SELECT DISTINCT Combination FROM combination order by Combination"); } 
////////// end of query for second subcategory drop down list box ///////////////////////////

/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<select name='cat' onchange=\"reload(this.form)\" ...Select Bank...><option></option>";
while($noticia2 = mysql_fetch_array($quer2)) { 
if($noticia2['Level_id']==@$cat){echo "<option selected value='$noticia2[Level_id]'>$noticia2[Level]</option>"."<BR>";}
else{echo  "<option value='$noticia2[Level_id]'>$noticia2[Level]</option>";}
}
echo "</select>";?></td></tr>
		  <tr>
      <td><span class="style3"><font size="+1">Account</span> </td><td><?php
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat' ...Select Account...>";
while($noticia = mysql_fetch_array($quer)) { 
echo  "<option value='$noticia[Combination]'>$noticia[Combination]</option>";
}
echo "</select>";?> </td>
  <tr> 
    <td>Particular:</label></td>
    <td><input name="names" type="text"/></td>
      
  </tr>
  <tr> 
    <td>Amount:</label></td>
    <td><input name="particular" type="text" id="particular" onKeyPress="return numbersonly(event,false)"/></td>
   
  </tr>
  <tr> 
    <td><label id="bor">Reason:</label></td>
    <td><input name="bordereau" type="text" id="bordereau" /></td>
    
  </tr>
  <tr> 
    <td><label id="ac">Action</label></td>
    <td align="center"> 
     
	<select name="action" required onchange="if (this.value=='cheque')
			 {this.form['account'].style.visibility='visible';this.form['c'].style.visibility='visible';this.form['chequeno'].style.visibility='visible';
			 }
			 else
			 {this.form['account'].style.visibility='hidden';this.form['c'].style.visibility='hidden';this.form['chequeno'].style.visibility='hidden';}
			 ">
  <option></option>
 <option value="debit">DEBIT</option>
 <option value="credit">CREDIT</option>
 <option value="cheque">Cheque</option>
 </select>

   						<select name="account" class="form-control input-sm" required  style="visibility:hidden">
						<option>Choose Account</option>
                                  <?php 
								  $year=date("Y");
								include('dbcon.php');
								  
								  $user_query=mysql_query("select * from account where year='$year' ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$account=$row['codename']; 
									echo"<option>$account</option>";
									}
									?>

  </select>
                      
                 
                       
	   </td>
  </tr>
    <tr> 
    <td><label id="bor"><input  type="text" name="c" size=5 value="chequeNo" style="visibility:hidden;"/></label></td>
    <td align="center"><input name="chequeno" type="text" style="visibility:hidden;"/></td><td>
  </tr>
  <tr>
  <td><div class="form-group"><label>Date</label><div class="controls">
                       <td> <input name="date" type="date" class="form-control input-sm" id="date" style="width: 100px; margin-bottom: 0px; text-align: center"  title=" date " 
						  />
</td></tr>

  <tr> 
    <td colspan="2"><hr /></td>
  </tr>
  <tr> 
    <td align="center"><input type="submit" value="Save" style="font-size:18px" onClick="return (verify());"/></td>
    <td align="center"><input type="reset"  value="Reset" style="font-size:18px" /></td>
  </tr>
</table>
    <br /><br /><hr />
       <br />
</div>
</body>
</html>
