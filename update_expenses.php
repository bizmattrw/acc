<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >

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

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title><link rel="shortcut icon" href="/resources/favicon.ico"><link rel="apple-touch-icon" href="/resources/icon-iphone.png"><link rel="apple-touch-icon" sizes="72x72" href="/resources/icon-ipad.png"><link rel="apple-touch-icon" sizes="114x114" href="/resources/icon-iphone4.png"><link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.css?18.1.99.0" /><link rel="stylesheet" type="text/css" href="resources/theme.css?18.1.99.0" /><style>ul, ol { padding-left: 10px }.float-left { float: left !important; }.float-right { float: right !important; }.text-align-left { text-align: left !important; }.text-align-right { text-align: right !important; }div.content { background-color: #fff; padding: 30px; box-shadow: 0px 0px 5px #ccc; border: 1px solid #ccc; width: auto }a.file-close:hover { color: #999; }#sidenav div { padding: 0px; background-color: #fafafa; box-shadow: inset 1px 1px 0px #fff; }#sidenav img { opacity: 0.4; vertical-align: top; width: 16px; height: 16px }#sidenav .tab-active { background-color: #fff; border-right: none }#sidenav a.tab-link, #sidenav span.tab-link { line-height: 16px; display: block; position: relative; white-space: nowrap; padding: 12px; font-size: 11px; font-weight: bold }#sidenav table { border: 1px solid #ccc; border-top: none; font-family: 'Lucida Grande',Verdana,sans-serif; border-spacing: 0px; width: 100% }#sidenav .tab-active table { border-right: 1px solid #fff }#sidenav a:hover { text-decoration: none }#sidenav a:hover img { opacity: 0.6 }#sidenav .tab-active img { opacity: 0.6 }#sidenav span.count { background-color: #FFFFFF; border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; color: #666666; font-size: 10px; font-weight: bold; padding: 3px 6px; }#sidenav span.count-zero { border: 1px solid #EEEEEE; color: #DDDDDD }#sidenav span.tab-label { margin-left: 10px; }#sidenav a:hover span.tooltiptext { visibility: visible }.tooltiptext { visibility: hidden; background-color: #000; color: #fff; text-align: center; padding: 5px 10px; border-radius: 6px; position: absolute; z-index: 99999; top: 7px; left: 42px; }.tooltiptext::after { content: ' '; position: absolute; top: 50%; right: 100%; margin-top: -5px; border-width: 5px; border-style: solid; border-color: transparent black transparent transparent; }@media print { body { -webkit-print-color-adjust: exact !important; } }</style><link rel="stylesheet" type="text/css" href="resources/custom.css?18.1.99.0" /></head><body style="background: #eee url('resources/noise.png')"><noscript><div class="print-display-none" style="background-color: yellow; padding: 10px; text-align: center; font-weight: bold; border-bottom: 1px solid #ccc; font-size: 16px">Javascript Error</div></noscript><style>#navbar { z-index: 9; position: fixed; right: 0; left: 0; top: 0; margin: 0px; }#navbar { font-size: 12px; background-color: #FAFAFA; background-image: -moz-linear-gradient(top, #ffffff, #f2f2f2); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#f2f2f2)); background-image: -webkit-linear-gradient(top, #ffffff, #f2f2f2); background-image: -o-linear-gradient(top, #ffffff, #f2f2f2); background-image: linear-gradient(to bottom, #ffffff, #f2f2f2); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0); *zoom: 1; background-repeat: repeat-x; border: 1px solid #D4D4D4; font-weight: bold; border-width: 0 0 1px 0; box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1); -moz-box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1); }#navbar table { width: 100%; border-collapse: collapse; }#navbar td { width: 1px; white-space: nowrap; }#navbar td.active { color: #555555; background-color: #e5e5e5; -webkit-box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.125); -moz-box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.125); box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.125); }#navbar a { color: #777777; display: block; padding: 15px }#navbar a:hover { color: #333; text-decoration: none }#navbar a img { margin-right: 6px; margin-top: -4px; opacity: 0.4;}#navbar a:hover img { opacity: 0.8 }</style><div id="navbar" class="print-display-none">
<?php include('header.php'); ?>
<div style="padding-right: 15px"><table><tr><td><a href="settings.php"><img src="resources/webalys/_16px/triangle-big-3-01.png" style="margin-top: -2px" />Back</a></td><td class="active"><a href="settings.php"><img src="resources/webalys/_16px/places-11.png" style="margin-top: -2px" />Start</a></td><td><a href="users"><img src="resources/webalys/_16px/users-23.png" style="margin-top: -2px" />Users</a></td><td><a href="preferences"><img src="resources/webalys/_16px/setting-2.png" style="margin-top: -2px" />Preferences</a></td><td><a href="support"><img src="resources/webalys/_16px/objects-5.png" style="margin-top: -2px" />Support</a></td>
<td style="width: auto"></td></tr></table></div></div><div class="print-reset" style="padding: 35px; padding-top: 45px">
<table class="print-reset" style="width: 100%; border-collapse: separate"><tr>
<td class="print-reset" style="border: 1px solid #ccc; padding-left: 20px; padding-right: 20px; background-color: #f3f3f3; box-shadow: inset 1px 1px 0px #fff;" colspan="2">
<div class="print-display-none" style="line-height: 54px"><table style="width: 100%"><tr><td style="vertical-align: middle; width: 1px; padding-right: 10px">
<a href="businesses" class="text-decoration-none file-close" style="color: #ccc; font-size: 24px; display: block; font-weight: bold">&times;</a></td>
<td style="vertical-align: middle"><span style="text-shadow: 1px 1px 0 #FFFFFF; color: #555555; font-size: 18px; font-weight: bold">COOPA SYSTEM</span>
</td><td style="width: 1px; white-space: nowrap"></td></tr></table></div></td></tr><tr><td class="print-reset" style="width: 1px; vertical-align: top; padding: 0; background-image: url('resources/graypixel.png'); background-repeat:repeat-y; background-position: right top"><div id="sidenav" class="print-display-none"><div><div><table><tr>
                  <td><a href="budgetline.php" class="tab-link"><img src="resources/webalys/_16px/business-76.png" />
				  <span class="tab-label hide-on-collapse">Buget</span><span class="show-on-collapse hidden">
				  <span class="tooltiptext">Budget</span></span></a></td>
                </tr></table></div><div><table><tr>
                  <td><a href="bank.php" class="tab-link"><img src="resources/webalys/_16px/design-6.png" />
				  <span class="tab-label hide-on-collapse">Bank
                    </span><span class="show-on-collapse hidden"><span class="tooltiptext">Bank</span></span></a></td>
                  <td class="count-column hide-on-collapse" style="text-align: right; padding-right: 10px; width: 1px"><span class="count count-zero">0</span></td></tr>
				  </table></div>
				  
				  <div><table><tr>
				 
                  <td><a href="caisse.php" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Caisse</span><span class="show-on-collapse hidden"><span class="tooltiptext">Caisse</span></span></a></td>
                </tr></table></div>
				  
				  <div><table><tr>
                  <td><a href="income.php" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Income</span><span class="show-on-collapse hidden"><span class="tooltiptext">Income</span></span></a></td>
                </tr></table></div>
				  
				  <div><table><tr>
                  <td><a href="expenses.php" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Expenses</span><span class="show-on-collapse hidden"><span class="tooltiptext">Expenses</span></span></a></td>
                </tr></table></div>
				  
				  
				  <div><table><tr>
                  <td><a href="assets.php" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Assets</span><span class="show-on-collapse hidden"><span class="tooltiptext">Assets</span></span></a></td>
                </tr></table></div>
				  <div><table><tr>
                  <td><a href="addstock.php" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Stock</span><span class="show-on-collapse hidden"><span class="tooltiptext">Stock</span></span></a></td>
                </tr></table></div>
				  <div><table><tr>
                  <td><a href="amadeni.php" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Amadeni</span><span class="show-on-collapse hidden"><span class="tooltiptext">Amadeni</span></span></a></td>
                </tr></table></div>
				<div><table><tr>
                  <td><a href="reports?FileID=8c20ac30-457f-432c-99a3-3a8e677b2552" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Retained</span><span class="show-on-collapse hidden"><span class="tooltiptext">Retained</span></span></a></td>
                </tr></table></div>
				  <div><table><tr>
                  <td><a href="reports?FileID=8c20ac30-457f-432c-99a3-3a8e677b2552" class="tab-link"><img src="resources/webalys/_16px/text-9.png" />
				  <span class="tab-label hide-on-collapse">Reports</span><span class="show-on-collapse hidden"><span class="tooltiptext">Reports</span></span></a></td>
                </tr></table></div>
              
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">
				


<div class="panel panel-default"><div class="panel-heading"><span class="header">
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 2px 2px 0 #FFFFFF;">Recording Expenses</div>

<FORM action="updateexpenses.php" method="GET">
<div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 30px">
<table>
<tr>

<td style="padding: 0px">
<div class="form-group">
                        <label>Choose Year</label>
						<select name="year" class="form-control input-sm" id="value" style="width: 80px; text-align: center">
						<option></option>
                                  <?php 
								include('dbcon.php');
								  
								  $user_query=mysql_query("select * from account group by year")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$year=$row['year']; 
									echo"<option>$year";
									}
									?>
									<input type="submit" name="submit" value="Proceed >>"  class="form-control input-sm"class="form-control input-sm" style="width: 80px; height: 200px text-align: center">
						
</div></td>


                      </div></div></td>

</table><div></div></div>

<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">
<img src="resources/ajax-loader.gif" id="ajaxIndicator" style="display: none; margin-right: 10px" /><div class="btn-group">

</FORM>
           </div>
        </div></div></div></TABLE></TABLE></TABLE></TABLE>

<?php include_once "footer.php" ?>

