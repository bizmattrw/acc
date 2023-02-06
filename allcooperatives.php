<?php
require 'vendor/autoload.php';
use ChartJs\ChartJS;
$faker = Faker\Factory::create();

include "conn.php";
include "./helpers.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title></title>
		<link rel="stylesheet" href="datatables1/datatables/css/dataTables.bootstrap4.min.css">
		<script type="text/javascript" src="datatables1/datatables/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="datatables1/datatables/js/dataTables.bootstrap4.min.js"></script>
		<?php
		include "./basic_styles.php";
		include "./basic_scripts.php";
		?>
		<script>
            $(document).ready(function(){
				$('#example').dataTable({
					"sPaginationType" : "full_numbers"
				});
			});
			function deleteIt(str) {
				if (str == "") {
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
							if(this.responseText == 1) {
								//alert("Gusiba Byakunze");
								$('#modal-notification1').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
							} else {
								alert("Deletion unsuccessful. Please try agin.");
							}
						}
					};
					xmlhttp.open("GET","ajaxdelete.php?q="+str+"&type=cashiermember", true);
					xmlhttp.send();
				}
			}
        </script>
    </head>
    <body style="background-color: #f2f8f9;">
		<div class="container-fluid">
			<?php
			include "./topbar.php";
			?>
            <div>
				<div style="padding-right: 0px; margin-right: 3rem;">
					<?php
					include "./sidebar.php";
					?>
				</div>
				<div class="col-md">
					<div class="container-fluid">
						<div id="page-wrapper" style="top: 10vh;">
							<div class="card shadow shadow-lg--hover mt-5">
								<div style="padding-bottom: 6rem;" class="card-body">
									<div>
										<table class="table table-striped table-hover table-responsive table-condensed" id="example">
											<thead class="thead-dark">
												<tr>
													<th>N&deg;</th>
													<th>Name</th>
													<th>Website</th>
													<th>Email</th>
													<th>Phone N&deg;</th>
													<th>District</th>
													<th>Sector</th>
													<th>Cell</th>
                                                    <th>Village</th>
                                                    <th></th>
                                                    <th></th>
												</tr>
											</thead>
											<tbody>
												<?php
                                                $sql = "SELECT * FROM cooperatives";
                                                $result = $connect->query($sql);

                                                if ($result->num_rows > 0) {
                                                    $i = 0;
                                                    while ($row = $result->fetch_assoc()) {
                                                        $i++;
                                                        $id = $row["id"];
                                                        $name = $row["name"];
                                                        $website = $row["website"];
                                                        $email = $row["email"];
                                                        $phone = $row["phone"];
                                                        $villageId = $row["village_id"];
														$cellCode = fetchNow("CellCode", "villages", "VillageId = $villageId");
														$sectorCode = fetchNow("SectorCode", "cells", "CellCode = '$cellCode'");
														$districtCode = fetchNow("DistrictCode", "sectors", "SectorCode = '$sectorCode'");
														$provinceCode = fetchNow("ProvinceCode", "districts", "DistrictCode = '$districtCode'");
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $name; ?></td>
                                                            <td><?php echo $website; ?></td>
                                                            <td><?php echo $email; ?></td>
                                                            <td><?php echo $phone; ?></td>
                                                            <td><?php echo fetchNow("DistrictName", "districts", "DistrictCode = '$districtCode'"); ?></td>
                                                            <td><?php echo fetchNow("SectorName", "sectors", "SectorCode = '$sectorCode'"); ?></td>
                                                            <td><?php echo fetchNow("CellName", "cells", "CellCode = '$cellCode'"); ?></td>
                                                            <td><?php echo fetchNow("VillageName", "villages", "VillageCode = '$villageId'"); ?></td>
                                                            <td><a name='' id='' class='btn btn-success btn-icon' href='./updatecooperative.php?q=<?php echo $id; ?>' role='button'><i class='fa fa-pencil'></i> Update</a></td>
                                                            <td><button type='button' class='btn btn-warning btn-icon' onclick='deleteIt($d)'><i class='fa fa-trash'></i> Delete</button></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-notification1" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true" aria-labelledby="modal-notification-<?php echo $i; ?>" style="padding-right: 17px;">
	        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
		        <div class="modal-content bg-danger">
			        <div class="modal-header">
				        <h6 class="modal-title text-white" id="modal-title-notification">Attention required</h6>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">×</span>
				        </button>
			        </div>
			        <div class="modal-body">
				        <div class="py-3 text-center">
				        <i class="ni ni-bell-55 ni-3x"></i>
				        <h4 class="heading mt-4">You should read this!</h4>
				        <p>The deletion of this client will be approved by the manager.</p>
				        </div>
			        </div>
			        <div class="modal-footer">
				        <button type="button" class="btn btn-white" data-dismiss="modal">Ok, Close</button>
				        <!-- <button type="button" class="btn btn-white" onclick="location.assign('do-receive.php?q=<?php echo $givenId; ?>');">Yes, Receive this Client</button> -->
			        </div>
		        </div>
	        </div>
        </div>
		<script>
			/**
			* forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
			*
			* @private
			* @author Todd Motto
			* @link https://github.com/toddmotto/foreach
			* @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
			* @callback requestCallback      callback   - Callback function for each iteration.
			* @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
			* @returns {}
			*/
			var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
			  
			var hamburgers = document.querySelectorAll(".hamburger");
			if (hamburgers.length > 0) {
				forEach(hamburgers, function(hamburger) {
					hamburger.addEventListener("click", function() {
						this.classList.toggle("is-active");
					}, false);
				});
			}
			$(document).ready(function () {
				(function() {
					loadChartJsPhp();
				})();
				$("#hamburger").click(function(){
					if($(this).hasClass('closed')){
						$('#sideNav').animate({left: '0px'});
						$(this).removeClass('closed');
						$('#page-wrapper').animate({'margin-left' : '20%'});
							
					} else {
						$(this).addClass('closed');
						$('#sideNav').animate({left: '-260px'});
						$('#page-wrapper').animate({'margin-left' : '0px'}); 
						// $('#page-wrapper > .row').animate({'width' : '100vw'});
					}
				});
			});
			function toggleSideNav() {
				$("#sideNav").attr("display", "block");
			}
			function fetch(type, str) {
				if (str == "") {
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
							console.log(this.responseText);
							$('#' + type).removeAttr("disabled");
							//$('#' + type).html(this.responseText);
							document.getElementById(type).innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","ajaxget.php?q="+str+"&type="+type, true);
					xmlhttp.send();
				}
			}
        </script>
    </body>
</html>