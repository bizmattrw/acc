<?php include "session.php"; ?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <script>
        function getstaff_func(val) {
            $.ajax({
                type: "POST",
                url: "getstaff_func.php",
                data: 'catidstaff=' + val,
                success: function(data) {
                    $("#staff_func").html(data);
                }
            });
        }

        function gettransbank_func(val) {
            $.ajax({
                type: "POST",
                url: "gettransbank_func.php",
                data: 'bankid=' + val,
                success: function(data) {
                    $("#trans_func").html(data);
                }
            });
        }

        function fillBankAccountAmount() {
            $.ajax({
                url: "ajaxget.php",
                method: "POST",
                data: {
                    bank: document.getElementById("cat").value,
                    account: document.getElementById("staff_func").value,
                    type: "bank-account-amount"
                },
                success: function(data) {
                    var bankAccountAmount = document.getElementById("bank-acc-amount");
                    bankAccountAmount.value = data;
                }
            })
        }

        function checkAgainstBank(el) {
            var bankAccountAmount = Number(document.getElementById("bank-acc-amount").value);
            var amount = Number(el.value);
            var action = document.getElementById("action").value;
            var budgetLine = document.getElementById("account").value;
            var budgetLineAmount = Number(document.getElementById("budget-line-amount").value);
            var bankName = document.getElementById("cat").value;

            if (action == "") {
                el.value = "";
                alert("Please choose action first");
            } else {
                if (action != "debit") {
                    if (bankName == "") {
                        el.value = "";
                        alert("Please choose a bank first");
                        return;
                    }
                    if (bankAccountAmount == "") {
                        el.value = "";
                        alert("Please choose a bank account first");
                        return;
                    }
                    if (action == "cheque") {
                        if (budgetLine == "" || budgetLine == "Choose Budgetline") {
                            el.value = "";
                            alert("Please choose a budget line first");
                            return;
                        }
                        if (amount > budgetLineAmount) {
                            el.value = el.value.slice(0, el.value.length - 1);
                            alert("The amount you entered exceeds the remaining budget line amount.")
                        }
                    }
                    if (amount > bankAccountAmount) {
                        el.value = el.value.slice(0, el.value.length - 1);
                        alert("The amount you entered exceeds the remaining bank account amount.")
                    }
                }
            }
        }

        function loadBugdetLineAmount(el) {
            var amountInput = document.getElementById("budget-line-amount");
            console.log({
                amountInput
            });

            $.ajax({
                type: "POST",
                url: "ajaxget.php",
                data: 'lineid=' + el.value,
                success: function(data) {
                    amountInput.value = data;
                    console.log({
                        data
                    });
                }
            });
        }
    </script>


    <style type="text/css">
        body {

            margin: auto;
            margin-top: 0px;
            margin-bottom: 20px;
            background-image: url("images/fond.png");
            background-color: #E4E2E0;

        }

        #window {
            background-color: #FFFFFF;
            height: auto;
            width: 70%;
            font-family: Geneva, Arial, Helvetica, sans-serif;
            color: #4D4D4D;
            margin-top: 0px;
            margin-left: 21%;
            size: 100px;
            -moz-border-radius: 0.5em 0.5em 0.5em 0.5em;
            border-radius: 0.5em 0.5em 0.5em 0.5em;
            box-shadow:
                rgba(0, 0, 0, 0.3) 0px 1px 1px 1px;

        }

        #catalog1 {
            background-color: #000000;
            height: 35px;
            margin-left: 3px;
            width: 99%;
            color: #FFFFFF;
            margin-top: 10px;
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
            } else if (e) {
                key = e.which;
            } else {
                return true;
            }
            keychar = String.fromCharCode(key);

            if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
                return true;
            } else if ((("0123456789").indexOf(keychar) > -1)) {
                return true;
            } else if (decimal && (keychar == ".")) {
                return true;
            } else
                return false;
        }
    </script>

    <script language="javascript">
        //Start JavaScript Function
        <
        SCRIPT language = JavaScript >
            function reload(form) {
                var val = form.cat.options[form.cat.options.selectedIndex].value;
                self.location = 'bank.php?cat=' + val;
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
        }

        /* This hover code won't work for IE */
        body {
            background-color: ;
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
    <td>
        <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
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
                while (el) {
                    tmp += el.offsetLeft;
                    el = el.offsetParent;
                }
                return tmp;
            }

            function ds_gettop(el) {
                var tmp = el.offsetTop;
                el = el.offsetParent
                while (el) {
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
                return '<table cellpadding="3" cellspacing="1" class="ds_tbl">' +
                    '<tr>' +
                    '<td class="ds_head" style="cursor: pointer" onclick="ds_py();">&lt;&lt;</td>' +
                    '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();">&lt;</td>' +
                    '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Close]</td>' +
                    '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">&gt;</td>' +
                    '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">&gt;&gt;</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td colspan="7" class="ds_head">' + t + '</td>' +
                    '</tr>' +
                    '<tr>';
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
                return '</tr>' +
                    '</table>';
            }

            // This one draws calendar...
            function ds_draw_calendar(m, y) {
                // First clean the output buffer.
                ds_ob_clean();
                // Here we go, do the header
                ds_echo(ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
                for (i = 0; i < 7; i++) {
                    ds_echo(ds_template_day_row(ds_daynames[i]));
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
                ds_echo(ds_template_new_week());
                // If sunday is not the first day of the month, make a blank cell...
                if (first_day != 0) {
                    ds_echo(ds_template_blank_cell(first_day));
                }
                var j = first_day;
                for (i = 0; i < days; i++) {
                    // Today is sunday, make a new week.
                    // If this sunday is the first day of the month,
                    // we've made a new row for you already.
                    if (j == 0 && !first_loop) {
                        // New week!!
                        ds_echo(ds_template_new_week());
                    }
                    // Make a row of that day!
                    ds_echo(ds_template_day(i + 1, m, y));
                    // This is not first loop anymore...
                    first_loop = 0;
                    // What is the next day?
                    j++;
                    j %= 7;
                }



                // Do the footer
                ds_echo(ds_template_main_below());
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
                ds_ce.style.left = the_left + 'px';
                ds_ce.style.top = the_top + 'px';
                ds_ce.scrollIntoView();
            }

            function ds_hi() {
                ds_ce.style.display = 'none';
            }

            function ds_nm() {
                ds_c_month++;
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
                    alert(ds_format_date(d, m, y));
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
                } else if (e) {
                    key = e.which;
                } else {
                    return true;
                }
                keychar = String.fromCharCode(key);

                if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
                    return true;
                } else if ((("0123456789").indexOf(keychar) > -1)) {
                    return true;
                } else if (decimal && (keychar == ".")) {
                    return true;
                } else
                    return false;
            }
        </script>
        <SCRIPT language=JavaScript>
            function reload(form) {
                var val = form.cat.options[form.cat.options.selectedIndex].value;
                self.location = 'bank.php?cat=' + val;
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#country').keyup(function() {
                    var query = $(this).val();
                    if (query != '') {
                        $.ajax({
                            url: "search1.php",
                            method: "POST",
                            data: {
                                query: query
                            },
                            success: function(data) {
                                $('#countryList').fadeIn();
                                $('#countryList').html(data);
                            }
                        });
                    }
                });
                $(document).on('click', 'li', function() {
                    $('#country').val($(this).text());
                    $('#countryList').fadeOut();
                });
            });

            function getData(el) {
                if (el.value == "") {
                    //document.getElementById(type).innerHTML = "<option></option>";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var parentRow = el.parentElement.parentElement;

                            var inStock = parentRow.getElementsByClassName('in-stock')[0];
                            var pu = parentRow.getElementsByClassName('pu')[0];
                            var type = parentRow.getElementsByClassName('type')[0];

                            var data = JSON.parse(this.responseText);

                            inStock.value = data.quantity1;
                            pu.value = data.price
                            type.value = data.type;
                        }
                    };
                    xmlhttp.open("GET", "ajaxstock.php?q=" + el.value, true);
                    xmlhttp.send();
                }
            }

            function validateQty(stockQty, qty) {
                return Number(stockQty) >= Number(qty);
            }

            function setOverallPrice() {
                var tbody = document.getElementById("tbody");

                var overallPrice = 0;

                for (var parentElement of tbody.children) {
                    var checkboxTD = parentElement.firstElementChild;
                    var checkbox = checkboxTD.firstElementChild;

                    if (checkbox.checked) {
                        var pt = parentElement.getElementsByClassName('pt')[0];
                        overallPrice += Number(pt.value);
                    }
                }

                var totalElement = document.getElementById("total");
                totalElement.innerHTML = `${overallPrice}RWF`;
            }

            function setTotalPrice(el) {
                var qty = el.value;
                var parentRow = el.parentElement.parentElement;
                var tbody = parentRow.parentElement;

                var inStock = parentRow.getElementsByClassName('in-stock')[0];

                var type = parentRow.getElementsByClassName('type')[0];
                var str1 = "nonreducible";
                if (type.value === str1) {
                    var pu = parentRow.getElementsByClassName('pu')[0];
                    var pt = parentRow.getElementsByClassName('pt')[0];

                    pt.value = Number(qty) * Number(pu.value);
                } else {
                    if (validateQty(inStock.value, qty)) {
                        var pu = parentRow.getElementsByClassName('pu')[0];
                        var pt = parentRow.getElementsByClassName('pt')[0];

                        pt.value = Number(qty) * Number(pu.value);
                    } else {
                        alert('The entered quantity is exceeding the quantity in stock');
                        el.value = qty.slice(0, qty.length - 1);
                    }
                }
                setOverallPrice();
            }
        </script>
        <!DOCTYPE html>
        <html moznomarginboxes mozdisallowselectionprint>

        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <?php include('menu.php'); ?>


    <td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">

        <?php include('header.php'); ?>
        <?php include './helpers.php' ?>

        <div class="panel panel-default">
            <div class="panel-heading"><span class="header">
                    <div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 2px 2px 0 #FFFFFF;">Recording Bank Transactions</div>

                    <form action="savebank.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 30px">
                            <table>
                                <tr>
                                    <td><label style="display: inline;">Action: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <select name="action" id="action" required onchange="loadInputs(this);">
                                                <option></option>
                                                <option value="debit">DEBIT</option>
                                                <option value="credit">CREDIT</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="transfer">Bank Transfer</option>
                                                
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label style="display: inline;">Bank Name: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <select name="cat" id="cat" onChange="getstaff_func(this.value);">
                                            <option></option>
                                            <?php
                                            include("dbcon.php");
                                            $query = mysqli_query($con, "SELECT * FROM level where coopid='$_SESSION[coopid]' order by Level_id asc");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<option value='$row[Level_id]'>$row[Level]</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label style="display: inline;">Account: &nbsp;</label>
                                    </td>
                                    <td style="padding: 0px">
                                        <div class="form-group">
                                            <select name="subcat" id="staff_func" onchange='fillBankAccountAmount();'>
                                                <option></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label style="display: inline;">Bank Account Amount: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input name="bank-acc-amount" id="bank-acc-amount" type="text" required readonly />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label style="display: inline;">Particular: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input name="names" type="text" required />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label style="display: inline;">Amount: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input name="particular" type="text" id="particular" onKeyPress="return numbersonly(event,false)" required oninput="checkAgainstBank(this);" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label style="display: inline;">Reason: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input name="bordereau" type="text" id="bordereau" required />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label style="display: inline;">Reference No: </label></td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input name="ref" type="text" id="ref" required />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table id="cheque-based" style="display: none;">
                                <tr>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <label>Budget line: </label>
                                            <select name="account" class="form-control input-sm" style="visibility:hidden" id="account" onchange="loadBugdetLineAmount(this)">
                                                <option>Choose Budgetline</option>
                                                <?php
                                                $year = date("Y");
                                                include('dbcon.php');

                                                $user_query = mysqli_query($con, "select * from account where  coopid='$_SESSION[coopid]' ") or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($user_query)) {
                                                    $account = $row['codename'];
                                                    $lineId = $row["id"];
                                                    echo "<option value='$lineId'>$account</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <label>Budget Line Amount: </label>
                                            <input name="budget-line-amount" id="budget-line-amount" type="text" required readonly />
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5p; display: none;">
                                        <div class="form-group">
                                            <input type="text" name="c" size=5 value="chkNo" style="visibility:hidden;" readonly="" />
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <label>Cheque N&deg;: </label>
                                        <div class="form-group">
                                            <input name="chequeno" type="text" style="visibility:hidden;" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input type="text" name="piece" size=10 value="Attach Proof/Piece" style="visibility:hidden;" readonly="" />
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input type="file" id="photo" name="photo" style="visibility:hidden;">
                                        </div>
                                    </td>
                                </tr>
                            </table>


                            <table id="debit-based" style="display: none;">
                                <tr>
                                    <td style="padding: 0px; padding-left: 5px;">
                                        <div class="form-group">
                                            <input type="text" name="ds" size=10 value="Deposit Slip" style="visibility:hidden;" readonly="" />
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <label id="bor"><input name="slip" type="text" style="visibility:hidden;" /></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input type="text" name="piecedebit" size=10 value="Attach Proof/Piece" style="visibility:hidden;" readonly="" />
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input type="file" id="photodebit" name="photodebit" style="visibility:hidden;">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table id="transfer-based" style="display: none;">
                                <tr>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <select name="transbank" onChange="gettransbank_func(this.value);" style="visibility:hidden;">
                                                <option value="">...Select Bank...</option>
                                                <?php

                                                $query = mysqli_query($con, "SELECT * FROM level where coopid='$_SESSION[coopid]' order by Level_id asc");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    echo "<option value='$row[Level_id]'>$row[Level]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <select name="transaccount" id="trans_func" style="visibility:hidden;">
                                                <option></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td><label style="display: inline;">Date: </label></td>
                                    <td style="padding: 0px; padding-left: 20px">
                                        <div class="form-group">
                                            <input name="date" type="date" id="date" value="<?php $date = date("Y-m-d");
                                                                                            echo $date; ?>" title=" date " />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input type="submit" value="Save" style="font-size:18px" onClick="return (verify());" />
                                        </div>
                                    </td>
                                    <td style="padding: 0px; padding-left: 5px">
                                        <div class="form-group">
                                            <input type="reset" value="Reset" style="font-size:18px" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div></div>
                        </div>
                    </form>
                    <a href="updatebank.php">
                        <input type="button" id="btnCreate" class="btn" style="font-weight: bold" aria-hidden="true" value="Edit" />
                    </a></div>
        </div>
        </div>
        </div>
        </TABLE>
        </TABLE>
        </TABLE>
        </TABLE>
        <?php include_once "footer.php" ?>
        <script>
            function loadInputs(el) {
                document.getElementById("cheque-based").style.display = "none";
                document.getElementById("debit-based").style.display = "none";
                document.getElementById("transfer-based").style.display = "none";

                if (el.value == 'cheque') {
                    document.getElementById("cheque-based").removeAttribute("style");
                    el.form['account'].style.visibility = 'visible';
                    el.form['c'].style.visibility = 'visible';
                    el.form['chequeno'].style.visibility = 'visible';
                    el.form['piece'].style.visibility = 'visible';
                    el.form['photo'].style.visibility = 'visible';
                } else {
                    el.form['account'].style.visibility = 'hidden';
                    el.form['c'].style.visibility = 'hidden';
                    el.form['chequeno'].style.visibility = 'hidden';
                    el.form['piece'].style.visibility = 'hidden';
                    el.form['photo'].style.visibility = 'hidden';
                }

                if (el.value == 'debit') {
                    document.getElementById("debit-based").removeAttribute("style");
                    el.form['ds'].style.visibility = 'visible';
                    el.form['slip'].style.visibility = 'visible';
                    el.form['piecedebit'].style.visibility = 'visible';
                    el.form['photodebit'].style.visibility = 'visible';
                } else {
                    el.form['ds'].style.visibility = 'hidden';
                    el.form['slip'].style.visibility = 'hidden';
                    el.form['piecedebit'].style.visibility = 'hidden';
                    el.form['photodebit'].style.visibility = 'hidden';
                }

                if (el.value == 'transfer') {
                    document.getElementById("transfer-based").removeAttribute("style");
                    el.form['transbank'].style.visibility = 'visible';
                    el.form['transaccount'].style.visibility = 'visible';
                } else {
                    el.form['transbank'].style.visibility = 'hidden';
                    el.form['transaccount'].style.visibility = 'hidden';
                }

            }
        </script>