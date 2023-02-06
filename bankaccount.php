<?php include("session.php"); ?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php include('menu.php'); ?>
	<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="panel panel-default">


				<div class="panel-body">

					<?php include('header.php'); ?>
					<div class="panel panel-default">
						<div class="panel-heading"><span class="header">
								<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">Recording Bank accounts

								</div>

								<FORM action="saveaccount.php" method="post">
									<div class="panel-body" style="background-color: #f9f9f9; box-shadow: inset 0px 1px 0px #fff; padding: 30px">
										<div class="form-group"><label>Bank Name</label>
											<div class="controls">
												<table>
													<tr>
														<td style="padding: 0px">
															<select style="min-width: 50px" data-placeholder="Uncategorized" NAME='lev'>
																<?php
																include("dbcon.php");
																$query1 = "select Level, Level_id from level where coopid='$_SESSION[coopid]' order by Level_id desc";
																$query2 = mysqli_query($con, $query1) or die($mysqli_error($con));

																while ($row = mysqli_fetch_array($query2)) {
																	$f = $row['Level'];
																	$l = $row['Level_id'];
																	print("<option value='$l'>$f</option>");
																}
																?>
															</select>
														</td>
													</tr>
											</div>
										</div>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</table>
		<script type="text/javascript" src="script.js"></script>
		<table id="dataTable" class="table table-bordered">
			<tbody id="tbody">
				<tr>
					<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
					<td>Account <input type="text" placeholder="Bank Account" style="text-align: center" required NAME="combname[]" required /> </td>
				</tr>
		</table>
		<input type="button" value="+" class="" onClick="addRow('dataTable')" />
		<input type="button" value="Remove" onClick="deleteRow('dataTable');  setOverallPrice()" />



		</div>







		<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 20px; font-weight: bold; line-height: 28px; text-shadow: 1px 1px 0 #FFFFFF;">
			<img src="resources/ajax-loader.gif" id="ajaxIndicator" style="display: none; margin-right: 10px" />
			<div class="btn-group">
				<input type="submit" id="btnCreate" class="btn btn-primary" style="font-weight: bold" value="Save" name="submit" />

				</FORM><a href="updatebankaccount.php"><input type="button" id="btnCreate" class="btn" style="font-weight: bold" aria-hidden="true" value="Edit" />
				</a></button>
				<ul class="dropdown-menu">
					<li>
				</ul>
			</div>
		</div>
		</div>
		</div>


		</table>
		</table>
		</table>
		</table>






		<?php include_once "footer.php" ?>