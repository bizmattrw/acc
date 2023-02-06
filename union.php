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
		<script src="./assets/js/chart.min.js"></script>
    	<script src="./assets/js/driver.js"></script>
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
						<div id="page-wrapper" style="top: 20vh;">
							<div class="row">
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="board">
										<div class="panel panel-primary">
											<div class="number">
                                                <h3></h3>
                                                <h3><?php $unionId = $_SESSION["institution"]; echo fetchNow("COUNT(id)", "cooperatives", "union_id = '$unionId'") ?></h3>
												<small>Cooperatives</small>
											</div>
											<div class="icon">
												<i class="fa fa-bank fa-5x red"></i>
											</div>
							
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			(function() {
				loadChartJsPhp();
			})();
		</script>
    </body>
</html>