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
		<?php
		include "./basic_styles.php";
		include "./basic_scripts.php";
		?>
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
							<div class="card border-0 mt-5">
								<div class="card-body px-lg-5 py-lg-5" style="background-color: white;">
									<div id="alert" class="alert alert-success" role="alert" hidden>
										<strong>Success!</strong> Information updated successfully!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div id="alert1" class="alert alert-danger" role="alert" hidden>
										<strong>Warning!</strong> Information not updated!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form role="form" method="POST" action="./createcoop.php" enctype="multipart/form-data">
										<div class="row">
											<div class="col-sm">
												<div class="form-group">
													<label for="inputState">Cooperative Name:</label>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-id-card"></i>
															</span>
														</div>
														<input name="nom" id="nom" class="form-control" placeholder="Nom" type="text" oninput='document.getElementById("uob-affiliated-input").value = this.value; document.getElementById("rssb-affiliate-names-input").value = this.value;'>
													</div>
												</div>
											</div>
										</div>
										<div class="heading-title">Cooperative Address</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="inputState">Email:</label>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-envelope"></i>
															</span>
														</div>
														<input name="email" class="form-control" placeholder="Email" type="text">
													</div>
												</div>
											</div>
											<div class="col-sm">
												<div class="form-group">
													<label for="inputState">Website:</label>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<span class="input-group-text">
																www.
															</span>
														</div>
														<input name="website" class="form-control" type="text">
													</div>
												</div>
											</div>
											<div class="col-sm">
												<div class="form-group">
													<label for="inputState">Tel:</label>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-phone-square"></i>
															</span>
														</div>
														<input name="telpersonne" class="form-control" placeholder="Tel" type="text">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md">
												<div class="form-group">
													<label for="inputState">Fertiliser Payment Means</label>
													<div class="input-group mb-4">
														<select id="fert-pyt-mean" name="fert-pyt-mean" class="form-control" onchange="/* fetch('akarere4', this.value) */">
															<option></option>
															<option>Based on months</option>
															<option>Based on harvested quantity</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md">
												<div class="form-group">
													<label for="inputState">Uses Electronic Scale?</label>
													<div class="input-group mb-4">
														<select id="electronic-scale" name="electronic-scale" class="form-control" onchange="/* fetch('akarere4', this.value) */">
															<option></option>
															<option value="1">Yes</option>
															<option value="2">No</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md">
												<div class="form-group">
													<label for="inputState">Cooperative Type</label>
													<div class="input-group mb-4">
														<select id="type" name="type" class="form-control" onchange="loadCoopType(this);">
															<option></option>
															<option value="1">THE VILLAGEOIS</option>
															<option value="2">COOPTHE</option>
															<option value="3">BOTH</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div id="farm-config" hidden>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="inputState">Area</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-circle-o"></i></span>
															</div>
															<input class="form-control" name="ubuso" placeholder="Ubuso" type="number" value="0">
														</div>
													</div>
												</div>
												<div class="col-sm">
													<div class="form-group">
														<label for="inputState">Zone:</label>
														<div class="input-group mb-4">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-phone-square"></i>
																</span>
															</div>
															<input name="zone" class="form-control" placeholder="Zone" type="text">
														</div>
													</div>
												</div>
												<div class="col-sm">
													<div class="form-group">
														<label for="inputState">Bloc/Hangar:</label>
														<div class="input-group mb-4">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-phone-square"></i>
																</span>
															</div>
															<input name="hangar" class="form-control" placeholder="Hangar" type="text">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm">
													<div class="form-group">
														<label for="inputState">Longitude</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-tree"></i></span>
															</div>
															<input class="form-control" name="longitude" placeholder="Longitude" type="text">
														</div>
													</div>
												</div>
												<div class="col-sm">
													<div class="form-group">
														<label for="inputState">Latitude</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-tree"></i></span>
															</div>
															<input class="form-control" name="latitude" placeholder="Latitude" type="text">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-2">
												<div class="form-group">
													<label for="inputState">Province</label>
													<div class="input-group mb-4">
														<select id="intara" name="modalProvince1" class="form-control" onchange="fetch('akarere4', this.value)">
															<option></option>
															<?php
																$sql = "SELECT * FROM provinces";
																$result = $connect->query($sql);
																if($result->num_rows > 0) {
																	while($row = $result->fetch_assoc()) {
																		echo '<option value="'.$row["provincecode"].'">'.$row["provincename"].'</option>';
																	}
																}
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label for="inputState">District</label>
													<div class="input-groupyy mb-4">
														<select id="akarere4" name="modalDistrict1" class="form-control" onchange="fetch('umurenge', this.value)">
															<option></option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label for="inputState">Sector</label>
													<div class="input-group mb-4">
														<select id="umurenge" name="sector" class="form-control" onchange="fetch('akagari', this.value)">
															<option></option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="inputState">Cell</label>
													<div class="input-group mb-4">
														<select id="akagari" name="cell" class="form-control" onchange="fetch('umudugudu', this.value)">
															<option></option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="inputState">Village</label>
													<div class="input-group mb-4">
														<select id="umudugudu" name="village" class="form-control">
															<option></option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="heading-title mb-2">Cooperative User Credentials</div>
										<div class="row">
											<div class="col-sm">
												<div class="form-group">
													<label for="inputState">Username:</label>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-user"></i>
															</span>
														</div>
														<input name="username" class="form-control" placeholder="Username" type="text">
													</div>
												</div>
											</div>
											<div class="col-sm">
												<div class="form-group">
													<label for="inputState">Password:</label>
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-lock"></i>
															</span>
														</div>
														<input name="password" class="form-control" type="password" placeholder="Password" value="<?php echo $faker->password ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="heading-title">Logo and Signature</div>
										<div class="row">
											<div class="col">
                                                <div class="form-group custom-file">
                                                    <div class="input-group mb-4">
                                                        <input type="file" name="logo" id="file-select" class="form-control custom-file-input" id="customFile" onchange="readURL(this);">
                                                        <label class="custom-file-label" for="customFile">Logo</label>
                                                    </div>
                                                </div>
											</div>
											<div class="col">
                                                <div class="form-group custom-file">
                                                    <div class="input-group mb-4">
                                                        <input type="file" name="signature" id="file-select" class="form-control custom-file-input" id="customFile" onchange="readURL(this);">
                                                        <label class="custom-file-label" for="customFile">President's Signature</label>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="row">
											<div class="col">
												<div class="form-group">
													<div class="input-group mt-4">
														<button class="btn btn-icon btn-3 btn-primary btn-block" type="submit">
															<span class="btn-inner--icon">
																<i class="fa fa-save text-white"></i>
															</span>
															<span class="btn-inner--text">Save</span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			function loadCoopType(el) {
				var farmConfig = document.getElementById('farm-config');
				if (el.value != 1) {
					/**
					 * 1 = THE VILLAGEOIS
					 * 2 = COOPTHE
					 */
					farmConfig.hidden = false;
				} else {
					farmConfig.hidden = true;
				}
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