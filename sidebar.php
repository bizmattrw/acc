<?php
if (!isset($_SESSION['user_category'])) {
    echo "<script>location.assign('logout.php')</script>";
}
$userCategory = $_SESSION['user_category'];
$institutionCategory = $_SESSION["institution_category"];

if ($userCategory == "admin") {
    if ($institutionCategory == "super") {
        ?>
        <nav class="sidebar-nav" id="sideNav">
            <ul class="metismenu" id="menu1">
                <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "admin.php") { echo "mm-active"; } ?>">
                    <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "admin.php") { echo "#"; } else { echo "admin.php"; } ?>">
                        <i class="fa fa-bar-chart"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-bank"></i> Federations</a>
                    <ul>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createfederation.php") { echo "mm-active"; } ?>">
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createfederation.php") { echo "#"; } else { echo "createfederation.php"; } ?>"><i class="fa fa-plus"></i> Create</a>
                        </li>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "allfederations.php" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updatefederation.php")) { echo "mm-active"; } ?>">
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "allfederations.php" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updatefederation.php")) { echo "#"; } else { echo "allfederations.php"; } ?>"><i class="fa fa-lis"></i> All</a>
                        </li>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "federations.php") { echo "mm-active"; } ?>">
                            <a href="./federations.php"><i class="fa fa-book"></i> Report</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "fed-synthesis.php") { echo "mm-active"; } ?>">
                    <a href="fed-synthesis.php" aria-expanded="false"><i class="fa fa-search"></i> Federations Synthesis</a>
                </li>
            </ul>
        </nav>
        <?php
    } else if ($institutionCategory == "federation") {
        ?>
        <nav class="sidebar-nav" id="sideNav">
            <ul class="metismenu" id="menu1">
                <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "federation.php") { echo "mm-active"; } ?>">
                    <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "federation.php") { echo "#"; } else { echo "federation.php"; } ?>">
                        <i class="fa fa-bar-chart"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-bank"></i> Unions</a>
                    <ul>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createunity.php") { echo "mm-active"; } ?>">
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createunity.php") { echo "#"; } else { echo "createunity.php"; } ?>"><i class="fa fa-plus"></i> Create</a>
                        </li>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "allunions.php" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updateunion.php")) { echo "mm-active"; } ?>">
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "allunions.php" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updateunon.php")) { echo "#"; } else { echo "allunions.php"; } ?>"><i class="fa fa-lis"></i> All</a>
                        </li>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "unions.php") { echo "mm-active"; } ?>">
                            <a href="./unions.php"><i class="fa fa-book"></i> Report</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "uni-synthesis.php") { echo "mm-active"; } ?>">
                    <a href="uni-synthesis.php" aria-expanded="false"><i class="fa fa-search"></i> Unions Synthesis</a>
                </li>
            </ul>
        </nav>
        <?php
    } else if ($institutionCategory == "union") {
        ?>
        <nav class="sidebar-nav" id="sideNav">
            <ul class="metismenu" id="menu1">
                <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "union.php") { echo "mm-active"; } ?>">
                    <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "union.php") { echo "#"; } else { echo "union.php"; } ?>">
                        <i class="fa fa-bar-chart"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-bank"></i> Cooperatives</a>
                    <ul>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createcooperative.php") { echo "mm-active"; } ?>">
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createcooperative.php") { echo "#"; } else { echo "createcooperative.php"; } ?>"><i class="fa fa-plus"></i> Create</a>
                        </li>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "allcooperatives.php" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updatecooperative.php")) { echo "mm-active"; } ?>">
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "allcooperatives.php" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updateunon.php")) { echo "#"; } else { echo "allcooperatives.php"; } ?>"><i class="fa fa-lis"></i> All</a>
                        </li>
                        <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "cooperatives.php") { echo "mm-active"; } ?>">
                            <a href="./cooperatives.php"><i class="fa fa-book"></i> Report</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php
    } else if ($institutionCategory == "cooperative") {
        $cooperativeId = $_SESSION["institution"];
        $cooperativeType = fetchNow("coop_type", "cooperatives", "id = '$cooperativeId'");
        ?>
        <nav class="sidebar-nav" id="sideNav">
            <ul class="metismenu" id="menu1">
                <li class="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "cooperative.php") { echo "mm-active"; } ?>">
                    <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "cooperative.php") { echo "#"; } else { echo "cooperative.php"; } ?>">
                        <i class="fa fa-bar-chart"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i> Abanyamuryango</a>
                    <ul>
                        <li>
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "createmember.php") { echo "#"; } else { echo "createmember.php"; } ?>"><i class="fa fa-plus"></i> Kwandika</a>
                        </li>
                        <li>
                            <a href="#" onclick="doShowAlert();"><i class="fa fa-pencil"></i> Guhindura</a>
                        </li>
                        <li>
                            <a href="./search_members.php"><i class="fa fa-search"></i> Gushakisha</a>
                        </li>
                        <li>
                            <a href="./members.php"><i class="fa fa-book"></i> Igitabo</a>
                        </li>
                        <li>
                            <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-id-card"></i> Excel</a>
                            <ul>
                                <li>
                                    <a href="./excel_book.php"><i class="fa fa-file-excel-o"></i> Incamake</a>
                                </li>
                                <li>
                                    <a href="./member-excel.php"><i class="fa fa-file-excel-o"></i> Abanyamuryango Bose</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a onclick="doShowAlert6();"><i class="fa fa-file"></i> Ifishi</a>
                        </li>
                        <li>
                            <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-id-card"></i> Amakarita</a>
                            <ul>
                                <li>
                                    <a onclick="doShowAlert7();" aria-expanded="false"><i class="fa fa-id-card-o"></i> Imbere</a>
                                </li>
                                <li>
                                    <a onclick="doShowAlert8();" aria-expanded="false"><i class="fa fa-id-card-o"></i> Inyuma</a>
                                </li>
                                <li>
                                    <a href="./choose-conflicts.php" aria-expanded="false"><i class="fa fa-id-card-o"></i> Gukosora</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="member-synthesis.php" aria-expanded="false"><i class="fa fa-table"></i> Incamake</a>
                        </li>
                    </ul>
                </li>
                <?php
                if ($cooperativeType != 2) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-map"></i> Imirima</a>
                        <ul>
                            <li>
                                <a onclick="doShowAlert1();"><i class="fa fa-plus"></i> Kwandika</a>
                            </li>
                            <li>
                                <a href="./imirima-ajax.php"><i class="fa fa-search"></i> Guhindura</a>
                            </li>
                            <li>
                                <a href="./search_imirima.php"><i class="fa fa-search"></i> Gushakisha</a>
                            </li>
                            <li>
                                <a href="./imirima.php"><i class="fa fa-book"></i> Raporo</a>
                            </li>
                            <li>
                                <a href="imirima-synthesis.php" aria-expanded="false"><i class="fa fa-table"></i> Incamake</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-shopping-basket"></i> Ifumbire</a>
                    <ul>
                        <li>
                            <a onclick="doShowAlert2();"><i class="fa fa-plus"></i> Kwandika</a>
                        </li>
                        <li>
                            <a href="./ifumbire-ajax.php"><i class="fa fa-search"></i> Guhindura no Gushakisha</a>
                        </li>
                        <li>
                            <a href="./ifumbire.php"><i class="fa fa-book"></i> Raporo</a>
                        </li>
                        <li>
                            <a href="ifumbire-synthesis.php" aria-expanded="false"><i class="fa fa-table"></i> Incamake</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-table"></i> Import</a>
                            <ul>
                                <li>
                                    <a href="import-ifumbire.php" aria-expanded="false"><i class="fa fa-plus"></i> New</a>
                                </li>
                                <li>
                                    <a href="pending-import-ifumbire.php" aria-expanded="false"><i class="fa fa-pencil"></i> Pending</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-tree"></i> Imbuto</a>
                    <ul>
                        <li>
                            <a onclick="doShowAlert3();"><i class="fa fa-plus"></i> Kwandika</a>
                        </li>
                        <li>
                            <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "all_imbuto.php?q=seeds" || startsWith(explode("/", $_SERVER["REQUEST_URI"])[2], "updateunon.php")) { echo "#"; } else { echo "all_imbuto.php?q=seeds"; } ?>"><i class="fa fa-search"></i> Guhindura no Gushakisha</a>
                        </li>
                        <li>
                            <a href="./imbuto.php"><i class="fa fa-book"></i> Raporo</a>
                        </li>
                        <li>
                            <a href="imbuto-synthesis.php" aria-expanded="false"><i class="fa fa-table"></i> Incamake</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="ni ni-money-coins"></i> Amadeni</a>
                    <ul>
                        <li>
                            <a onclick="doShowAlert4();"><i class="fa fa-plus"></i> Kwandika</a>
                        </li>
                        <li>
                            <a href="./amadeni-ajax.php"><i class="fa fa-search"></i> Guhindura no Gushakisha</a>
                        </li>
                        <li>
                            <a href="./amadeni.php"><i class="fa fa-book"></i> Raporo</a>
                        </li>
                        <li>
                            <a href="amadeni-synthesis.php" aria-expanded="false"><i class="fa fa-table"></i> Incamake</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-table"></i> Ubwoko bw' Amadeni</a>
                            <ul>
                                <li>
                                    <a href="new_debt_type.php" aria-expanded="false"><i class="fa fa-plus"></i> New</a>
                                </li>
                                <li>
                                    <a href="alldebts.php" aria-expanded="false"><i class="fa fa-pencil"></i> Update</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-table"></i> Inkomoko y' Amadeni</a>
                            <ul>
                                <li>
                                    <a href="new_debt_origin_type.php" aria-expanded="false"><i class="fa fa-plus"></i> New</a>
                                </li>
                                <li>
                                    <a href="alldebtorigin.php" aria-expanded="false"><i class="fa fa-pencil"></i> Update</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="import-amadeni.php" aria-expanded="false"><i class="fa fa-upload"></i> Import</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="ni ni-basket"></i> Umusaruro</a>
                    <ul>
                        <li>
                            <a onclick="doShowAlert5();"><i class="fa fa-plus"></i> Kwandika</a>
                        </li>
                        <li>
                            <a href="./umusaruro-ajax.php"><i class="fa fa-search"></i> Guhindura no Gushakisha</a>
                        </li>
                        <li>
                            <a href="./umusaruro.php"><i class="fa fa-book"></i> Raporo</a>
                        </li>
                        <li>
                            <a href="umusaruro-synthesis.php" aria-expanded="false"><i class="fa fa-table"></i> Incamake</a>
                        </li>
                        <li>
                            <a href="import-umusaruro.php" aria-expanded="false"><i class="fa fa-upload"></i> Import</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php if (explode("/", $_SERVER["REQUEST_URI"])[2] == "billing.php") { echo "#"; } else { echo "billing.php"; } ?>">
                        <i class="fa fa-money"></i>
                        Inyemezabwishyu
                    </a>
                </li>
            </ul>
        </nav>
        <?php
    }
}
?>
<div class="modal fade" id="location-alert" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-white shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" id="form">
                            <div class="form-group mb-3">
						        <label for="">Hitamo</label>
						  	    <div class="input-group input-group-alternative mb-4">
                                    <select id="type-select" class="form-control form-control-alternative" required onchange="fillNext(this.value);">
                                        <option value=""></option>
                                        <option value="z">Zone</option>
                                        <option value="h">Hangar</option>
                                        <option value="all">Bose</option>
									</select>
								</div>
                            </div>
                            <div class="form-group mb-3">
						        <label id="location-label" for=""></label>
						  	    <div class="input-group input-group-alternative mb-4">
								    <select id="location-select" class="form-control form-control-alternative" required>
									</select>
								</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="next-page" id="next-page" aria-describedby="helpId" placeholder="" hidden novalidate>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>