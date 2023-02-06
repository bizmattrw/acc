<?php
// print_r($_SESSION);
$userCategory = $_SESSION['user_category'];
$institutionCategory = $_SESSION["institution_category"];

if ($userCategory == "admin") {
    if ($institutionCategory == "super") {
        ?>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top shadow-sm" style="height: 10vh; background-color: #fff">
            <a class="navbar-brand" style="width: 260px; height: 100%; padding-top: 1rem; padding-left: 3rem; background-color: #7b1fa2; font-size: 20px;" href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "admin.php") { echo "#"; } else { echo "admin.php"; } ?>"><i class="fa fa-bank"></i> CDMS </a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#sideNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleSideNav();">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<div id="hamburger" class="hamburger hamburger--spring">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown text-dark mr-4">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-cogs"></i>
								Settings
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="./logout.php">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        <?php
    } else if ($institutionCategory == "federation") {
        ?>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top shadow-sm" style="height: 10vh; background-color: #fff">
            <a class="navbar-brand" style="width: 260px; height: 100%; padding-top: 1rem; padding-left: 3rem; background-color: #7b1fa2; font-size: 20px;" href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "cooperative.php") { echo "#"; } else { echo "cooperative.php"; } ?>"><i class="fa fa-bank"></i> </a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#sideNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleSideNav();">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<div id="hamburger" class="hamburger hamburger--spring">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-sitemap"></i>
								Acts
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<div class="dropdown-header text-black-50">Act Category</div>
								<a class="dropdown-item" href="./createactcategory.php">Add</a>
								<a class="dropdown-item" href="./preupdateactcategory.php">Update and Delete</a>
								<a class="dropdown-item" href="./searchactcategory.php">Search</a>
								<a class="dropdown-item" href="./reportactcategory.php">Report</a>
								<div class="dropdown-divider"></div>
								<div class="dropdown-header text-black-50">Acts</div>
								<a class="dropdown-item" href="./precreateact.php">Add</a>
								<a class="dropdown-item" href="./preupdateact.php">Update and Delete</a>
								<a class="dropdown-item" href="./searchact.php">Search</a>
								<a class="dropdown-item" href="./reportact.php">Report</a>
								
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-money-coins"></i>
								Budget Lines
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createline.php">Add</a>
								<a class="dropdown-item" href="preupdateline.php">Update and Delete</a>
								<a class="dropdown-item" href="searchlines.php">Search</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="reportlines.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-money"></i>
								Expenses
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createexpense.php">Add</a>
								<a class="dropdown-item" href="preupdateexpense.php">Update and Delete</a>
								<a class="dropdown-item" href="searchexpenses.php">Search</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="expensessynthesis.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark mr-4">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-cogs"></i>
								Settings
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<div class="dropdown-header text-black-50">Supporting Staff</div>
								<a class="dropdown-item" href="./createstaffmember.php">New</a>
								<a class="dropdown-item" href="./updatestaffmember.php">Update</a>
								<a class="dropdown-item" href="./searchstaff.php">Search</a>
								<a class="dropdown-item" href="./reportstaff.php">Report</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./updatepass.php">Update Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./logout.php">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        <?php
    } else if ($institutionCategory == "union") {
        ?>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top shadow-sm" style="height: 10vh; background-color: #fff">
            <a class="navbar-brand" style="width: 260px; height: 100%; padding-top: 1rem; padding-left: 3rem; background-color: #7b1fa2; font-size: 20px;" href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "admin.php") { echo "#"; } else { echo "admin.php"; } ?>"><i class="fa fa-bank"></i> </a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#sideNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleSideNav();">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<div id="hamburger" class="hamburger hamburger--spring">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-sitemap"></i>
								Acts
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<div class="dropdown-header text-black-50">Act Category</div>
								<a class="dropdown-item" href="./createactcategory.php">Add</a>
								<a class="dropdown-item" href="./preupdateactcategory.php">Update and Delete</a>
								<a class="dropdown-item" href="./searchactcategory.php">Search</a>
								<a class="dropdown-item" href="./reportactcategory.php">Report</a>
								<div class="dropdown-divider"></div>
								<div class="dropdown-header text-black-50">Acts</div>
								<a class="dropdown-item" href="./precreateact.php">Add</a>
								<a class="dropdown-item" href="./preupdateact.php">Update and Delete</a>
								<a class="dropdown-item" href="./searchact.php">Search</a>
								<a class="dropdown-item" href="./reportact.php">Report</a>
								
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-money-coins"></i>
								Budget Lines
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createline.php">Add</a>
								<a class="dropdown-item" href="preupdateline.php">Update and Delete</a>
								<a class="dropdown-item" href="searchlines.php">Search</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="reportlines.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-money"></i>
								Expenses
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createexpense.php">Add</a>
								<a class="dropdown-item" href="preupdateexpense.php">Update and Delete</a>
								<a class="dropdown-item" href="searchexpenses.php">Search</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="expensessynthesis.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark mr-4">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-cogs"></i>
								Settings
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<div class="dropdown-header text-black-50">Supporting Staff</div>
								<a class="dropdown-item" href="./createstaffmember.php">New</a>
								<a class="dropdown-item" href="./updatestaffmember.php">Update</a>
								<a class="dropdown-item" href="./searchstaff.php">Search</a>
								<a class="dropdown-item" href="./reportstaff.php">Report</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./updatepass.php">Update Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./logout.php">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        <?php
    } else if ($institutionCategory == "cooperative") {
		$cooperativeId = $_SESSION["institution"];
        $cooperativeType = fetchNow("coop_type", "cooperatives", "id = '$cooperativeId'");
        ?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-default d-md-none p-3">
			<div class="container">
				<a class="navbar-brand" href="#"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-default">
					<div class="navbar-collapse-header">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="javascript:void(0)">
									<i class="fa fa-bank"></i>
								</a>
							</div>
							<div class="col-6 collapse-close">
								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
									<span></span>
									<span></span>
								</button>
							</div>
						</div>
					</div>
					
					<ul class="navbar-nav mr-lg-auto">
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-users"></i>
								<span class="nav-link-inner--text d-lg-none">Abanyamuryango</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
								<a class="dropdown-item" href="createmember.php"><i class="fa fa-plus"></i> Kwandika</a>
								<a class="dropdown-item" href="#" onclick="doShowAlert();"><i class="fa fa-pencil"></i> Guhindura</a>
								<a class="dropdown-item" href="search_members.php"><i class="fa fa-search"></i> Gushakisha</a>
								<a class="dropdown-item" href="members.php"><i class="fa fa-book"></i> Igitabo</a>
								<a class="dropdown-item" href="excel_book.php"><i class="fa fa-file-excel-o"></i> Excel</a>
								<a class="dropdown-item" href="#" onclick="doShowAlert6();"><i class="fa fa-file"></i> Ifishi</a>
								<a class="dropdown-item" href="member-synthesis.php"><i class="fa fa-table"></i> Incamake</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-map"></i>
								<span class="nav-link-inner--text d-lg-none">Imirima</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_2">
								<a class="dropdown-item" href="#" onclick="doShowAlert1();" ><i class="fa fa-plus"></i> Kwandika</a>
								<a class="dropdown-item" href="#" onclick="doShowAlert9();"><i class="fa fa-pencil"></i> Guhindura</a>
								<a class="dropdown-item" href="search_imirima.php"><i class="fa fa-search"></i> Gushakisha</a>
								<a class="dropdown-item" href="imirima.php"><i class="fa fa-book"></i> Raporo</a>
								<a class="dropdown-item" href="imirima-synthesis.php"><i class="fa fa-table"></i> Incamake</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-shopping-basket"></i>
								<span class="nav-link-inner--text d-lg-none">Ifumbire</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_3">
								<a class="dropdown-item" href="#" onclick="doShowAlert2();" ><i class="fa fa-plus"></i> Kwandika</a>
								<a class="dropdown-item" href="#" onclick="doShowAlert10();"><i class="fa fa-pencil"></i> Guhindura no Gushakisha</a> 
								<a class="dropdown-item" href="ifumbire.php"><i class="fa fa-book"></i> Raporo</a>
								<a class="dropdown-item" href="ifumbire-synthesis.php"><i class="fa fa-table"></i> Incamake</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-tree"></i>
								<span class="nav-link-inner--text d-lg-none">Imbuto</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_4">
								<a class="dropdown-item" href="#" onclick="doShowAlert3();" ><i class="fa fa-plus"></i> Kwandika</a>
								<a class="dropdown-item" href="all_imbuto.php?q=seeds"><i class="fa fa-pencil"></i> Guhindura no Gushakisha</a> 
								<a class="dropdown-item" href="imbuto.php"><i class="fa fa-book"></i> Raporo</a>
								<a class="dropdown-item" href="imbuto-synthesis.php"><i class="fa fa-table"></i> Incamake</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-money-coins"></i>
								<span class="nav-link-inner--text d-lg-none">Amadeni</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_5">
								<a class="dropdown-item" href="#" onclick="doShowAlert4();" ><i class="fa fa-plus"></i> Kwandika</a>
								<a class="dropdown-item" href="all_amadeni.php?q=debts"><i class="fa fa-pencil"></i> Guhindura no Gushakisha</a> 
								<a class="dropdown-item" href="amadeni.php"><i class="fa fa-book"></i> Raporo</a>
								<a class="dropdown-item" href="amadeni-synthesis.php"><i class="fa fa-table"></i> Incamake</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-basket"></i>
								<span class="nav-link-inner--text d-lg-none">Umusaruro</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_6">
								<a class="dropdown-item" href="#" onclick="doShowAlert5();" ><i class="fa fa-plus"></i> Kwandika</a>
								<a class="dropdown-item" href="all_umusaruro.php?q=harvest"><i class="fa fa-pencil"></i> Guhindura no Gushakisha</a> 
								<a class="dropdown-item" href="umusaruro.php"><i class="fa fa-book"></i> Raporo</a>
								<a class="dropdown-item" href="umusaruro-synthesis.php"><i class="fa fa-table"></i> Incamake</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-link-icon" href="billing.php">
								<i class="fa fa-money"></i>
								<span class="nav-link-inner--text d-lg-none">Inyemezabwishyu</span>
							</a>
						</li>
					</ul>
					<hr>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-money-coins"></i>
								Budget Lines
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createline.php"><i class="fa fa-plus"></i> Add</a>
								<a class="dropdown-item" href="preupdateline.php"><i class="fa fa-pencil"></i> All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="reportlines.php"><i class="fa fa-table"></i> Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-money"></i>
								Expenses
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createexpense.php"><i class="fa fa-plus"></i> Add</a>
								<a class="dropdown-item" href="preupdateexpense.php"><i class="fa fa-pencil"></i> All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="expensessynthesis.php"><i class="fa fa-table"></i> Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-money"></i>
								Prices
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createprice.php"><i class="fa fa-plus"></i> Add</a>
								<a class="dropdown-item" href="allprices.php"><i class="fa fa-pencil"></i> All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pricessynthesis.php"><i class="fa fa-table"></i> Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark mr-4">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-cogs"></i>
								Settings
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<div class="dropdown-header text-black-50"><i class="fa fa-map-marker"></i> Zones</div>
								<a class="dropdown-item" href="./createzone.php"><i class="fa fa-plus"></i> Andika</a>
								<a class="dropdown-item" href="./zones.php"><i class="fa fa-pencil"></i> Zose</a>
								<div class="dropdown-header text-black-50"><i class="fa fa-users"></i> Groups</div>
								<a class="dropdown-item" href="./creategroup.php"><i class="fa fa-plus"></i> Andika</a>
								<a class="dropdown-item" href="./groups.php"><i class="fa fa-pencil"></i> Zose</a>
								<div class="dropdown-divider"></div>
								<div class="dropdown-header text-black-50"><i class="fa fa-bank"></i> Banks</div>
								<a class="dropdown-item" href="./createbank.php"><i class="fa fa-plus"></i> Andika</a>
								<a class="dropdown-item" href="./banks.php"><i class="fa fa-pencil"></i> Zose</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./period_settings.php"><i class="fa fa-calendar"></i> Period Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./migrate_db.php"><i class="fa fa-database"></i> DB Migrations</a>
								<a class="dropdown-item" href="./migrate_cdms_db.php"><i class="fa fa-database"></i> CDMS DB Migrations</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./logout.php"><i class="fa fa-arrow-right"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>


        <nav class="navbar navbar-expand-sm navbar-dark shadow-sm d-none d-md-flex" style="height: 10vh; background-color: #fff">
            <a class="navbar-brand" style="width: 260px; height: 100%; padding-top: 1rem; padding-left: 3rem; background-color: #7b1fa2; font-size: 20px;" href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "admin.php") { echo "#"; } else { echo "cooperative.php"; } ?>"><i class="fa fa-bank"></i> </a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#sideNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleSideNav();">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<div id="hamburger" class="hamburger hamburger--spring">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ni ni-money-coins"></i>
								Budget Lines
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createline.php">Add</a>
								<a class="dropdown-item" href="preupdateline.php">All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="reportlines.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-money"></i>
								Expenses
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createexpense.php">Add</a>
								<a class="dropdown-item" href="preupdateexpense.php">All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="expensessynthesis.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-car"></i>
								Cars
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createcar.php">Add</a>
								<a class="dropdown-item" href="preupdatecar.php">All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="reportcars.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-car"></i>
								Drivers
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createdriver.php">Add</a>
								<a class="dropdown-item" href="preupdatedriver.php">All</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="reportdrivers.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-money"></i>
								Prices
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="createprice.php">Add</a>
								<a class="dropdown-item" href="allprices.php">Search</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pricessynthesis.php">Report</a>
							</div>
						</li>
						<li class="nav-item dropdown text-dark mr-4">
							<a class="nav-link nav-link-icon dropdown-toggle" style="color: #7b1fa2;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-cogs"></i>
								Settings
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
								<div class="dropdown-header text-black-50">Zones</div>
								<a class="dropdown-item" href="./createzone.php">Andika</a>
								<a class="dropdown-item" href="./zones.php">Zose</a>
								<div class="dropdown-header text-black-50">Groups</div>
								<a class="dropdown-item" href="./creategroup.php">Andika</a>
								<a class="dropdown-item" href="./groups.php">Zose</a>
								<div class="dropdown-divider"></div>
								<div class="dropdown-header text-black-50">Banks</div>
								<a class="dropdown-item" href="./createbank.php">Andika</a>
								<a class="dropdown-item" href="./banks.php">Zose</a>
								<div class="dropdown-header text-black-50">Imigabane</div>
								<a class="dropdown-item" href="./createumugabane.php">Andika</a>
								<a class="dropdown-item" href="./imigabane.php">Zose</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./period_settings.php"><i class="fa fa-calendar"></i> Period Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./migrate_db.php">DB Migrations</a>
								<a class="dropdown-item" href="./migrate_cdms_db.php">CDMS DB Migrations</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./logout.php">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        <?php
    }
}
?>