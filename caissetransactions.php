<?php include "session.php"; ?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

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
		<script type="text/javascript" src="script.js"></script>
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
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 2px 2px 0 #FFFFFF;">Recording Caisse Transactions</div>

					<form action="savecaisse.php" method="post">
						<div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 30px">
						<?php $debitAmount= fetchNow("SUM(amount)", "caisse", "coopid='$_SESSION[coopid]' AND action='debit' ORDER BY id DESC LIMIT 1");
						$creditAmount= fetchNow("SUM(amount)", "caisse", "coopid='$_SESSION[coopid]' AND action='credit' ORDER BY id DESC LIMIT 1");
						$difAmount=$debitAmount-$creditAmount;
						 ?>
							<table>
								<tr>
									<td><label style="display: inline;">Caisse: </label></td>
									<td style="padding: 0px; padding-left: 5px">
										<div class="form-group">
											<input style="display: inline;" value="<?php echo$difAmount;?>" name="caisse-balance" type="text" class="form-control input-sm" id="caisse-balance" style="width: 100px; text-align: center" placeholder="Amount" required readonly />
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<label style="display: inline;">Destination: &nbsp;</label>
									</td>
									<td style="padding: 0px">
										<div class="form-group">
											<select style="display: inline;" name="destination" type="text" class="form-control input-sm" id="destination" style="width: 180px; text-align: center" placeholder="Income Resources" required onchange="showBasedTable(this)">
												<option></option>
												<option value="account">Budgetline</option>
												<option value="hand">By hand</option>
												<option value="transfer">Bank Transfer</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td><label style="display: inline;">Date: </label></td>
									<td style="padding: 0px; padding-left: 5px">
										<div class="form-group">
											<input style="display: inline;" value="<?php echo date("Y-m-d") ?>" name="date" type="date" class="form-control input-sm" id="date" style="width: 100px; text-align: center" placeholder="Amount" required />
										</div>
									</td>
								</tr>
							</table>
							<input type="button" value="+" class="" onClick="tryAddRow()" />
							<input type="button" value="Remove" onClick="tryDeleteRow();" />
							<table>
								<tbody id="budget-based" style="display: none;">
									<tr>
										<td><input type="checkbox" required="required" name="budget-chk[]" checked="checked" /></td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Budget Lines: </label>
												<select style="display: inline;" name="budget-line[]"
												 type="text" class="form-control input-sm budget-line" style="width: 180px; text-align: center" placeholder="Income Resources" required onchange="loadBugdetLineAmount(this)">
													<option></option>
													<?php
													$linesResult = getItems("account", ["id", "codename"], "coopid = '$_SESSION[coopid]'");
													if ($linesResult["length"] > 0) {
														$lines = $linesResult["rows"];

														foreach ($lines as $key => $line) {
															$bankId = $line["id"];
															$codename = $line["codename"];
															echo "<option value='$bankId'>$codename</option>";
														}
													}
													?>
												</select>
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Current Amount: </label>
												<input style="display: inline;" name="budget-line-amount[]" type="text" class="form-control input-sm budget-line-amount" style="width: 25px; text-align: center" placeholder="Current Amount" required readonly />
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Particular: </label>
												<input style="display: inline;" name="budget-particular[]" type="text" class="form-control input-sm" id="value" style="width: 80px; text-align: center" placeholder="Particular" required />
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Reason: </label>
												<input style="display: inline;" name="budget-reason[]" type="text" class="form-control input-sm" id="value" style="width: 80px; text-align: center" placeholder="Reason" required />
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Amount Spent: </label>
												<input style="display: inline;" name="amount-spent[]" 
												type="text" class="form-control input-sm amount-spent"
												 style="width: 100px; text-align: center"
												  placeholder="Amount Spent" required oninput="validateInput(this)" />
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Reference: </label>
												<input style="display: inline;" name="budget-reference[]" type="text" class="form-control input-sm" id="reference" style="width: 100px; text-align: center" placeholder="Reference" required />
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							<table>
								<tbody id="hand-based" style="display: none;">
									<tr>
										<td><input type="checkbox" required="required" name="hand-chk[]" checked="checked" /></td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Source: </label>
												<select style="display: inline;" name="hand-source[]" class="form-control input-sm" id="value" style="width: 100px; text-align: center" placeholder="Source" required />
												<option>Choose Income Source</option>
                                                <?php
                                                $year = date("Y");
                                                include('dbcon.php');

                                                $user_query = mysqli_query($con, "select * from sources where  coopid='$_SESSION[coopid]' group by codename ") or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($user_query)) {
                                                    $source = $row['codename'];
                                                    $lineId = $row["id"];
                                                    echo "<option value='$source'>$source</option>";
                                                }
                                                ?>
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Amount: </label>
												<input oninput="validateInput1(this, 'hand');" style="display: inline;" name="hand-amount[]" type="text" class="form-control input-sm hand-amount" id="value" style="width: 100px; text-align: center" placeholder="Amount" required />
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Reference: </label>
												<input style="display: inline;" name="hand-reference[]" type="text" class="form-control input-sm" id="reference" style="width: 100px; text-align: center" placeholder="Reference" required />
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							<table>
								<tbody id="transfer-based" style="display: none;">
									<tr>
										<td><input type="checkbox" required="required" name="transfer-chk[]" checked="checked" /></td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Bank: </label>
												<select style="display: inline;" name="bank[]" type="text" class="form-control input-sm" id="bank" style="width: 180px; text-align: center" placeholder="Income Resources" required onchange="loadAccounts(this)">
													<option></option>
													<?php
													$banksResult = getItems("level", ["Level_id", "Level"], "coopid = '$cooperativeId'");
													if ($banksResult["length"] > 0) {
														$banks = $banksResult["rows"];

														foreach ($banks as $key => $bank) {
															print_r($bank);
															$bankName = $bank["Level"];
															$bankId = $bank["Level_id"];
															echo "<option value='$bankId'>$bankName</option>";
														}
													}
													?>
												</select>
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Account: </label>
												<select style="display: inline;" name="account[]" type="text" class="form-control input-sm account" style="width: 180px; text-align: center" placeholder="Income Resources" required>
													<option></option>
												</select>
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Amount: </label>
												<input oninput="validateInput1(this, 'transfer');" style="display: inline;" name="transfer-amount[]" type="text" class="form-control input-sm transfer-amount" style="width: 25px; text-align: center" placeholder="Source" required />
											</div>
										</td>
										<td style="padding: 0px; padding-left: 5px">
											<div class="form-group">
												<label>Reference: </label>
												<input style="display: inline;" name="transfer-reference[]" type="text" class="form-control input-sm" id="reference" style="width: 25px; text-align: center" placeholder="Reference" required />
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							<div></div>
						</div>

						<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">
							<img src="resources/ajax-loader.gif" id="ajaxIndicator" style="display: none; margin-right: 10px" />
							<div class="btn-group">
								<input type="submit" id="btnCreate" class="btn btn-primary" style="font-weight: bold" value="Save" name="submit" />

					</FORM>
					<a href="updatecaisse.php">
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
			function removeRequired(tableId) {
				var inputs = document.getElementById(tableId).getElementsByTagName("input");
				for (var index = 0; index < inputs.length; index++) {
					var input = inputs[index];
					input.required = false;
					console.log({
						input
					});
				}

				var inputs = document.getElementById(tableId).getElementsByTagName("select");
				for (var index = 0; index < inputs.length; index++) {
					var input = inputs[index];
					input.required = false;
					console.log({
						input
					});
				}
			}

			function setAsRequired(tableId) {
				removeRequired("budget-based");
				removeRequired("hand-based");
				removeRequired("transfer-based");

				var inputs = document.getElementById(tableId).getElementsByTagName("input");
				for (var index = 0; index < inputs.length; index++) {
					var input = inputs[index];
					input.required = true;
					console.log({
						input
					});
				}

				var inputs = document.getElementById(tableId).getElementsByTagName("select");
				for (var index = 0; index < inputs.length; index++) {
					var input = inputs[index];
					input.required = true;
					console.log({
						input
					});
				}
			}

			function showBasedTable(el) {
				document.getElementById("budget-based").style.display = "none";
				document.getElementById("hand-based").style.display = "none";
				document.getElementById("transfer-based").style.display = "none";

				if (el.value == "account") {
					document.getElementById("budget-based").removeAttribute("style");
					setAsRequired("budget-based");
				}

				if (el.value == "hand") {
					document.getElementById("hand-based").removeAttribute("style");
					setAsRequired("hand-based");
				}

				if (el.value == "transfer") {
					document.getElementById("transfer-based").removeAttribute("style");
					setAsRequired("transfer-based");
				}
			}


			function loadBugdetLineAmount(el) {
				var tdEl = el.parentElement.parentElement;
				var amountTd = tdEl.nextElementSibling;
				var amountInput = amountTd.getElementsByClassName("budget-line-amount");
				console.log({
					amountInput
				});

				$.ajax({
					type: "POST",
					url: "ajaxget.php",
					data: 'lineid=' + el.value,
					success: function(data) {
						amountInput[0].value = data;
					}
				});
			}

			function loadAccounts(el) {
				var tdEl = el.parentElement.parentElement;
				var accTd = tdEl.nextElementSibling;
				$.ajax({
					type: "POST",
					url: "gettransbank_func.php",
					data: 'bankid=' + el.value,
					success: function(data) {
						accTd.getElementsByClassName("account")[0].innerHTML = data;
					}
				});
			}

			function getSibling(e) {
				// for collecting siblings
				let siblings = [];
				// if no parent, return no sibling
				if (!e.parentNode) {
					return siblings;
				}
				// first child of the parent node
				let sibling = e.parentNode.firstChild;
				// collecting siblings
				while (sibling) {
					if (sibling.nodeType === 1 && sibling !== e) {
						siblings.push(sibling);
					}
					sibling = sibling.nextSibling;
				}
				return siblings;
			};

			function validateInput(input) {
				var inputValue = input.value;
				var trEl = input.parentElement.parentElement.parentElement;
				var lineInput = trEl.getElementsByClassName("budget-line")[0];
				var allBudgetLineInputs = document.getElementsByClassName("budget-line");
				var sameBudgetLineInputs = [];

				for (var index = 0; index < allBudgetLineInputs.length; index++) {
					var budgetLineInput = allBudgetLineInputs[index];
					if (budgetLineInput.value == lineInput.value) {
						sameBudgetLineInputs.push(budgetLineInput);
					}
				}

				console.log({
					sameBudgetLineInputs
				});

				var amountInput = trEl.getElementsByClassName("budget-line-amount")[0].value;
				var caisseBalance = document.getElementById("caisse-balance").value;
				var amountSpentEls = [];

				var amountSpent = 0;
				for (var index = 0; index < sameBudgetLineInputs.length; index++) {
					var sameBudgetLineInput = sameBudgetLineInputs[index];
					var sameBudgetLineTr = sameBudgetLineInput.parentElement.parentElement.parentElement;
					console.log({
						sameBudgetLineTr
					});
					amountSpent += Number(sameBudgetLineTr.getElementsByClassName("amount-spent")[0].value);
				}

				if (Number(amountSpent) > Number(amountInput)) {
					alert("Amount spent is exceeding the budget line remaining amount.")
					input.value = inputValue.slice(0, inputValue.length - 1);;
				}

				if (Number(amountSpent) > Number(caisseBalance)) {
					console.log({
						amountSpent,
						caisseBalance
					});
					alert("Amount spent is exceeding the caisse's line remaining amount.")
					input.value = inputValue.slice(0, inputValue.length - 1);
				}
			}

			function validateInput1(input, type) {
				var inputValue = input.value;
				var trEl = input.parentElement.parentElement.parentElement;
				var allBankAmountInputs = document.getElementsByClassName(type + "-amount");
				var caisseBalance = document.getElementById("caisse-balance").value;

				var amountSpent = 0;
				for (var index = 0; index < allBankAmountInputs.length; index++) {
					var bankAmountInput = allBankAmountInputs[index];
					amountSpent += Number(bankAmountInput.value);
				}
				console.log({
					amountSpent
				});

				if (Number(amountSpent) > Number(caisseBalance)) {
					alert("Amount spent is exceeding the caisse's line remaining amount.")
					input.value = inputValue.slice(0, inputValue.length - 1);
				}
			}

			function tryAddRow() {
				var el = document.getElementById("destination");
				if (el.value == "account") {
					addRow("budget-based");
				}

				if (el.value == "hand") {
					addRow("hand-based");
				}

				if (el.value == "transfer") {
					addRow("transfer-based");
				}
			}

			function tryDeleteRow() {
				var el = document.getElementById("destination");
				if (el.value == "account") {
					deleteRow("budget-based");
				}

				if (el.value == "hand") {
					deleteRow("hand-based");
				}

				if (el.value == "transfer") {
					deleteRow("transfer-based");
				}
			}
		</script>