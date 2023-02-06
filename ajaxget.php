<?php
session_start();
include "./helpers.php";
if (!empty($_POST["lineid"])) {
    $lineId = $_POST["lineid"];
    echo fetchNow("amountremain", "account", "id = '$lineId'");
}

if (!empty($_GET["type"]) && $_GET["type"] == "bank-account-amount") {
    // print_r($_GET);

    $bank = $_GET["bank"];
    $bank = fetchNow("Level", "level", "Level_id = '$bank'");
    $account = $_GET["account"];
    $account = fetchNow("Combination", "combination", "id = '$account'");
    $debited = fetchNow("SUM(amount)", "bank", "bankname = '$bank' AND account = '$account' AND action = 'debit' ORDER BY id DESC LIMIT 1");
    $credited = fetchNow("SUM(amount)", "bank", "bankname = '$bank' AND account = '$account' AND action = 'credit' ORDER BY id DESC LIMIT 1");
    echo $debited - $credited;
}

$cooperativeId = $_SESSION["institution"];
$coopType = fetchNow("coop_type", "cooperatives", "id = '$cooperativeId'");
include("conn.php");

$type = '';
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}

if (isset($_GET["category"])) {
    $category = $_GET["category"];
}

if ($type == "members-table") {
    $table = "members";

    $primaryKey = "id";

    $columns = array(
        array("db" => "dossier", "dt" => 0),
        array("db" => "nom", "dt" => 1),
        array("db" => "sexe", "dt" => 2),
        array("db" => "anneenaissance", "dt" => 3),
        array("db" => "phone", "dt" => 4),
        array("db" => "assureur", "dt" => 5),
        array("db" => "id", "dt" => 6, "formatter" => function ($d, $row) {
            return "<a name='' id='' class='btn btn-primary btn-icon' href='./updatemember.php?q=$d' role='button'><i class='fa fa-pencil'></i> Update</a>";
        })
    );

    $sql_details = array(
        "user" => "cdms_super",
        "pass" => "0788591850KHAN4",
        "db" => "$db",
        "host" => "localhost"
    );

    require("./datatables1/scripts/ssp.class.php");

    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    );
}
if ($type == "search") {
    if ($category == "all") {
        $sql = "SELECT * FROM members";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-hover mt-5' id='example'><thead class='thead-dark'><tr><th>No</th><th>Irangamuntu</th><th>Amazina</th><th>Igitsina</th>
<th>Zone</th><th>Itsinda</th>
<th>District</th><th>Sector</th><th>Cell</th><th>Village</th><th>Tel</th><th>Umwishingizi</th><th>IdUmwishingizi</th>
<th>Umurimo muri Koperative</th>
<th>Uwamwanditse</th></tr></thead><tbody>";

            $i = 1;
            while ($info = $result->fetch_assoc()) {

                $id = $info['id'];

                $idno = $info['idno'];
                $firstname = $info['names'];
                // $lastname=$info['second_name'];
                $sex = $info['sex'];
                $group = $info['bloc'];
                $land = $info['landsize'];
                $zone = $info['zone'];
                $bank = $info['bank'];
                $account = $info['konti'];
                $ibiti = $info['ibiti'];



                $pr = $info['intara'];
                $dis = $info['akarere'];
                $sec = $info['umurenge'];
                $akagari = $info['akagari'];
                $umudugudu = $info['umudugudu'];
                $umwishingizi = $info['umwishingizi'];
                $idumwishingizi = $info['idumwishingizi'];
                $tel = $info['tel'];
                $umurimo = $info['umurimo'];
                $username = $info['username'];



                echo "<tr bgcolor=silver><td>$i</td>";
                echo "<td align=right>$idno</td>";
                echo "<td align=right>$firstname</td>";
                // echo"<td align=right>$lastname</td>";
                echo "<td align=right>$sex</td>";
                echo "<td align=right>$zone</td>";

                echo "<td align=right>$group</td>";

                // echo"<td align=right>$bdate</td>";


                //echo"<td align=right>$pr</td>";
                echo "<td align=right>$dis</td>";
                echo "<td align=right>$sec</td>";

                echo "<td align=right>$akagari</td>";
                echo "<td align=right>$umudugudu</td>";
                echo "<td align=right>$tel</td>";
                echo "<td align=right>$umwishingizi</td>";
                echo "<td align=right>$idumwishingizi</td>";
                echo "<td align=right>$umurimo</td>";
                echo "<td align=right>$username</td>";

                $i++;

                echo "</tr>";
            }
            echo ("</tbody></table>");
        }
    }
}

if (isset($_GET["q"]))
    if ($_GET["q"] == "all_members") {
        $sql = "SELECT * FROM members WHERE cooperative_id = '$cooperativeId'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $names = $row["names"];
                $idno = $row["idno"];
                $sexId = $row["sex_id"];
                $sex = fetchNow("sex", "sexes", "id = '$sexId'");
                $blocId = $row["bloc"];
                $bloc = fetchNow("Combination", "combinations", "id = '$blocId'");
                $zoneId = fetchNow("Level_id", "combinations", "id = '$blocId'");
                $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");

                $r = ["id" => $id, "names" => $names, "idno" => $idno, "sex" => $sex, "zone" => $zone, "bloc" => $bloc];
                array_push($data, $r);
            }
            //return JSON formatted data
            echo (json_encode($data));
        }
    }
if ($type == "bloc") {
    $sql = "SELECT * FROM combinations WHERE Level_id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["id"] . '">' . $row["Combination"] . '</option>';
        }
    }
}

if ($type == "blocs") {
    $sql = "SELECT * FROM levels WHERE cooperative_id = '$cooperativeId'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            $levelId = $row["Level_id"];
            $level = $row["Level"];

            $query = "SELECT * FROM combinations WHERE Level_id = '$levelId'";
            $res = $connect->query($query);

            if ($res->num_rows > 0) {
                while ($r = $res->fetch_assoc()) {
                    echo '<option value="' . $r["id"] . '">' . $r["Combination"] . '</option>';
                }
            }
        }
    }
}
if ($type == "zones") {
    $sql = "SELECT * FROM levels WHERE cooperative_id = '$cooperativeId'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            $levelId = $row["Level_id"];
            $level = $row["Level"];

            echo '<option value="' . $levelId . '">' . $level . '</option>';
        }
    }
}
if ($type == "akarere") {
    $sql = "SELECT * FROM districts WHERE ProvinceCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["DistrictCode"] . '">' . $row["DistrictName"] . '</option>';
        }
    }
} else if ($type == "akarere1") {
    $sql = "SELECT * FROM districts WHERE ProvinceCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["DistrictCode"] . '">' . $row["DistrictName"] . '</option>';
        }
    }
} else if ($type == "doctorname") {
    $sql = "SELECT code FROM employees WHERE id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["code"];
    }
} else if ($type == "akarere2") {
    $sql = "SELECT * FROM districts WHERE ProvinceCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["DistrictCode"] . '">' . $row["DistrictName"] . '</option>';
        }
    }
} else if ($type == "akarere3") {
    $sql = "SELECT * FROM districts WHERE ProvinceCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["DistrictCode"] . '">' . $row["DistrictName"] . '</option>';
        }
    }
} else if ($type == "akarere4") {
    $sql = "SELECT * FROM districts WHERE ProvinceCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["DistrictCode"] . '">' . $row["DistrictName"] . '</option>';
        }
    }
} else if ($type == "tm") {
    $sql = "SELECT Level_id, tm FROM insurances WHERE Level_id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["Level_id"] . '">' . $row["tm"] . '</option>';
        }
    }
} else if ($type == "qualification") {
    $sql = "SELECT * FROM doctorcombinations WHERE Level_id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '" selected>' . $row["Combination"] . '</option>';
            }
        } else {
            echo "<option></option>";
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["Combination"] . '</option>';
            }
        }
    }
} else if ($type == "insurancename") {
    $sql = "SELECT Level FROM insurances WHERE Level_id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["Level"];
    }
} else if ($type == "actcost") {
    $sql = "SELECT cost FROM product WHERE number = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["cost"];
    }
} else if ($type == "umurenge") {
    $sql = "SELECT * FROM sectors WHERE DistrictCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["SectorCode"] . '">' . $row["SectorName"] . '</option>';
        }
    }
} else if ($type == "umurenge1") {
    $sql = "SELECT * FROM sectors WHERE DistrictCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["SectorCode"] . '">' . $row["SectorName"] . '</option>';
        }
    }
} else if ($type == "next-enfant") {
    $affNo = $_GET["affno"];
    // echo $affNo;
    $benType = $_GET["q"];

    $sql = "SELECT * FROM beneficiary WHERE affno = '$affNo' AND type = '$benType' ORDER BY bno DESC LIMIT 1";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $next = explode("-", $row["bno"])[1] + 1;
            echo "0" . $next;
        }
    } else {
        echo "02";
    }
} else if ($type == "employees") {
    $sql = "SELECT id, fullname FROM employees";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value='' selected>Select one</option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["id"] . '">' . $row["fullname"] . '</option>';
        }
    }
} else if ($type == "line") {
    $sql = "SELECT name FROM budget_lines WHERE id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["name"];
        }
    }
} else if ($type == "umurenge2") {
    $sql = "SELECT * FROM sectors WHERE DistrictCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["SectorCode"] . '">' . $row["SectorName"] . '</option>';
        }
    }
} else if ($type == "umurenge3") {
    $sql = "SELECT * FROM sectors WHERE DistrictCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["SectorCode"] . '">' . $row["SectorName"] . '</option>';
        }
    }
} else if ($type == "akagari") {
    $sql = "SELECT * FROM cells WHERE SectorCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["CellCode"] . '">' . $row["CellName"] . '</option>';
        }
    }
} else if ($type == "act") {
    $sql = "SELECT number, productname FROM product WHERE type = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["number"] . '">' . $row["productname"] . '</option>';
        }
    }
} else if ($type == "akagari1") {
    $sql = "SELECT * FROM cells WHERE SectorCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["CellCode"] . '">' . $row["CellName"] . '</option>';
        }
    }
} else if ($type == "akagari2") {
    $sql = "SELECT * FROM cells WHERE SectorCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["CellCode"] . '">' . $row["CellName"] . '</option>';
        }
    }
} else if ($type == "umudugudu") {
    $sql = "SELECT * FROM villages WHERE CellCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<option></option>";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["VillageId"] . '">' . $row["VillageName"] . '</option>';
        }
    }
} else if ($type == "umudugudu1") {
    $sql = "SELECT * FROM villages WHERE CellCode = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["VillageId"] . '">' . $row["VillageName"] . '</option>';
        }
    }
} else if ($type == "class1") {
    $sql = "SELECT * FROM combinations WHERE Level_id = '" . $_GET["q"] . "' group by combination";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<option>' . $row["Combination"] . '</option>';
        }
    }
} else if ($type == "class2") {
    $sql = "SELECT * FROM combinations WHERE Level_id = '" . $_GET["q"] . "' group by combination";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<option>' . $row["Combination"] . '</option>';
        }
    }
} else if ($type == "bloc1") {
    $sql = "SELECT * FROM combinations WHERE Level_id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<option>' . $row["Combination"] . '</option>';
        }
    }
} else if ($type == "book") {
    $sql = "SELECT * FROM members ORDER BY zone, bloc ASC";
    $result = $connect->query($sql);

    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table border=2 align=center><tr><th>No</th><th>Irangamuntu</th><th>Amazina Yombi</th>
        <th>Itariki yabereho Umunyamuryango</th><th>Zone</th><th>Itsinda</th>
        <th>District</th><th>Sector</th>
        <th>Akagali</th><th>Village</th><th>Code</th><th>Umugabane</th><th>Umuzungura</th><th>Ifoto</th><th>Parcel</th><th>Ibiti</th><th>Ibiti</th><th>Umukono</th>
        
        </tr>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            // $umugabane=$info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno") or die($connect->error);
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];
            echo "<tr><td>$i</td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$id</td>";

            echo "<td align=center>5000</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=right><img src='images/$cooperativeId/$pic1' height='100' width='100'></td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }


            echo "</tr><td align=center></td></tr>";
        }
        echo ("</table>");
    }
} else if ($type == "member") {
    $sql = "SELECT * FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_GET["target"])) {
        $target = $_GET["target"];

        if ($target == "basic") {
            echo '
                    <form method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">' . $row["names"] . '</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
    
                        <div class="modal-body bg-gradient-green">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-id-card-o"></i>
                                                            </span>
                                                        </div>
                                                        <input id="idno" onkeyup="determineGender(this.value); determineBdate(this.value);" name="idno" value="' . $row["idno"] . '" class="form-control form-control-alternative" placeholder="Nimero y\' Indangamuntu" type="text" minlength="3" maxlength="16" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputState">Igitsina</label>
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i id="icon" class="fa fa-genderless"></i>
                                                            </span>
                                                        </div>
                                                        <input id="sex" name="sex" value="' . $row["sex"] . '" class="form-control form-control-alternative" placeholder="Igitsina" type="text" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="inputState">Umwaka w\' Amavuko</label>
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-birthday-cake"></i>
                                                            </span>
                                                        </div>
                                                        <input id="bdate" name="bdate" value="' . $row["bdate"] . '" class="form-control form-control-alternative" placeholder="Umwaka w\' Amavuko" type="text" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="inputState">Amazina Yombi</label>
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-user-o"></i>
                                                            </span>
                                                        </div>
                                                        <input id="names" name="names" value="' . $row["names"] . '" class="form-control form-control-alternative" onkeyup="document.getElementById(\'modal-title-default\').innerHTML=this.value" placeholder="Amazina Yombi" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputState">Amashuli </label>
                                                    <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-school"></i>
                                                    </span>
                                                </div>
                                                <input id="education" name="education" value="' . $row["amashuli"] . '" class="form-control form-control-alternative" placeholder="Amashuli" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="inputState">Itariki Yo Kwinjira</label>
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </span>
                                                        </div>
                                                        <input name="entrydate" value="' . $row["datein"] . '" class="form-control form-control-alternative" placeholder="Itariki Yabereye Umunyamuryango" type="date" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="inputState">Zone </label>
                                                    <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-map"></i>
                                                    </span>
                                                </div>
                                                <input id="zone" name="zone" value="' . $row["zone"] . '" class="form-control form-control-alternative" placeholder="Zone" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="inputState">Bloc </label>
                                                    <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-map-marked"></i>
                                                    </span>
                                                </div>
                                                <input name="bloc" id="bloc" value="' . $row["bloc"] . '" class="form-control form-control-alternative" placeholder="Bloc" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="inputState">Umurimo</label>
                                                    <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-o"></i>
                                                    </span>
                                                </div>
                                                <input name="work" value="' . $row["umurimo"] . '" class="form-control form-control-alternative" placeholder="Umurimo" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="inputState">Umugabane</label>
                                            <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-o"></i>
                                            </span>
                                        </div>
                                        <input name="share" id="share" value="' . $row["umugabane"] . '" class="form-control form-control-alternative" placeholder="Umugabane" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="inputState">Banki</label>
                                            <div class="input-group input-group-alternative">
                                                <select name="bank" class="form-control form-control-alternative">
                                                    <option> SACCO JABANA</option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="inputState">Konti</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-bank"></i>
                                                    </span>
                                                </div>
                                                <input name="account" value="' . $row["konti"] . '" class="form-control form-control-alternative" placeholder="Konti" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="inputState">Nimero Ya Telefoni</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input name="tel" value="' . $row["tel"] . '" class="form-control form-control-alternative" placeholder="Nimero Ya Telefoni" type="tel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div id="alert" class="col">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-block btn-icon" onclick="updateBasic(\'' . $row["id"] . '\')">
                                <span class="btn-inner--icon">
                                    <i class="fa fa-save"></i>
                                </span>
                                Hindura Amakuru
                            </button>
                        </div>
                    </form>';
        } else if ($target == "location") {
            echo '<form method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">' . $row["names"] . '</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
    
                        <div class="modal-body bg-gradient-green">
                            <div class="container-fluid">
                                <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="inputState">Province </label> <span class="badge bg-gradient-indigo text-white">' . $row["intara"] . '</span>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="intara" name="province" class="form-control form-control-alternative" onchange="fetch(\'akarere\', this.value)" required>
                                                        <option></option>';
            $sql = "SELECT * FROM provinces";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($provinceRow = $result->fetch_assoc()) {
                    echo '<option value="' . $provinceRow["provincecode"] . '">' . $provinceRow["provincename"] . '</option>';
                }
            }
            echo '</select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="inputState">District </label> <span class="badge bg-gradient-indigo text-white">' . $row["akarere"] . '</span>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="akarere" name="district" class="form-control form-control-alternative" onchange="fetch(\'umurenge\', this.value)" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="inputState">Sector </label> <span class="badge bg-gradient-indigo text-white">' . $row["umurenge"] . '</span>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="umurenge" name="sector" class="form-control form-control-alternative" onchange="fetch(\'akagari\', this.value)" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="inputState">Cell </label> <span class="badge bg-gradient-indigo text-white">' . $row["akagari"] . '</span>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="akagari" name="cell" class="form-control form-control-alternative" onchange="fetch(\'umudugudu\', this.value)" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="inputState">Village </label> <span class="badge bg-gradient-indigo text-white">' . $row["umudugudu"] . '</span>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="umudugudu" name="village" class="form-control form-control-alternative" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="alert" class="col">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-icon btn-block" onclick="updateLocation(\'' . $row["id"] . '\')">
                                <span class="btn-inner--icon">
                                    <i class="fa fa-save"></i>
                                </span>
                                Hindura Amakuru
                            </button>
                        </div>
                    </form>';
        } else if ($target == "umwishingizi") {
            echo '<form method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">' . $row["names"] . '</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
    
                        <div class="modal-body bg-gradient-green">
                            <div class="container-fluid">
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputState">Amazina y\' Umwishingizi</label>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input name="sponsorname" value="' . $row["umwishingizi"] . '" class="form-control form-control-alternative" placeholder="Amazina y\' Umwishingizi" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputState">Indangamuntu y\' Umwishingizi</label>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input name="sponsorid" value="' . $row["idumwishingizi"] . '" class="form-control form-control-alternative" placeholder="Indangamuntu y\' Umwishingizi" minlength="3" maxlength="16" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputState">Icyo Bapfana </label>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input name="relation" value="' . $row["isano"] . '" class="form-control form-control-alternative" placeholder="Isano" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                        <div class="form-group">
                                            <label for="inputState">Umubare w\' Abishyurirwa Mituweli</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-heart-o"></i>
                                                    </span>
                                                </div>
                                                <input name="assured" value="' . $row["mituweli"] . '" class="form-control form-control-alternative" placeholder="Umubare w\' Abishyurirwa Mituweli" type="number">
                                            </div>
                                        </div>
                                    </div>
                        </div>
                                    <div class="row">
                                        <div id="alert" class="col">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-icon btn-block" onclick="updateUmwishingizi(\'' . $row["id"] . '\')">
                                <span class="btn-inner--icon">
                                    <i class="fa fa-save"></i>
                                </span>
                                Hindura Amakuru
                            </button>
                        </div>
                    </form>';
        } else if ($target == "pic") {
            echo '<form method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">' . $row["names"] . '</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
    
                        <div class="modal-body bg-gradient-green">
                            <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <img id="image" style="width: 8.3rem; height: 8.8rem;" src="images/' . $cooperativeId . '/' . $row["images"] . '" class="rounded-circle img-center shadow shadow-lg--hover img-thumbnail" alt="...">
                                </div>
                                <div class="w-100"></div>
                                <div class="col mt-3">
                                    <div class="form-group custom-file">
                                        <div class="input-group input-group-alternative mb-4">
                                            <input type="file" name="photos" id="file-select" class="form-control custom-file-input" onchange="readURL(this);" required>
                                            <label class="custom-file-label" for="customFile">Hitamo Ifoto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-icon btn-block" onclick="updatePic(\'' . $row["id"] . '\')">
                                <span class="btn-inner--icon">
                                    <i class="fa fa-save"></i>
                                </span>
                                Hindura Amakuru
                            </button>
                        </div>
                    </form>';
        }
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            /*
                echo '
                    <form method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">'.$row["names"].'</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
    
                        <div class="modal-body bg-gradient-green">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img style="width: 8.3rem; height: 8.8rem;" src="images/$cooperativeId/'.$row["images"].'" class="rounded-circle img-center shadow shadow-lg--hover img-thumbnail" alt="...">
                                        <div class="col mt-3">
                                            <div class="form-group custom-file">
                                                <div class="input-group input-group-alternative mb-4">
                                                    <input type="file" name="photos" id="file-select" class="form-control custom-file-input" required>
                                                    <label class="custom-file-label" for="customFile">Hitamo Ifoto</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-5 mt-3">
                                                <div class="form-group">
                                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-id-card-o"></i>
                                                            </span>
                                                        </div>
                                                        <input id="idno" onkeyup="determineGender(this.value); determineBdate(this.value);" name="idno" value="'.$row["idno"].'" class="form-control form-control-alternative" placeholder="Nimero y\' Indangamuntu" type="text" minlength="3" maxlength="16" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mt-3">
                                                <div class="form-group">
                                                    <label for="inputState">Igitsina</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i id="icon" class="fa fa-genderless"></i>
                                                            </span>
                                                        </div>
                                                        <input id="sex" name="sex" value="'.$row["sex"].'" class="form-control form-control-alternative" placeholder="Igitsina" type="text" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-3">
                                                <div class="form-group">
                                                    <label for="inputState">Umwaka w\' Amavuko</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-birthday-cake"></i>
                                                            </span>
                                                        </div>
                                                        <input id="bdate" name="bdate" value="'.$row["bdate"].'" class="form-control form-control-alternative" placeholder="Umwaka w\' Amavuko" type="text" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-sm-5 mt-2">
                                                <div class="form-group">
                                                    <label for="inputState">Amazina Yombi</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-user-o"></i>
                                                            </span>
                                                        </div>
                                                        <input id="names" name="names" value="'.$row["names"].'" class="form-control form-control-alternative" onkeyup="document.getElementById(\'modal-title-default\').innerHTML=this.value" placeholder="Amazina Yombi" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mt-2">
                                                <div class="form-group">
                                                    <label for="inputState">Amashuli</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <select name="education" class="form-control form-control-alternative" required>
                                                            <option></option>
                                                            <option>NTIYIZE</option>
                                                            <option>P1</option>
                                                            <option>P2</option>
                                                            <option>P3</option>
                                                            <option>P4</option>
                                                            <option>P5</option>
                                                            <option>P6</option>
                                                            <option>P7</option>
                                                            <option>P8</option>
                                                            <option>SERAYI RIMWE</option>
                                                            <option>SERAYI KABIRI</option>
                                                            <option>SERAYI GATATU</option>
                                                            <option>S1</option>
                                                            <option>S2</option>
                                                            <option>S3</option>
                                                            <option>S4</option>
                                                            <option>S5</option>
                                                            <option>S6</option>
                                                            <option>A2</option>
                                                            <option>A1</option>
                                                            <option>A0</option>
                                                            <option>MASTERS</option>
                                                            <option>PHD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mt-2">
                                                <div class="form-group">
                                                    <label for="inputState">Itariki Yo Kwinjira</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-calendar-o"></i>
                                                            </span>
                                                        </div>
                                                        <input name="entrydate" value="'.$row["datein"].'" class="form-control form-control-alternative" placeholder="Itariki Yabereye Umunyamuryango" type="date" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="inputState">Zone</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <select id="zone" name="zone" class="form-control form-control-alternative" onchange="fetch(\'bloc\', this.value)" required>
                                                            <option></option>';
                                                                $sql = "SELECT * FROM levels";
                                                                $result = $connect->query($sql);
                                                                
                                                                if($result->num_rows > 0) {
                                                                    while($zoneRow = $result->fetch_assoc()) {
                                                                        if ($zoneRow["Level"] == $row["zone"] ) {
                                                                            echo '<option value="'.$zoneRow["Level_id"].'" selected>'.$zoneRow["Level"].'</option>';
                                                                        } else {
                                                                            echo '<option value="'.$zoneRow["Level_id"].'">'.$zoneRow["Level"].'</option>';
                                                                        }
                                                                    }
                                                                }
                                                        echo '</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="inputState">Bloc</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <select id="bloc" name="bloc" class="form-control form-control-alternative" disabled required>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="inputState">Umurimo</label>
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <select name="work" class="form-control form-control-alternative" onchange="checkList(this.value);" required>
                                                            <option></option>
                                                            <option>Umunyamuryango Usanzwe</option>
                                                            <option>Umuhinzi w`Icyayi</option>
                                                            <option>Perezida Nyobozi</option>
                                                            <option>V/CE Perezida Nyobozi</option>
                                                            <option>V/CE Perezida Wa Zone</option>
                                                            <option>Umujyanama</option>
                                                            <option>Umwanditsi Nyobozi</option>
                                                            <option>Perezida Nyobozi Ngenzuzi</option>
                                                            <option>V/CE Perezida Ngenzuzi</option>
                                                            <option>Umwanditsi Ngenzuzi</option>
                                                            <option>Perezida wa Zone</option>
                                                            <option>Umugenzuzi wa Zone</option>
                                                            <option>Umwanditsi wa Zone</option>
                                                            <option>Perezida witsinda</option>
                                                            <option>Umugenzuzu witsinda</option>
                                                            <option>Umwanditsi witsinda</option>
                                                            <option>Umubitsi witsinda</option>
                                                            <option>Umuhwituzi</option>
                                                            <option>Ushyinzwe umusaruro</option>
                                                            <option>Ushyinzwe Ibikorwaremezo</option>
                                                            <option>Ushyinzwe Imibereho Myiza</option>
                                                            <option>Komisiyo yumusaruro</option>
                                                            <option>Komisiyo yumusaruro</option>
                                                            <option>Komisiyo yamasoko</option>
                                                            <option>Komisiyo yimibereho Myiza</option>
                                                            <option>Komisiyo ya Discipline</option>
                                                            <option>Komisiyo Ishinzwe Ibikorwa Remezo</option>
                                                            <option>Komisiyo Ishinzwe Inguzanyo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputState">Umugabane</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <select id="share" name="share" class="form-control form-control-alternative" required disabled>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputState">Banki</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <select name="bank" class="form-control form-control-alternative">
                                                    <option> SACCO JABANA</option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputState">Konti</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-bank"></i>
                                                    </span>
                                                </div>
                                                <input name="account" value="'.$row["konti"].'" class="form-control form-control-alternative" placeholder="Konti" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputState">Amazina y\' Umwishingizi</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                                <input name="sponsorname" value="'.$row["umwishingizi"].'" class="form-control form-control-alternative" placeholder="Amazina y\' Umwishingizi" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputState">Indangamuntu y\' Umwishingizi</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-id-card"></i>
                                                    </span>
                                                </div>
                                                <input name="sponsorid" value="'.$row["idumwishingizi"].'" class="form-control form-control-alternative" placeholder="Indangamuntu y\' Umwishingizi" minlength="3" maxlength="16" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputState">Icyo Bapfana</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <select name="relation" class="form-control form-control-alternative" required>
                                                    <option>UMUFASHA</option>
                                                    <option>UMWANA </option>
                                                    <option>UMUBYEYI</option>
                                                    <option>NTACYO BAPFANA</option>
                                                    <option>UMUVANDIMWE</option>
                                                    <option>UMWUZUKURU</option>
                                                    <option>SEKURU</option>
                                                    <option>NYIRAKURU</option>
                                                    <option>UMUKAZANA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputState">Umubare w\' Abishyurirwa Mituweli</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-heart-o"></i>
                                                    </span>
                                                </div>
                                                <input name="assured" value="'.$row["mituweli"].'" class="form-control form-control-alternative" placeholder="Umubare w\' Abishyurirwa Mituweli" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputState">Nimero Ya Telefoni</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input name="tel" value="'.$row["tel"].'" class="form-control form-control-alternative" placeholder="Nimero Ya Telefoni" type="tel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="inputState">Province</label>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="intara" name="province" class="form-control form-control-alternative" onchange="fetch(\'akarere\', this.value)" required>
                                                        <option></option>';
                                                            $sql = "SELECT * FROM provinces";
                                                            $result = $connect->query($sql);
                                                            if($result->num_rows > 0) {
                                                                while($provinceRow = $result->fetch_assoc()) {
                                                                    if($provinceRow["provincename"] == $row["intara"]) {
                                                                        echo '<option value="'.$provinceRow["provincecode"].'" selected>'.$provinceRow["provincename"].'</option>';
                                                                    } else {
                                                                        echo '<option value="'.$provinceRow["provincecode"].'">'.$provinceRow["provincename"].'</option>';
                                                                    }
                                                                }
                                                            }
                                                    echo '</select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="inputState">District</label>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="akarere" name="district" class="form-control form-control-alternative" onchange="fetch(\'umurenge\', this.value)" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="inputState">Sector</label>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="umurenge" name="sector" class="form-control form-control-alternative" onchange="fetch(\'akagari\', this.value)" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputState">Cell</label>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="akagari" name="cell" class="form-control form-control-alternative" onchange="fetch(\'umudugudu\', this.value)" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputState">Village</label>
                                                <div class="input-group input-group-alternative mb-4">
                                                    <select id="umudugudu" name="village" class="form-control form-control-alternative" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="alert" class="col">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="save(\''.$row["idno"].'\')">Save changes</button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                        </div>
                    </form>'
                ;
                */
        }
    }
} else if ($type == "imirima") {
    $sql = "SELECT *  FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        $id = 0;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
                <form>
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Andika</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group mb-3 focused">
                            <label for="inputState">Amazina</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                </div>
                                <input class="form-control" name="namesImirima" value="' . $row["names"] . '"value="" placeholder="Amazina Yombi" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Nimero y\' Indangamuntu</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                </div>
                                <input class="form-control" name="idnoImirima" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Nimero y\' Umurima</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                </div>
                                <input class="form-control" name="plotno" placeholder="Nimero y\' Umurima" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Ubuso</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"></i></span>
                                </div>
                                <input class="form-control" name="ubuso" placeholder="Ubuso" type="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Umubare w\' Ibiti</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-tree"></i></span>
                                </div>
                                <input class="form-control" name="trees" placeholder="Umubare w\' Ibiti" type="number">
                            </div>
                        </div>
                        <div class="form-group focused">
							<label for="inputState">Zone</label>
							<div class="input-group input-group-alternative mb-4">
							    <select id="zone" name="zoneImirima" class="form-control form-control-alternative" onchange="fetch(\'bloc1\', this.value)" required>
                                    <option></option>';
        $sql = "SELECT * FROM levels";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($zoneRow = $result->fetch_assoc()) {
                if ($zoneRow["Level"] == $row["zone"]) {
                    echo '<option value="' . $zoneRow["Level_id"] . '" selected>' . $zoneRow["Level"] . '</option>';
                } else {
                    echo '<option value="' . $zoneRow["Level_id"] . '">' . $zoneRow["Level"] . '</option>';
                }
            }
        }
        echo '</select>
							</div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Bloc</label>
                            <div class="input-group input-group-alternative mb-4">
                                <select id="bloc1" name="blocImirima" class="form-control form-control-alternative" disabled required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div id="alert" class="mt-4">
                        </div>
                        <div class="row text-center">
                            <div id="sendCol" class="col-sm-12">
                                <button id="saveImirimaBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save(\'' . $id . '\')" type="button">
                                    <span class="btn-inner--icon">
                                        <i id="saveImirimaBtnIcon" class="fa fa-save"></i>
                                    </span>
                                    <span id="saveImirimaBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                    <div class="ld ld-ring ld-spin"></div>
                                </button>
                                </div>
                            <div id="passCol" class="col-sm-4" hidden>
                                <button id="savedImirimaBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                    <span id="savedImirimaBtnTxt" class="btn-inner--text">Komeza</span>
                                    <span class="btn-inner--icon">
                                        <i  class="fa fa-arrow-right"></i>
                                    </span>
                                    <div class="ld ld-ring ld-spin"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>';
    }
} else if ($type == "name") {
    $sql = "SELECT names FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["names"];
        }
    }
} else if ($type == "report" && $category == "all") {
    echo "
            <table id='example' class='table-striped table-hover table-bordered text-center text-bold-50' align=center>
                <thead class='thead bg-gradient-green text-black' align=center>
                    <tr>
                        <th colspan='19'>ABANYAMURYANGO</th>";
    if ($coopType == 1) {
        echo "<th colspan='11'>IMIRIMA</th>";
    }
    echo "
                    </tr>
                    <tr>
                        <th scope='col'>N&deg;</th>
                        <th scope='col'>Ifoto</th>
                        <th scope='col'>Irangamuntu</th>
                        <th scope='col'>Amazina Yombi</th>
                        ";
    if ($_SESSION["user_category_id"] == 3) {
        echo "<th scope='col'>Amazina Yombi</th>";
    }
    echo "<th scope='col'>Itariki yabereho Umunyamuryango</th>
                        <th scope='col'>Zone (Segiteri)</th>
                        <th scope='col'>Hangari (Block)</th>
                        <th scope='col'>N&deg; y' Icyayi</th>
                        <th scope='col'>Akarere</th>
                        <th scope='col'>Umurenge</th>
                        <th scope='col'>Akagali</th>
                        <th scope='col'>Umudugudu</th>
                        <th scope='col'>Umugabane</th>
                        <th scope='col'>Telefoni</th>
                        <th scope='col'>Banki</th>
                        <th scope='col'>Konti</th>
                        <th scope='col'>Umuzungura</th>
                        <th scope='col'>Indangamuntu y' Umuzungura</th>
                        <th scope='col'>Isano</th>";
    if ($coopType == 1) {
        echo "
                                <th scope='col'>N&deg; y' Umurima</th>
                                <th scope='col'>Ubuso</th>
                                <th scope='col'>Longitude</th>
                                <th scope='col'>Latitude</th>
                                <th scope='col'>Zone</th>
                                <th scope='col'>Hangari</th>
                                <th scope='col'>Akagari</th>
                                <th scope='col'>Umudugudu</th>
                            ";
    }
    echo "
                    </tr>
                </thead>
                <tbody style='font-weight: bold;'>
        ";
    $zoneMembers = [];
    // print_r($zoneMembers);

    $leon = $connect->query("SELECT * FROM members WHERE cooperative_id = '$cooperativeId' ORDER BY names, `image`");
    if ($_SESSION["user_category_id"] == 3) {
        $leon = $connect->query("SELECT * FROM members WHERE cooperative_id IN (SELECT id FROM cooperatives WHERE union_id = '$cooperativeId') ORDER BY names");
    }
    if ($leon->num_rows > 0) {
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {
            $zoneMembers[] = $info;
        }
    }

    $members = $zoneMembers;
    $i = 0;
    $blocNumber = 0;
    foreach ($members as $info) {
        $i++;
        $id = $info['id'];
        $idno = $info['idno'];
        $lastname = $info['names'];
        $sex = $info['sex_id'];
        $groupId = $info['bloc'];
        $group = $zone = "";
        $coopId = $info["cooperative_id"];

        if ($groupId != 0) {
            $zoneId = fetchNow("Level_id", "combinations", "id = '$groupId'");
            $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");
            $group = fetchNow("Combination", "combinations", "id = '$groupId'");
        }

        $land = 0;
        $education = $info["education"];
        $pr = "";
        $dis = "";
        $sec = "";
        $akagari = "";
        $incomingdate = $info['datein'];
        $umuduguduId = $info['village_id'];
        $umudugudu = "";

        if ($umuduguduId != 0) {
            $cellCode = fetchNow("CellCode", "villages", "VillageId = $umuduguduId");
            $sectorCode = fetchNow("SectorCode", "cells", "CellCode = '$cellCode'");
            $districtCode = fetchNow("DistrictCode", "sectors", "SectorCode = '$sectorCode'");
            $provinceCode = fetchNow("ProvinceCode", "districts", "DistrictCode = '$districtCode'");

            $umudugudu = fetchNow("VillageName", "villages", "VillageId = $umuduguduId");
            $akagari = fetchNow("CellName", "cells", "CellCode = '$cellCode'");
            $sec = fetchNow("SectorName", "sectors", "SectorCode = '$sectorCode'");
            $dis = fetchNow("DistrictName", "districts", "DistrictCode = '$districtCode'");
            $pr = fetchNow("provincename", "provinces", "provincecode = '$provinceCode'");
        }

        $umugabane = $info['share'];
        $umwishingizi = fetchNow("names", "umwishingizi", "member_id = '$id'");
        $idumwishingizi = fetchNow("idno", "umwishingizi", "member_id = '$id'");

        $mituweli = $info["mituweli"];
        $amaf = $mituweli * 3000;
        $tel = $info["phone"];
        $bankId = $info["bank_id"];
        $bank = fetchNow("name", "banks", "id = '$bankId'");
        $account = $info["account"];

        $isanoId = fetchNow("isano_id", "umwishingizi", "member_id = '$id'");
        $isano = fetchNow("isano", "amasano", "id = '$isanoId'");
        $teaNber = $info["tea_nb"];

        $leon1 = $connect->query("SELECT * FROM imirima WHERE members_id='$id'");

        $plot = $zone1 = $ibiti = $blocId = $area = $pArea = $longitude = $latitude = $villageId = array();

        while ($info1 = $leon1->fetch_assoc()) {
            $iBloc = $info1["bloc"];
            $iZoneId = fetchNow("Level_id", "combinations", "id = $iBloc");
            $blocNumber++;
            $ploty = str_replace(" ", "&nbsp;", $info1["plot1"]);
            $plot[] = $ploty;
            $zone1[] = "";
            $ibiti[] = $info1['ibiti'];
            $blocId[] = $info1["bloc"];
            $area[] = $info1["area"];
            $pArea[] = $info1["production_area"];
            $longitude[] = $info1["longitude"];
            $latitude[] = $info1["latitude"];
            $villageId[] = $info1["village_id"];
        }

        $pic1 = $info['image'];
        $cooperativeName = fetchNow("name", "cooperatives", "id = '$coopId'");

        echo '<tr><th scope="row">' . $i . '</th>';
        if ($_SESSION["user_category_id"] == 3) {
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$coopId/$pic1' height='120' width='120'></td>";
        } else {
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
        }
        echo "<td align=center>$idno </td>";
        echo "<td align=center>$lastname </td>";
        if ($_SESSION["user_category_id"] == 3) {
            echo "<td align=center>$cooperativeName </td>";
        }

        $tot += $land;

        echo "<td align=center>$incomingdate</td>";
        // echo"<td align=center>$education </td>";
        echo "<td align=center>$zone</td>";
        echo "<td align=center>$group </td>";
        echo "<td align=center>$teaNber</td>";
        echo "<td align=center>$dis</td>";
        echo "<td align=center>$sec</td>";
        echo "<td align=center>$akagari</td>";
        echo "<td align=center>$umudugudu</td>";
        echo "<td align=center>$umugabane</td>";
        echo "<td align=center>$tel</td>";
        echo "<td align=center>$bank</td>";
        echo "<td align=center>$account</td>";
        echo "<td align=center>$umwishingizi</td>";
        echo "<td align=center>$idumwishingizi</td>";
        echo "<td align=center>$isano</td>";

        if ($coopType == 1) {
            echo "<td align=center>";
            $arrlength = count($plot);

            $j = 0;

            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $plotNb = $plot[$x];
                $farmIde = $farmId[$x];
                $simpleQuery = "UPDATE imirima SET plot1 = '$plotNb' WHERE id = '$farmIde'";
                if ($connect->query($simpleQuery) !== TRUE) {
                    echo "$plotNb<br>$connect->error";
                } else {
                    echo "$plotNb<br>";
                }
            }

            // echo"</td><td align=center>";
            /* $arrlength = count($plot);
                            $j=0;
                            for($x = 0; $x < $arrlength; $x++) {
                                $j++;
                                echo "$ibiti[$x] <br>"  ;
                            
                            } */
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$area[$x] <br>";
            }

            /* echo"</td><td align=center>";
                                $arrlength = count($plot);
                                $j=0;
                                for($x = 0; $x < $arrlength; $x++) {
                                $j++;
                                echo "$pArea[$x] <br>"  ;
                            
                            } */

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$longitude[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$latitude[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $zoneId = fetchNow("Level_id", "combinations", "id = '$blocId[$x]'");
                $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");
                echo "$zone <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $bloc = fetchNow("Combination", "combinations", "id = '$blocId[$x]'");
                echo "$bloc <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $cellCode = fetchNow("CellCode", "villages", "VillageId = $villageId[$x]");
                $cell = fetchNow("CellName", "cells", "CellCode = '$cellCode'");
                echo "$cell <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $village = fetchNow("VillageName", "villages", "VillageId = '$villageId[$x]'");
                echo "$village <br>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "
                </tbody>
            </table>
        ";
} else if ($type == "report" && $category == "zone") {
    $q = "";
    if (isset($_GET["q"])) {
        $q = $_GET["q"];
    }

    echo "
            <table id='example' class='table-striped table-hover table-bordered text-center text-bold-50' align=center>
                <thead class='thead bg-gradient-green text-black' align=center>
                    <tr>
                        <th colspan='19'>ABANYAMURYANGO</th>";
    if ($coopType == 1) {
        echo "<th colspan='11'>IMIRIMA</th>";
    }
    echo "
                    </tr>
                    <tr>
                        <th scope='col'>N&deg;</th>
                        <th scope='col'>Ifoto</th>
                        <th scope='col'>Irangamuntu</th>
                        <th scope='col'>Amazina Yombi</th>
                        <th scope='col'>Itariki yabereho Umunyamuryango</th>
                        <th scope='col'>Zone (Segiteri)</th>
                        <th scope='col'>Hangari (Block)</th>
                        <th scope='col'>N&deg; y' Icyayi</th>
                        <th scope='col'>Akarere</th>
                        <th scope='col'>Umurenge</th>
                        <th scope='col'>Akagali</th>
                        <th scope='col'>Umudugudu</th>
                        <th scope='col'>Umugabane</th>
                        <th scope='col'>Telefoni</th>
                        <th scope='col'>Banki</th>
                        <th scope='col'>Konti</th>
                        <th scope='col'>Umuzungura</th>
                        <th scope='col'>Indangamuntu y' Umuzungura</th>
                        <th scope='col'>Isano</th>";
    if ($coopType == 1) {
        echo "
                                <th scope='col'>N&deg; y' Umurima</th>
                                <th scope='col'>Ubuso</th>
                                <th scope='col'>Longitude</th>
                                <th scope='col'>Latitude</th>
                                <th scope='col'>Zone</th>
                                <th scope='col'>Hangari</th>
                                <th scope='col'>Akagari</th>
                                <th scope='col'>Umudugudu</th>
                            ";
    }
    echo "
                    </tr>
                </thead>
                <tbody style='font-weight: bold;'>
        ";

    $zoneMembers = [];
    $quer = "SELECT * FROM members WHERE bloc IN (SELECT id FROM combinations WHERE Level_id = '$q') ORDER BY bloc, names, `image` ASC";
    // echo $quer;
    $leon = $connect->query($quer);
    if ($leon->num_rows > 0) {
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {
            $zoneMembers[] = $info;
        }
    }

    $quer1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc IN (SELECT c.id FROM combinations c WHERE c.Level_id = '$q') AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id ORDER BY m.bloc, m.names ASC";
    $leon = $connect->query($quer1);
    if ($leon->num_rows > 0) {
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {
            $zoneMembers[] = $info;
        }
    }
    $members = unique_multidim_array($zoneMembers, "id");
    $i = 1;
    $blocNumber = 0;
    foreach ($members as $info) {
        $id = $info['id'];
        $idno = $info['idno'];
        $lastname = $info['names'];
        $sex = $info['sex_id'];
        $groupId = $info['bloc'];
        $group = $zone = "";

        if ($groupId != 0) {
            $zoneId = fetchNow("Level_id", "combinations", "id = '$groupId'");
            $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");
            $group = fetchNow("Combination", "combinations", "id = '$groupId'");
        }

        $land = 0;
        $education = $info["education"];
        $pr = "";
        $dis = "";
        $sec = "";
        $akagari = "";
        $incomingdate = $info['datein'];
        $umuduguduId = $info['village_id'];
        $umudugudu = "";

        if ($umuduguduId != 0) {
            $cellCode = fetchNow("CellCode", "villages", "VillageId = $umuduguduId");
            $sectorCode = fetchNow("SectorCode", "cells", "CellCode = '$cellCode'");
            $districtCode = fetchNow("DistrictCode", "sectors", "SectorCode = '$sectorCode'");
            $provinceCode = fetchNow("ProvinceCode", "districts", "DistrictCode = '$districtCode'");

            $umudugudu = fetchNow("VillageName", "villages", "VillageId = $umuduguduId");
            $akagari = fetchNow("CellName", "cells", "CellCode = '$cellCode'");
            $sec = fetchNow("SectorName", "sectors", "SectorCode = '$sectorCode'");
            $dis = fetchNow("DistrictName", "districts", "DistrictCode = '$districtCode'");
            $pr = fetchNow("provincename", "provinces", "provincecode = '$provinceCode'");
        }

        $umugabane = $info['share'];
        $umwishingizi = fetchNow("names", "umwishingizi", "member_id = '$id'");
        $idumwishingizi = fetchNow("idno", "umwishingizi", "member_id = '$id'");

        $mituweli = $info["mituweli"];
        $amaf = $mituweli * 3000;
        $tel = $info["phone"];
        $bankId = $info["bank_id"];
        $bank = fetchNow("name", "banks", "id = '$bankId'");
        $account = $info["account"];

        $isanoId = fetchNow("isano_id", "umwishingizi", "member_id = '$id'");
        $isano = fetchNow("isano", "amasano", "id = '$isanoId'");
        $teaNber = $info["tea_nb"];

        $leon1 = $connect->query("select * from imirima where members_id='$id' AND bloc IN (SELECT id FROM combinations WHERE Level_id = '$q')");

        $plot = $zone1 = $ibiti = $blocId = $area = $pArea = $longitude = $latitude = $villageId = $farmId = array();

        while ($info1 = $leon1->fetch_assoc()) {
            $farmId[] = $info1["id"];
            $iBloc = $info1["bloc"];
            $iZoneId = fetchNow("Level_id", "combinations", "id = $iBloc");
            $blocNumber++;
            $plot[] = getNextCode(2, $iZoneId) . " " . getNextCode(2, $iBloc) . " " . getNextCode(3, $blocNumber);
            $zone1[] = "";
            $ibiti[] = $info1['ibiti'];
            $blocId[] = $info1["bloc"];
            $area[] = $info1["area"];
            $pArea[] = $info1["production_area"];
            $longitude[] = $info1["longitude"];
            $latitude[] = $info1["latitude"];
            $villageId[] = $info1["village_id"];
        }

        $pic1 = $info['image'];

        echo '<tr><th scope="row">' . $i . '</th>';
        echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
        echo "<td align=center>$idno </td>";
        echo "<td align=center>$lastname </td>";


        $i++;
        $tot += $land;

        echo "<td align=center>$incomingdate</td>";
        // echo"<td align=center>$education </td>";
        echo "<td align=center>$zone</td>";
        echo "<td align=center>$group </td>";
        echo "<td align=center>$teaNber</td>";
        echo "<td align=center>$dis </td>";
        echo "<td align=center>$sec</td>";
        echo "<td align=center>$akagari</td>";
        echo "<td align=center>$umudugudu</td>";
        echo "<td align=center>$umugabane</td>";
        echo "<td align=center>$tel</td>";
        echo "<td align=center>$bank</td>";
        echo "<td align=center>$account</td>";
        echo "<td align=center>$umwishingizi</td>";
        echo "<td align=center>$idumwishingizi</td>";
        echo "<td align=center>$isano</td>";
        if ($coopType == 1) {
            echo "<td align=center>";
            $arrlength = count($plot);

            $j = 0;

            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $plotNb = $plot[$x];
                $farmIde = $farmId[$x];
                $simpleQuery = "UPDATE imirima SET plot1 = '$plotNb' WHERE id = '$farmIde'";
                if ($connect->query($simpleQuery) !== TRUE) {
                    echo "$plotNb<br>$connect->error";
                } else {
                    echo "$plotNb<br>";
                }
            }

            // echo"</td><td align=center>";
            /* $arrlength = count($plot);
                            $j=0;
                            for($x = 0; $x < $arrlength; $x++) {
                                $j++;
                                echo "$ibiti[$x] <br>"  ;
                            
                            } */
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$area[$x] <br>";
            }

            /* echo"</td><td align=center>";
                                $arrlength = count($plot);
                                $j=0;
                                for($x = 0; $x < $arrlength; $x++) {
                                $j++;
                                echo "$pArea[$x] <br>"  ;
                            
                            } */

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$longitude[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$latitude[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $zoneId = fetchNow("Level_id", "combinations", "id = '$blocId[$x]'");
                $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");
                echo "$zone <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $bloc = fetchNow("Combination", "combinations", "id = '$blocId[$x]'");
                echo "$bloc <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $cellCode = fetchNow("CellCode", "villages", "VillageId = $villageId[$x]");
                $cell = fetchNow("CellName", "cells", "CellCode = '$cellCode'");
                echo "$cell <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                $village = fetchNow("VillageName", "villages", "VillageId = '$villageId[$x]'");
                echo "$village <br>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "
                </tbody>
            </table>
        ";
} else if ($type == "report" && $category == "hangar") {
    $q = "";
    $sql = "";
    if (isset($_GET["q"])) {
        $q = $_GET["q"];
        $sql = "SELECT * FROM members WHERE bloc = '$q' ORDER BY bloc, names ASC";
    }

    $sexId = 0;
    if (isset($_GET["gender"])) {
        $gender = $_GET["gender"];
        $sexId = fetchNow("id", "sexes", "sex = '$gender'");
        $sql = "SELECT * FROM members WHERE bloc = '$q' AND sex_id = '$sexId' ORDER BY bloc, names ASC";
    }

    if (isset($_GET["age"])) {
        $age = $_GET["age"];
        $under18Year = date("Y", strtotime("-18 years"));
        $under35Year = date("Y", strtotime("-35 years"));
        $under55Year = date("Y", strtotime("-55 years"));
        if ($age == "under-18") {
            $sql = "SELECT * FROM members WHERE bloc = '$q' AND year_of_birth > $under18Year ORDER BY bloc, names ASC";
        } else if ($age == "18-35") {
            $sql = "SELECT * FROM members WHERE bloc = '$q' AND year_of_birth <= $under18Year AND year_of_birth >= $under35Year ORDER BY bloc, names ASC";
        } else if ($age == "36-55") {
            $sql = "SELECT * FROM members WHERE bloc = '$q' AND year_of_birth < $under35Year AND year_of_birth >= $under55Year ORDER BY bloc, names ASC";
        } else if ($age == "over-55") {
            $sql = "SELECT * FROM members WHERE bloc = '$q' AND year_of_birth < $under55Year ORDER BY bloc, names ASC";
        }
    }

    $sql1 = "";
    if (isset($_GET["q"])) {
        $q = $_GET["q"];
        $sql1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc = '$q' AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id ORDER BY m.bloc, m.names ASC";
    }

    $sexId = 0;
    if (isset($_GET["gender"])) {
        $gender = $_GET["gender"];
        $sexId = fetchNow("id", "sexes", "sex = '$gender'");
        $sql1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc = '$q' AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id AND m.sex_id = '$sexId' ORDER BY m.bloc, m.names ASC";
    }

    if (isset($_GET["age"])) {
        $age = $_GET["age"];
        $under18Year = date("Y", strtotime("-18 years"));
        $under35Year = date("Y", strtotime("-35 years"));
        $under55Year = date("Y", strtotime("-55 years"));
        if ($age == "under-18") {
            $sql1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc = '$q' AND m.year_of_birth > $under18Year AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id ORDER BY m.bloc, m.names ASC";
        } else if ($age == "18-35") {
            $sql1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc = '$q' AND m.year_of_birth <= $under18Year AND m.year_of_birth >= $under35Year AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id ORDER BY m.bloc, m.names ASC";
        } else if ($age == "36-55") {
            $sql1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc = '$q' AND m.year_of_birth < $under35Year AND m.year_of_birth >= $under55Year AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id ORDER BY m.bloc, m.names ASC";
        } else if ($age == "over-55") {
            $sql1 = "SELECT i.members_id, m.* FROM imirima i INNER JOIN members m ON i.members_id = m.id WHERE i.bloc = '$q' AND m.year_of_birth < $under55Year AND m.cooperative_id = '$cooperativeId' GROUP BY i.members_id ORDER BY m.bloc, m.names ASC";
        }
    }

    echo "
            <table id='example' class='table-striped table-hover table-bordered text-center text-bold-50' align=center>
                <thead class='thead bg-gradient-green text-black' align=center>
                    <tr>
                        <th colspan='19'>ABANYAMURYANGO</th>";
    if ($coopType == 1) {
        echo "<th colspan='11'>IMIRIMA</th>";
    }
    echo "
                    </tr>
                    <tr>
                        <th scope='col'>N&deg;</th>
                        <th scope='col'>Ifoto</th>
                        <th scope='col'>Irangamuntu</th>
                        <th scope='col'>Amazina Yombi</th>
                        <th scope='col'>Itariki yabereho Umunyamuryango</th>
                        <th scope='col'>Zone (Segiteri)</th>
                        <th scope='col'>Hangar (Block)</th>
                        <th scope='col'>N&deg; y' Icyayi</
                        
                        th>
                        <th scope='col'>Akarere</th>
                        <th scope='col'>Umurenge</th>
                        <th scope='col'>Akagali</th>
                        <th scope='col'>Umudugudu</th>
                        <th scope='col'>Umugabane</th>
                        <th scope='col'>Telefoni</th>
                        <th scope='col'>Banki</th>
                        <th scope='col'>Konti</th>
                        <th scope='col'>Umuzungura</th>
                        <th scope='col'>Indangamuntu y' Umuzungura</th>
                        <th scope='col'>Isano</th>";
    if ($coopType == 1) {
        echo "
                                <th scope='col'>N&deg; y' Umurima</th>
                                <th scope='col'>Ubuso</th>
                                <th scope='col'>Longitude</th>
                                <th scope='col'>Latitude</th>
                                <th scope='col'>Zone</th>
                                <th scope='col'>Hangari</th>
                                <th scope='col'>Akagari</th>
                                <th scope='col'>Umudugudu</th>
                            ";
    }
    echo "
                    </tr>
                </thead>
                <tbody style='font-weight: bold;'>
        ";

    $zoneMembers = [];
    $leon = $connect->query($sql);
    if ($leon->num_rows > 0) {
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {
            $zoneMembers[] = $info;
        }
    }

    $leon = $connect->query($sql1);
    if ($leon->num_rows > 0) {
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {
            $zoneMembers[] = $info;
        }
    }
    $members = unique_multidim_array($zoneMembers, "id");
    if (count($members) > 0) {
        $i = 1;
        $tot = 0;
        $blocNumber = 0;
        foreach ($members as $info) {
            $id = $info['id'];
            $idno = $info['idno'];
            $lastname = $info['names'];
            $sex = $info['sex_id'];
            $groupId = $info['bloc'];
            $group = $zone = "";

            if ($groupId != 0) {
                $zoneId = fetchNow("Level_id", "combinations", "id = '$groupId'");
                $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");
                $group = fetchNow("Combination", "combinations", "id = '$groupId'");
            }

            $land = 0;
            $education = $info["education"];
            $pr = "";
            $dis = "";
            $sec = "";
            $akagari = "";
            $incomingdate = $info['datein'];
            $umuduguduId = $info['village_id'];
            $umudugudu = "";

            if ($umuduguduId != 0) {
                $cellCode = fetchNow("CellCode", "villages", "VillageId = $umuduguduId");
                $sectorCode = fetchNow("SectorCode", "cells", "CellCode = '$cellCode'");
                $districtCode = fetchNow("DistrictCode", "sectors", "SectorCode = '$sectorCode'");
                $provinceCode = fetchNow("ProvinceCode", "districts", "DistrictCode = '$districtCode'");

                $umudugudu = fetchNow("VillageName", "villages", "VillageId = $umuduguduId");
                $akagari = fetchNow("CellName", "cells", "CellCode = '$cellCode'");
                $sec = fetchNow("SectorName", "sectors", "SectorCode = '$sectorCode'");
                $dis = fetchNow("DistrictName", "districts", "DistrictCode = '$districtCode'");
                $pr = fetchNow("provincename", "provinces", "provincecode = '$provinceCode'");
            }

            $umugabane = $info['share'];
            $umwishingizi = fetchNow("names", "umwishingizi", "member_id = '$id'");
            $idumwishingizi = fetchNow("idno", "umwishingizi", "member_id = '$id'");

            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["phone"];
            $bankId = $info["bank_id"];
            $bank = fetchNow("name", "banks", "id = '$bankId'");
            $account = $info["account"];

            $isanoId = fetchNow("isano_id", "umwishingizi", "member_id = '$id'");
            $isano = fetchNow("isano", "amasano", "id = '$isanoId'");
            $teaNber = $info["tea_nb"];

            $leon1 = $connect->query("SELECT * FROM imirima WHERE members_id='$id' AND bloc = '$q'");
            $plot = $zone1 = $ibiti = $blocId = $area = $pArea = $longitude = $latitude = $villageId = array();

            while ($info1 = $leon1->fetch_assoc()) {
                $iBloc = $info1["bloc"];
                $iZoneId = fetchNow("Level_id", "combinations", "id = $iBloc");
                $blocNumber++;
                $plot[] = getNextCode(2, $iZoneId) . " " . getNextCode(2, $iBloc) . " " . getNextCode(3, $blocNumber);
                $zone1[] = "";
                $ibiti[] = $info1['ibiti'];
                $blocId[] = $info1["bloc"];
                $area[] = $info1["area"];
                $pArea[] = $info1["production_area"];
                $longitude[] = $info1["longitude"];
                $latitude[] = $info1["latitude"];
                $villageId[] = $info1["village_id"];
            }

            $pic1 = $info['image'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            // echo"<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group</td>";
            echo "<td align=center>$teaNber</td>";
            echo "<td align=center>$dis</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$bank</td>";
            echo "<td align=center>$account</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";

            if ($coopType == 1) {
                echo "<td align=center>";
                $arrlength = count($plot);

                $j = 0;

                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    $plotNb = $plot[$x];
                    $farmIde = $farmId[$x];
                    $simpleQuery = "UPDATE imirima SET plot1 = '$plotNb' WHERE id = '$farmIde'";
                    if ($connect->query($simpleQuery) !== TRUE) {
                        echo "$plotNb<br>$connect->error";
                    } else {
                        echo "$plotNb<br>";
                    }
                }

                // echo"</td><td align=center>";
                /* $arrlength = count($plot);
                            $j=0;
                            for($x = 0; $x < $arrlength; $x++) {
                                $j++;
                                echo "$ibiti[$x] <br>"  ;
                            
                            } */
                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    echo "$area[$x] <br>";
                }

                /* echo"</td><td align=center>";
                                $arrlength = count($plot);
                                $j=0;
                                for($x = 0; $x < $arrlength; $x++) {
                                $j++;
                                echo "$pArea[$x] <br>"  ;
                            
                            } */

                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    echo "$longitude[$x] <br>";
                }

                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    echo "$latitude[$x] <br>";
                }

                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    $zoneId = fetchNow("Level_id", "combinations", "id = '$blocId[$x]'");
                    $zone = fetchNow("Level", "levels", "Level_id = '$zoneId'");
                    echo "$zone <br>";
                }
                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    $bloc = fetchNow("Combination", "combinations", "id = '$blocId[$x]'");
                    echo "$bloc <br>";
                }
                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    $cellCode = fetchNow("CellCode", "villages", "VillageId = $villageId[$x]");
                    $cell = fetchNow("CellName", "cells", "CellCode = '$cellCode'");
                    echo "$cell <br>";
                }
                echo "</td><td align=center>";
                $arrlength = count($plot);
                $j = 0;
                for ($x = 0; $x < $arrlength; $x++) {
                    $j++;
                    $village = fetchNow("VillageName", "villages", "VillageId = '$villageId[$x]'");
                    echo "$village <br>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
    }
    echo "
                </tbody>
            </table>
        ";
} else if ($type == "report" && $category == "district") {
    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";
        //mysql_select_db("tea");
        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $districtCode = $_GET["target"];

    $district = fetcher("DistrictName", "districts", "DistrictCode", $districtCode);

    $leon = $connect->query("select * from members WHERE akarere = '$district' order by zone,bloc asc");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover' align=center><thead class='thead bg-gradient-green text-white' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
        <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone</th><th scope='col'>Itsinda</th><th scope='col'>District</th>
        <th scope='col'>Sector</th>
        <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Ibiti</th><th scope='col'>Umukono</th>

        </tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "report" && $category == "sector") {
    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";
        //mysql_select_db("tea");
        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $sectorCode = $_GET["target"];

    $sector = fetcher("SectorName", "sectors", "SectorCode", $sectorCode);

    $leon = $connect->query("select * from members WHERE umurenge = '$sector' order by zone,bloc asc");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover' align=center><thead class='thead bg-gradient-green text-white' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
        <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone</th><th scope='col'>Itsinda</th><th scope='col'>District</th>
        <th scope='col'>Sector</th>
        <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Ibiti</th><th scope='col'>Umukono</th>

        </tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "report" && $category == "cell") {
    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";
        //mysql_select_db("tea");
        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $cellCode = $_GET["target"];

    $cell = fetcher("CellName", "cells", "CellCode", $cellCode);

    $leon = $connect->query("select * from members WHERE akagari = '$cell' order by zone,bloc asc");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover' align=center><thead class='thead bg-gradient-green text-white' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
    <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone</th><th scope='col'>Itsinda</th><th scope='col'>District</th>
    <th scope='col'>Sector</th>
    <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Ibiti</th><th scope='col'>Umukono</th>

    </tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "report" && $category == "village") {
    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";
        //mysql_select_db("tea");
        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $VillageId = $_GET["target"];

    $village = fetcher("VillageName", "villages", "VillageId", $VillageId);

    $leon = $connect->query("select * from members WHERE umudugudu = '$village' order by zone,bloc asc");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover' align=center><thead class='thead bg-gradient-green text-white' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
    <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone</th><th scope='col'>Itsinda</th><th scope='col'>District</th>
    <th scope='col'>Sector</th>
    <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Ibiti</th><th scope='col'>Umukono</th>

    </tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "report" && $category == "gender" && ($_GET["target"] == "GABO" || $_GET["target"] == "GORE")) {
    $sex = $_GET["target"];
    $leon = $connect->query("select * from members WHERE sex = '$sex' order by zone,bloc asc");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover' align=center><thead class='thead bg-gradient-green text-white' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
    <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone</th><th scope='col'>Itsinda</th><th scope='col'>District</th>
    <th scope='col'>Sector</th>
    <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Ibiti</th><th scope='col'>Umukono</th>

    </tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "ifumbire") {
    $sql = "SELECT members.idno, members.names, imirima.ibiti FROM members, imirima WHERE members.idno = '" . $_GET["q"] . "' AND imirima.plotno = '" . $_GET["plotno"] . "'";
    $result = $connect->query($sql);
    $today = date("Y-m-d");
    $zone = $_GET["zone"];

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group mb-3">
                                    <label for="inputState">Amazina Yombi</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                        </div>
                                        <input class="form-control" name="namesIfumbire" value="' . $row["names"] . '"value="" placeholder="Amazina Yombi" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input class="form-control" name="idnoIfumbire" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Ubwoko bw\' Ifumbire</label>
                                    <div class="input-group input-group-alternative">
                                        <select name="ubwokoIfumbire" id="ubwokoIfumbire" class="form-control form-control-alternative" required>
                                            <option></option>';
        $ifumbireSql = "SELECT * FROM pricev WHERE status = 'ifumbire'";
        $ifumbireResult = $connect->query($ifumbireSql);

        if ($ifumbireResult->num_rows > 0) {
            while ($ifumbireRow = $ifumbireResult->fetch_assoc()) {
                echo '<option value="' . $ifumbireRow["id"] . '">' . $ifumbireRow["chargename"] . '</option>';
            }
        }
        echo '</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="ingano" placeholder="Ingano Mu Biro" type="number" value="' . $row["ibiti"] * 0.028 . '" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="id" name="id" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki Yafatiyeho Ifumbire</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="date" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yafatiyeho Ifumbire" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColIfumbire" class="col-sm-12">
                            <button id="saveIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveIfumbireBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveIfumbireBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColIfumbire" class="col-sm-4" hidden>
                            <button id="savedIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedIfumbireBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>';
    }
} else if ($type == "imbuto") {
    $sql = "SELECT members.idno, members.names, imirima.ibiti FROM members, imirima WHERE members.idno = '" . $_GET["q"] . "' AND imirima.plotno = '" . $_GET["plotno"] . "'";
    $result = $connect->query($sql);
    $today = date("Y-m-d");
    $zone = $_GET["zone"];

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group mb-3">
                                    <label for="inputState">Amazina Yombi</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                        </div>
                                        <input class="form-control" name="namesIfumbire" value="' . $row["names"] . '"value="" placeholder="Amazina Yombi" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input class="form-control" name="idnoIfumbire" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Ubwoko bw\' Imbuto</label>
                                    <div class="input-group input-group-alternative">
                                        <select name="ubwokoIfumbire" id="ubwokoIfumbire" class="form-control form-control-alternative" required>
                                            <option></option>';
        $ifumbireSql = "SELECT * FROM pricev WHERE status = 'imbuto'";
        $ifumbireResult = $connect->query($ifumbireSql);

        if ($ifumbireResult->num_rows > 0) {
            while ($ifumbireRow = $ifumbireResult->fetch_assoc()) {
                echo '<option value="' . $ifumbireRow["id"] . '">' . $ifumbireRow["chargename"] . '</option>';
            }
        }
        echo '</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="inputState">Umubare w\' Ingemwe</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="ingano" placeholder="Umubare w\' Ingemwe" type="number" value="' . $row["ibiti"] * 0.028 . '" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="id" name="id" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki Yafatiyeho Ifumbire</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="date" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yafatiyeho Ifumbire" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColIfumbire" class="col-sm-12">
                            <button id="saveIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveIfumbireBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveIfumbireBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColIfumbire" class="col-sm-4" hidden>
                            <button id="savedIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedIfumbireBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>';
    }
} else if ($type == "umusaruro") {
    $zone = $_GET["zone"];
    $sql = "SELECT *  FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);
    //print_r($_GET);
    $today = date("Y-m-d");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group mb-3">
                                    <label for="inputState">Amazina Yombi</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                        </div>
                                        <input class="form-control" name="namesUmusaruro" value="' . $row["names"] . '" placeholder="Amazina Yombi" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input class="form-control" name="idnoUmusaruro" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Ubwoko bw\' Umusaruro</label>
                                    <div class="input-group input-group-alternative">
                                        <select name="ubwokoUmusaruro" id="ubwokoUmusaruro" class="form-control form-control-alternative" required>
                                            <option></option>';
        $umusaruroSql = "SELECT * FROM pricev WHERE status = 'umusaruro'";
        $umusaruroResult = $connect->query($umusaruroSql);

        if ($umusaruroResult->num_rows > 0) {
            while ($umusaruroRow = $umusaruroResult->fetch_assoc()) {
                echo '<option value="' . $umusaruroRow["id"] . '">' . $umusaruroRow["chargename"] . '</option>';
            }
        }
        echo '</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="inganoUmusaruro" placeholder="Ingano Mu Biro" type="number" value="' . $row["ibiti"] * 0.028 . '" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="idUmusaruro" name="idUmusaruro" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki Yatangiyeho Umusaruro</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="dateUmusaruro" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yatangiyeho Umusaruro" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColUmusaruro" class="col-sm-12">
                            <button id="saveUmusaruroBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveUmusaruroBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveUmusaruroBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColUmusaruro" class="col-sm-4" hidden>
                            <button id="savedUmusaruroBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedUmusaruroBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            ';
    }
} else if ($type == "umusaruroedit") {
    $zone = $_GET["zone"];
    $sql = "SELECT *  FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);
    //print_r($_GET);
    $today = date("Y-m-d");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group mb-3">
                                    <label for="inputState">Amazina Yombi</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                        </div>
                                        <input class="form-control" name="namesUmusaruro" value="' . $row["names"] . '" placeholder="Amazina Yombi" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input class="form-control" name="idnoUmusaruro" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Ubwoko bw\' Umusaruro</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input class="form-control" name="ubwokoUmusaruro" id="ubwokoUmusaruro" placeholder="Ubwoko bw\' Umusaruro" type="text" value="' . $row["names"] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="inganoUmusaruro" placeholder="Ingano Mu Biro" type="number" value="' . $row["ibiti"] * 0.028 . '" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="idUmusaruro" name="idUmusaruro" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki Yatangiyeho Umusaruro</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="dateUmusaruro" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yatangiyeho Umusaruro" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColUmusaruro" class="col-sm-12">
                            <button id="saveUmusaruroBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveUmusaruroBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveUmusaruroBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColUmusaruro" class="col-sm-4" hidden>
                            <button id="savedUmusaruroBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedUmusaruroBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            ';
    }
} else if ($type == "amadeni") {
    $sql = "SELECT *  FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);
    $today = date("Y-m-d");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group mb-3 focused">
                        <label for="inputState">Amazina Yombi</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                            </div>
                            <input class="form-control" name="namesAmadeni" value="' . $row["names"] . '"value="" placeholder="Amazina Yombi" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Nimero y\' Indangamuntu</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                            </div>
                            <input class="form-control" name="idnoAmadeni" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Inkomoko y\' Ideni</label>
                        <div class="input-group input-group-alternative">
                            <select class="form-control form-control-alternative" onclick="checkList(this.value);" required>
                                <option></option>
                                <option>Cooperative</option>
                                <option>Bank</option>
                                <option>Uruganda</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Izina ry\' Aho Ryatangiwe</label>
                        <div class="input-group input-group-alternative">
                            <select name="fromIdeni" id="fromIdeni" class="form-control form-control-alternative" required readonly>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Ubwoko bw\' Ideni</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="ubwokoAmadeni" placeholder="Ubwoko bw\' Ideni" value="IFUMBIRE KUGERA 2018" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Ideni FRW</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="inganoAmadeni" placeholder="Ikiguzi" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="idAmadeni" name="id" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="dateAmadeni" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yafatiyeho Ifumbire" type="date" value="' . $today . '" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColAmadeni" class="col-sm-12">
                            <button id="saveAmadeniBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveAmadeniBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveAmadeniBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColAmadeni" class="col-sm-4" hidden>
                            <button id="savedAmadeniBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedAmadeniBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>';
    }
} else if ($type == "amadeniupdate") {
    $sql = "SELECT *  FROM members WHERE idno = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group mb-3 focused">
                        <label for="inputState">Amazina Yombi</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                            </div>
                            <input class="form-control" name="namesAmadeni" value="' . $row["names"] . '"value="" placeholder="Amazina Yombi" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Nimero y\' Indangamuntu</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                            </div>
                            <input class="form-control" name="idnoAmadeni" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Aho Ryatangiwe</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                            </div>
                            <input class="form-control" name="fromIdeni" placeholder="Aho Ryatangiwe" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Ubwoko bw\' Ideni</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-archive"></i></span>
                            </div>
                            <input class="form-control" name="ubwokoAmadeni" placeholder="Ubwoko bw\' Ideni" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Umubare w\' Amafaranga</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="inganoAmadeni" placeholder="Umubare w\' Amafaranga" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Id</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="idAmadeni" name="id" placeholder="Id" value="' . $_GET["id"] . '" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="dateAmadeni" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yafatiyeho Ifumbire" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColAmadeni" class="col-sm-12">
                            <button id="saveAmadeniBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveAmadeniBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveAmadeniBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColAmadeni" class="col-sm-4" hidden>
                            <button id="savedAmadeniBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedAmadeniBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>';
    }
} else if ($type == "imbutoedit") {
    $sql = "SELECT members.idno, members.names AS mnames, imbuto.names AS names, imbuto.quantity, imbuto.date FROM members, imbuto WHERE imbuto.id = '" . $_GET["q"] . "' AND members.idno = imbuto.idno";
    $result = $connect->query($sql);
    $zone = $_GET["zone"];

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group mb-3">
                                    <label for="inputState">Amazina Yombi</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                        </div>
                                        <input class="form-control" name="namesIfumbire" value="' . $row["mnames"] . '"value="" placeholder="Amazina Yombi" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Nimero y\' Indangamuntu</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input class="form-control" name="idnoIfumbire" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="inputState">Ubwoko bw\' Ifumbire</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                        </div>
                                        <input class="form-control" name="ubwokoIfumbire" id="ubwokoIfumbire" placeholder="Ubwoko" type="text" value="' . $row["names"] . '" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="ingano" placeholder="Ingano Mu Biro" type="number" value="' . $row["quantity"] . '" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="id" name="id" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki Yafatiyeho Ifumbire</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="date" name="entrydate" class="form-control form-control-alternative datepicker" value="' . $row["date"] . '" placeholder="Itariki Yafatiyeho Ifumbire" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColIfumbire" class="col-sm-12">
                            <button id="saveIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveIfumbireBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveIfumbireBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColIfumbire" class="col-sm-4" hidden>
                            <button id="savedIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedIfumbireBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>';
    }
} else if ($type == "report" && $category == "zone") {

    $zone = $_GET["target"];

    //$village = fetcher("VillageName", "villages", "VillageId", $VillageId);

    $leon = $connect->query("select * from members WHERE zone = '$zone' order by names asc");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover table-bordered border-darker' align=center><thead class='thead bg-gradient-green text-black' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
    <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone (Segiteri)</th><th scope='col'>Hangar (Block)</th><th scope='col'>District</th>
    <th scope='col'>Sector</th>
    <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>No ya Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Zone</th><th scope='col'>Umukono</th>

    </tr></thead><tbody style='font-weight: bold;'>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='140' width='140'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "report" && $category == "zonegender") {

    $zone = $_GET["target"];
    $gender = $_GET["gender"];

    //$village = fetcher("VillageName", "villages", "VillageId", $VillageId);

    $leon = $connect->query("SELECT * FROM members WHERE zone = '$zone' AND sex = '$gender' ORDER BY zone, bloc ASC");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ("<table class='table-striped table-hover' align=center><thead class='thead bg-gradient-green text-white' align=center><tr><th scope='col'>No</th><th scope='col'>Ifoto</th><th scope='col'>Irangamuntu</th><th scope='col'>Amazina Yombi</th>
    <th scope='col'>Itariki yabereho Umunyamuryango</th><th scope='col'>Amashuli Yize</th><th scope='col'>Zone</th><th scope='col'>Itsinda</th><th scope='col'>District</th>
    <th scope='col'>Sector</th>
    <th scope='col'>Akagali</th><th scope='col'>Village</th><th scope='col'>Mituweli</th><th scope='col'>Amafaranga Ya Mituweli</th><th scope='col'>Kode</th><th scope='col'>Umugabane</th><th scope='col'>Telefoni</th><th scope='col'>Umuzungura</th><th scope='col'>Indangamuntu y' Umuzungura</th><th scope='col'>Isano</th><th scope='col'>Parcel</th><th scope='col'>Ibiti</th><th scope='col'>Ibiti</th><th scope='col'>Umukono</th>

    </tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $id = $info['id'];

            $idno = $info['idno'];
            // $firstname=$info['first_name'];
            $lastname = $info['names'];
            $sex = $info['sex'];
            $group = $info['bloc'];
            $land = $info['landsize'];
            $zone = $info['zone'];
            $education = $info["amashuli"];
            //$bank=$info['bank'];
            //  $account=$info['account'];
            //  $bdate=$info['bdate'];



            $pr = $info['intara'];
            $dis = $info['akarere'];
            $sec = $info['umurenge'];
            $akagari = $info['akagari'];
            $incomingdate = $info['datein'];
            $umudugudu = $info['umudugudu'];
            $umugabane = $info['umugabane'];
            $umwishingizi = $info['umwishingizi'];
            $idumwishingizi = $info['idumwishingizi'];
            $mituweli = $info["mituweli"];
            $amaf = $mituweli * 3000;
            $tel = $info["tel"];
            $isano = $info["isano"];
            $leon1 = $connect->query("select * from imirima where idno='$idno' group by plotno");
            $plot = $zone1 = $ibiti = array();
            while ($info1 = $leon1->fetch_assoc()) {

                $plot[] = $info1['plotno'];
                $zone1[] = $info1['zone'];
                $ibiti[] = $info1['ibiti'];
            }


            $pic1 = $info['images'];

            echo '<tr><th scope="row">' . $i . '</th>';
            echo "<td align=right><img class='rounded-circle img-circle' src='images/$cooperativeId/$pic1' height='120' width='120'></td>";
            echo "<td align=center>$idno </td>";
            echo "<td align=center>$lastname </td>";


            $i++;
            $tot += $land;

            echo "<td align=center>$incomingdate</td>";
            echo "<td align=center>$education </td>";
            echo "<td align=center>$zone</td>";
            echo "<td align=center>$group </td>";

            echo "<td align=center>$dis </td>";
            //// echo"<td align=center>$group</td>";
            //echo"<td align=center>$land</td>";
            echo "<td align=center>$sec</td>";
            echo "<td align=center>$akagari</td>";
            echo "<td align=center>$umudugudu</td>";
            echo "<td align=center>$mituweli</td>";
            echo "<td align=center>$amaf</td>";
            echo "<td align=center>$id</td>";
            echo "<td align=center>$umugabane</td>";
            echo "<td align=center>$tel</td>";
            echo "<td align=center>$umwishingizi</td>";
            echo "<td align=center>$idumwishingizi</td>";
            echo "<td align=center>$isano</td>";
            echo "<td align=center>";


            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo "$plot[$x] <br>";
            }
            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $ibiti[$x] <br>";
            }

            echo "</td><td align=center>";
            $arrlength = count($plot);
            $j = 0;
            for ($x = 0; $x < $arrlength; $x++) {
                $j++;
                echo " $zone1[$x] <br>";
            }
        }
        echo ("</tbody></table>");
    }
} else if ($type == "report" && $category == "ifumbire") {
    $idno = $_GET['q'];
    $names = $_GET['names'];
    $leon = $connect->query("SELECT * FROM ifumbire WHERE idno = '$idno'");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ('<div class="modal-header">
<h6 class="modal-title" id="modal-title-default"></h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>

<div class="modal-body">
<div class="container-fluid">' . "<table class='table table-striped'><thead class='thead-dark'>
<tr><th>No</th><th>Irangamuntu</th><th>Amazina</th><th>Ibiro</th><th>Itariki</th><th>Zone</th>
</tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $idno = $info['idno'];
            $id = $info['id'];
            $weight = $info['quantity'];
            $zone = $info['zone'];
            $date = $info['date'];
            $i++;
            print("<tr>
<td>$i</td><td>$idno</td><td>$names</td>

<td>$weight</td><td>$date</td><td>$zone</td></tr>");
        }
        echo ("</tbody></table></div></div>");
    }
} else if ($type == "report" && $category == "umusaruro") {
    $idno = $_GET['q'];
    $names = $_GET['names'];
    $leon = $connect->query("SELECT * FROM umusaruro WHERE idno = '$idno'");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ('<div class="modal-header">
<h6 class="modal-title" id="modal-title-default"></h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>

<div class="modal-body">
<div class="container-fluid">' . "<table class='table table-striped'><thead class='thead-dark'>
<tr><th>No</th><th>Irangamuntu</th><th>Amazina</th><th>Ibiro</th><th>Itariki</th><th>Zone</th>
</tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $idno = $info['idno'];
            $id = $info['id'];
            $weight = $info['quantity'];
            $zone = $info['zone'];
            $date = $info['date'];
            $i++;
            print("<tr>
<td>$i</td><td>$idno</td><td>$names</td>

<td>$weight</td><td>$date</td><td>$zone</td></tr>");
        }
        echo ("</tbody></table></div></div>");
    }
} else if ($type == "report" && $category == "imirima") {
    $idno = $_GET['q'];
    $names = $_GET['names'];
    $leon = $connect->query("select * from imirima where idno='$idno'");
    $count = $leon->num_rows;
    if ($count == 0) {
        echo "There is no member registered yet ";
    } else {

        echo ('<div class="modal-header">
<h6 class="modal-title" id="modal-title-default"></h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>

<div class="modal-body">
<div class="container-fluid">' . "<table class='table table-striped'><thead class='thead-dark'>
<tr><th>No</th><th>IDNO</th><th>Names</th><th>ZONE</th><th>LAND SIZE</th><th>IBITI</th>
</tr></thead><tbody>");
        $i = 1;
        $tot = 0;
        while ($info = $leon->fetch_assoc()) {

            $idno = $info['idno'];
            $id = $info['id'];
            $land = $info['ubuso'];
            $zone = $info['zone'];
            $ibiti = $info['ibiti'];
            $i++;
            print("<tr>
<td>$i</td><td>$idno</td><td>$names</td>

<td>$zone</td><td>$land</td><td>$ibiti</td></tr>");
        }
        echo ("</tbody></table></div></div>");
    }
} else if ($type == "ifumbireedit") {
    $sql = "SELECT * FROM ifumbire WHERE id = '" . $_GET["q"] . "'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
            <form>
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Andika</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group mb-3 focused">
                        <label for="inputState">Amazina Yombi</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                            </div>
                            <input class="form-control" name="namesIfumbire" placeholder="Amazina Yombi" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Nimero y\' Indangamuntu</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                            </div>
                            <input class="form-control" name="idnoIfumbire" placeholder="Nimero y\' Indangamuntu" type="text" value="' . $row["idno"] . '" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Ubwoko bw\' Ifumbire</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="ubwokoIfumbire" id="ubwokoIfumbire" placeholder="Ubwoko bw\' Ifumbire" type="text" value="' . $row["names"] . '">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" name="ingano" placeholder="Ingano Mu Biro" type="number" value="' . $row["quantity"] . '" min="0">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="inputState">Ingano Mu Biro</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                            </div>
                            <input class="form-control" id="id" name="id" placeholder="Ingano Mu Biro" type="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Itariki Yafatiyeho Ifumbire</label>
                        <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                            </div>
                            <input id="date" name="entrydate" class="form-control form-control-alternative datepicker" placeholder="Itariki Yafatiyeho Ifumbire" type="date" required>
                        </div>
                    </div>
                    <div id="alert" class="mt-4">
                    </div>
                    <div class="row text-center">
                        <div id="sendColIfumbire" class="col-sm-12">
                            <button id="saveIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="save()" type="button">
                                <span class="btn-inner--icon">
                                    <i id="saveIfumbireBtnIcon" class="fa fa-save"></i>
                                </span>
                                <span id="saveIfumbireBtnTxt" class="btn-inner--text">Bika Amakuru</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                        <div id="passColIfumbire" class="col-sm-4" hidden>
                            <button id="savedIfumbireBtn" class="btn btn-icon btn-3 btn-primary btn-block ld-ext-right" onclick="dismiss();" type="button">
                                <span id="savedIfumbireBtnTxt" class="btn-inner--text">Komeza</span>
                                <span class="btn-inner--icon">
                                    <i  class="fa fa-arrow-right"></i>
                                </span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>';
    }
} else if ($type == "reportall") {
    $zone = $_GET["zone"];
    $season = $_GET["season"];

    echo ('
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>NO</th>
                    <th colspan="2">UMUNYAMURYANGO</th>');

    $season = $_GET["season"];
    $tableColumns = array();

    $sql = "SELECT * FROM pricev WHERE status = 'ifumbire' AND season = '$season'";
    $result = $connect->query($sql);
    $count = $result->num_rows + 1;

    if ($count > 0) {
        echo ("<th colspan='$count'>IFUMBIRE</th>");
    }

    $sql = "SELECT * FROM pricev WHERE status = 'imbuto' AND season = '$season'";
    $result = $connect->query($sql);
    $count = $result->num_rows + 1;

    if ($count > 0) {
        echo ("<th colspan='$count'>IMBUTO N' IMITI</th>");
    }

    $sql = "SELECT * FROM amadeni WHERE season = '$season' GROUP BY name ASC";
    $result = $connect->query($sql);
    $count = $result->num_rows + 1;

    if ($count > 0) {
        echo ("<th colspan='$count'>AMADENI</th>");
    }

    $sql = "SELECT * FROM pricev WHERE status = 'umusaruro' AND season = '$season'";
    $result = $connect->query($sql);
    $count = $result->num_rows + 1;

    if ($count > 0) {
        echo ("<th colspan='$count'>UMUSARURO</th>");
    }

    echo ('
                            </tr>
                            <tr>
                                <th>ORDRE</th>
                                <th>Irangamuntu</th>
                                <th>Amazina</th>');
    $sql = "SELECT * FROM pricev WHERE season = '$season' AND status = 'ifumbire' ORDER BY status ASC";
    $result = $connect->query($sql);

    //error_reporting(0);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $chargeName = $row["chargename"];
            $array = array();
            $array["chargename"] = $chargeName;
            $array["type"] = $row["status"];
            array_push($tableColumns, $array);
            echo ("<th>$chargeName</th>");
            //print_r($array);
            //echo("<br />");
        }
        $arr = array();
        $arr["chargename"] = "Total";
        $arr["type"] = "ifumbire";
        array_push($tableColumns, $arr);
        echo ("<th>Total</th>");
    }

    $sql = "SELECT * FROM pricev WHERE season = '$season' AND status = 'imbuto' ORDER BY status ASC";
    $result = $connect->query($sql);

    //error_reporting(0);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $chargeName = $row["chargename"];
            $array = array();
            $array["chargename"] = $chargeName;
            $array["type"] = $row["status"];
            array_push($tableColumns, $array);
            echo ("<th>$chargeName</th>");
            //print_r($array);
            //echo("<br />");
        }
        $arr = array();
        $arr["chargename"] = "Total";
        $arr["type"] = "imbuto";
        array_push($tableColumns, $arr);
        echo ("<th>Total</th>");
    }
    $sql = "SELECT * FROM amadeni WHERE season = '$season' GROUP BY name ASC";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $chargeName = $row["name"];
            $array = array();
            $array["chargename"] = $chargeName;
            $array["type"] = "amadeni";
            array_push($tableColumns, $array);
            echo ("<th>$chargeName</th>");
            //print_r($array);
            //echo("<br />");
        }
        $arr = array();
        $arr["chargename"] = "Total";
        $arr["type"] = "amadeni";
        array_push($tableColumns, $arr);
        echo ("<th>Total</th>");
    }

    $sql = "SELECT * FROM pricev WHERE season = '$season' AND status = 'umusaruro' ORDER BY status ASC";
    $result = $connect->query($sql);

    //error_reporting(0);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $chargeName = $row["chargename"];
            $array = array();
            $array["chargename"] = $chargeName;
            $array["type"] = $row["status"];
            array_push($tableColumns, $array);
            echo ("<th>$chargeName</th>");
            //print_r($array);
            //echo("<br />");
        }
        $arr = array();
        $arr["chargename"] = "Total";
        $arr["type"] = "umusaruro";
        array_push($tableColumns, $arr);
        echo ("<th>Total</th>");
    }

    echo ("
                            </tr>
                                </thead>
                            <tr>");

    $zone = $_GET["zone"];

    $sql2 = "SELECT * FROM members WHERE zone = '$zone' ORDER BY names ASC";
    $result2 = $connect->query($sql2);

    if ($result2->num_rows > 0) {
        $i = 0;
        while ($row2 = $result2->fetch_assoc()) {
            //echo $row2["Level"];
            $i++;
            $zone = $row2["zone"];
            $idno = $row2["idno"];
            $names = $row2["names"];
            echo "<tr>";
            echo "<th>$i</th>";
            echo "<th><a href='#' onclick='checkAll(\"$idno\", \"$season\")'>$idno</a></th>";
            echo "<th>$names</th>";
            $quantity;
            $u = 0;
            while ($u <= count($tableColumns) - 1) {
                //print_r($tableColumns[$u]);
                //echo("<br />");
                $item = $tableColumns[$u];
                $table = $item["type"];
                $chargeName = $item["chargename"];
                //echo $chargeName;

                if ($table != "amadeni") {
                    if ($chargeName != "Total") {
                        $sql1 = "SELECT SUM(quantity) AS quantity FROM $table WHERE season = '$season' AND zone = '$zone' AND names = '$chargeName' AND idno = '$idno'";
                    } else {
                        $sql1 = "SELECT SUM(quantity) AS quantity FROM $table WHERE season = '$season' AND zone = '$zone' AND idno = '$idno'";
                    }
                    //echo $sql1;
                    $result1 = $connect->query($sql1);
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $quantity = $row1["quantity"];
                        if ($quantity == 0 || $quantity == "") {
                            echo "<td>0</td>";
                        } else {
                            echo "<td style='font-weight: bold;'>$quantity</td>";
                        }
                    }
                } else {
                    $sql1 = "";
                    if ($chargeName != "Total") {
                        $sql1 = "SELECT SUM(amount) AS quantity FROM $table WHERE season = '$season' AND zone = '$zone' AND name = '$chargeName' AND idno = '$idno'";
                    } else {
                        $sql1 = "SELECT SUM(amount) AS quantity FROM $table WHERE season = '$season' AND zone = '$zone' AND idno = '$idno'";
                    }
                    //echo $sql1;
                    $result1 = $connect->query($sql1);
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $quantity = $row1["quantity"];
                        if ($quantity == 0 || $quantity == "") {
                            echo "<td>0</td>";
                        } else {
                            echo "<td style='font-weight: bold;'>$quantity</td>";
                        }
                    }
                }
                $u++;
            }
            echo "<tr>";
        }
        echo ("
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan='3'>IGITERANYO</th>
                                ");
        $a = 0;
        while ($a <= count($tableColumns) - 1) {
            //print_r($tableColumns[$u]);
            //echo("<br />");
            $item = $tableColumns[$a];
            $table = $item["type"];
            $chargeName = $item["chargename"];
            //echo $chargeName;

            if ($table != "amadeni") {
                if ($chargeName != "Total") {
                    $sql1 = "SELECT SUM(quantity) AS quantity FROM $table WHERE season = '$season' AND names = '$chargeName' AND zone = '$zone'";
                } else {
                    $sql1 = "SELECT SUM(quantity) AS quantity FROM $table WHERE season = '$season' AND zone = '$zone'";
                }
                //echo $sql1;
                $result1 = $connect->query($sql1);
                if ($result1->num_rows > 0) {
                    $row1 = $result1->fetch_assoc();
                    $quantity = $row1["quantity"];
                    if ($quantity == 0 || $quantity == "") {
                        echo "<td>0</td>";
                    } else {
                        echo "<td style='font-weight: bold;'>$quantity</td>";
                    }
                }
            } else {
                if ($chargeName != "Total") {
                    $sql1 = "SELECT SUM(amount) AS quantity FROM $table WHERE season = '$season' AND name = '$chargeName'";
                } else {
                    $sql1 = "SELECT SUM(amount) AS quantity FROM $table WHERE season = '$season'";
                }
                //echo $sql1;
                $result1 = $connect->query($sql1);
                if ($result1->num_rows > 0) {
                    $row1 = $result1->fetch_assoc();
                    $quantity = $row1["quantity"];
                    if ($quantity == 0 || $quantity == "") {
                        echo "<td>0</td>";
                    } else {
                        echo "<td style='font-weight: bold;'>$quantity</td>";
                    }
                }
            }
            $a++;
        }
        echo "</tr>";
    }

    echo ('
                            </tfoot>
                        </table>');
} else if ($type == "historique") {
    $idno = $_GET["q"];
    $kuva = $_GET["kuva"];
    $kugeza = $_GET["kugeza"];
    $zone = $_GET["zone"];

    $iSql = "SELECT * FROM ifumbire WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    //echo $iSql;
    $iResult = $connect->query($iSql);

    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";
        //mysql_select_db("tea");
        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $bloc = fetcher('bloc', 'members', 'idno', $idno);
    $names = fetcher('names', 'members', 'idno', $idno);
    $zone = fetcher('zone', 'members', 'idno', $idno);
    $bank = fetcher('bank', 'members', 'idno', $idno);
    $account = fetcher('konti', 'members', 'idno', $idno);
    $pic = fetcher('images', 'members', 'idno', $idno);

    echo ('
    <div class="modal-header">
    <h6 class="modal-title" id="modal-title-default text-center">INYEMEZABWISHYU</h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body"><div id="printThis">');
    $arrays = array();
    //print_r($arrays);

    if ($iResult->num_rows > 0) {
        while ($iRow = $iResult->fetch_assoc()) {
            $iRow["status"] = "Ifumbire";
            array_push($arrays, $iRow);
        }
    }
    $imSql = "SELECT * FROM imbuto WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $imResult = $connect->query($imSql);
    if ($imResult->num_rows > 0) {
        while ($imRow = $imResult->fetch_assoc()) {
            $imRow["status"] = "Imbuto";
            array_push($arrays, $imRow);
        }
    }


    echo ('<div class="row font-weight-bold"><div class="col-sm-3">' . "<img class='rounded-circle'style='height: 10rem; width: 10rem' src='images/$cooperativeId/$pic'/>" . '</div><div class="col-sm mt-3"><div class="row"><div class="col-sm-4">Amazina:</div><div class="col-sm">' . $names . '</div><div class="w-100"></div><div class="col-sm-4">Indangamuntu:</div><div class="col-sm text-black" id="midno">' . $idno . '</div><div class="w-100"></div><div class="col-sm-4">Zone:</div><div class="col-sm">' . $zone . '</div><div class="w-100"></div><div class="col-sm-4">Itsinda:</div><div class="col-sm">' . $bloc . '</div><div class="w-100"></div><div class="col-sm-4">Banki:</div><div class="col-sm">' . $bank . '</div><div class="w-100"></div><div class="col-sm-4">Konti:</div><div class="col-sm">' . $account . '</div><div class="w-100"></div></div></div><div class="col-sm"><div class="container-fluid"><h3 class="text-center h3">AMAFUMBIRE</h3>');
    echo ("<table class='table table-bordered mb-4 font-weight-bold'><thead>
<tr class='text-center'><th>Itariki</th><th>Ubwoko</th><th>Izina</th><th>Ingano</th><th>Agaciro Ka Kimwe</th><th>Igiciro Cyose</th>
</tr></thead><tbody>");
    $i = 0;
    $tot = 0;
    $iTotalWeight = 0;
    $iTotalPrice = 0;
    $iTotalToBePaid = 0;
    for ($i; $i < count($arrays); $i++) {
        $info = $arrays[$i];
        $status = $info["status"];
        $ifumbire = "";
        $amount = 0;
        $date = "";
        $weight = 0;
        $ikiguzi = 0;
        $chargeName = "";
        $unitPrice = 0;
        if ($status != "Ubuso" && $status != "Ibiro" && $status != "Ibingana") {
            if ($status == "Ideni") {
                $ifumbire = $info["name"];
            } else {
                $ifumbire = $info["names"];
            }
            $sql = "SELECT cost FROM pricev WHERE chargename ='$ifumbire'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amount = $row["cost"];
            }
            $date = $info["date"];
            if ($status == "Ideni") {
                $weight = 1;
                $ikiguzi = $info["amount"];
            } else {
                $weight = $info["quantity"];
                if ($status == "Ifumbire") {
                    $sql5 = "SELECT SUM(quantity) AS quantity FROM umusaruro WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
                    $result5 = $connect->query($sql5);

                    if ($result5->num_rows > 0) {
                        $row = $result5->fetch_assoc();
                        $quantity = $row['quantity'];
                        $ikiguzi = $amount * $weight;
                        $toPay = $amount * $weight;
                    }
                } else {
                    $ikiguzi = $weight * $amount;
                }
            }
            $toBePaid = $ikiguzi;
            $iTotalWeight += $weight;
            $iTotalPrice += $ikiguzi;
            $iTotalToBePaid += $toBePaid;
            if ($status == "Ideni") {
                $chargeName = $info['name'];
                $amount = $info["amount"];
            } else {
                $chargeName = $info['names'];
            }
            print("<tr class='text-center'><td>$date</td><td>$status</td><td>$chargeName</td><td>$weight</td><td>$amount</td>

        <td>$ikiguzi</td></tr>");
        } else {
            $amount = 0;
            $date = date("Y-m-d");
            $chargeName = $info["chargename"];
            if ($status == "Ubuso") {
                $weight = fetcher("ubuso", "imirima", "idno", $idno);
                $ikiguzi = $weight * $info["cost"];
                $amount = $info["cost"];
            } else if ($status == "Ibiro") {
                $sql = "SELECT SUM(quantity) AS quantity FROM umusaruro WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $weight = $row["quantity"];
                    $ikiguzi = $weight * $info["cost"];
                    $amount = $info["cost"];
                }
            } else if ($status == "Ibingana") {
                $weight = 1;
                $ikiguzi = $weight * $info["cost"];
                $amount = $info["cost"];
            }
            $toBePaid = $ikiguzi;
            //$iTotalWeight += $weight;
            $iTotalPrice += $ikiguzi;
            //$iTotalToBePaid += $toBePaid;

            print("<tr class='text-center'><td>$date</td><td>$status</td><td>$chargeName</td><td>$weight</td><td>$amount</td>

        <td>$ikiguzi</td></tr>");
        }
    }
    echo ("</tbody><tr><th colspan=5>IGITERANYO</th><th class='text-center'>$iTotalPrice</th></tr></table></div>");
    //print_r($arrays);
    echo ('
    <div class="container-fluid"><h3 class="text-center h3">AMADENI</h3>');
    $uSql = "SELECT * FROM amadeni WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $uResult = $connect->query($uSql);

    $totalAmadeni = 0;
    if ($uResult->num_rows > 0) {
        echo ("<table class='table table-bordered'><thead><tr class='text-center'><th>Itariki</th><th>Ideni</th><th>Agaciro</th></tr></thead><tbody>");
        while ($uRow = $uResult->fetch_assoc()) {
            $date = $uRow["date"];
            $name = $uRow["name"];
            $amount = $uRow["amount"];
            $totalAmadeni += $amount;
            echo ("<tr class='text-center'><td>$date</td><td>$name</td><td>$amount</td>");
        }
        echo "</tbody><tfoot><tr><th colspan=2>IGITERANYO</th><th class='text-center'>$totalAmadeni</th></tfoot></table>";
    }

    $uSql = "SELECT * FROM umusaruro WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $uResult = $connect->query($uSql);

    if ($uResult->num_rows > 0) {
        echo ('
<div class="container-fluid"><h3 class="text-center h3">UMUSARURO</h3>');
        echo ("<table class='table table-bordered'><thead>
<tr class='text-center'><th>Itariki</th><th>Ubwoko</th><th>Ibiro</th><th>Agaciro Ka Kimwe</th><th>Ikiguzi</th><th>Ayishyurwa Ifumbire</th>
<th>Asigara</th></tr></thead><tbody>");
        $i = 0;
        $tot = 0;
        $totalWeight = 0;
        $totalPrice = 0;
        $totalToBePaid = 0;
        $totalPaid = 0;
        $net = 0;
        $ikiguzi = 0;
        $totalAkatwa = 0;
        $totalAsigara = 0;
        while ($info = $uResult->fetch_assoc()) {
            $idno = $info["idno"];
            $date = $info["date"];
            $weight = $info["quantity"];
            $ifumbire = $info["names"];
            $sql = "SELECT cost FROM pricev WHERE chargename ='$ifumbire'";
            $result = $connect->query($sql);

            $amount = 0;
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amount = $row["cost"];
            }
            $ikiguzi = $weight * $amount;
            $i++;
            $totalWeight += $weight;
            $totalPrice += $ikiguzi;
            $totalPaid += $net;
            $names = $info["names"];
            $amt = $weight * 26;
            $totalAkatwa = $totalAkatwa + $amt;
            $net1 = $ikiguzi - $amt;
            print("<tr class='text-center'><td>$date</td><td>$names</td><td>$weight</td><td>$amount</td>

<td>$ikiguzi</td><td>$amt</td><td>$net1</td></tr>");
        }
        //$net = $ikiguzi - $iTotalPrice;
        $totalAsigara = $totalPrice - $totalAkatwa;

        echo ("</tbody><tr><th colspan=4>IGITERANYO</th><th class='text-center'>$totalPrice</th><th class='text-center'>$totalAkatwa</th><th class='text-center'>$totalAsigara</th></table>");
        echo ('
<div class="container-fluid"><h3 class="text-center h3">IKINYURANYO</h3>');
        $net = $totalPrice - $iTotalPrice;
        echo ("<table class='table table-bordered'><thead>
<tr class='text-center'><th>Ifumbire</th><th>Amadeni</th><th>Umusaruro</th><th>Asigara</th></tr></thead><tbody><tr class='text-center'><td>$totalAkatwa</td><td>$totalAmadeni</td><td>$totalPrice</td><td>" . ($totalPrice - ($totalAkatwa + $totalAmadeni)) . "</td></tr></tbody></table>");
        $sql = "SELECT * FROM pyty WHERE idno = '$idno' AND date >= '$kuva' AND date <= '$kugeza'";
        $result = $connect->query($sql);

        $sql1 = "SELECT * FROM pytn WHERE idno = '$idno' AND date >= '$kuva' AND date <= '$kugeza'";
        $result1 = $connect->query($sql1);

        if ($result->num_rows > 0 || $result1->num_rows > 0) {
            echo ("</div></div></div></div></div></div><div class='row'><div class='col-sm-8'><button class='btn btn-icon btn-3 btn-block btn-primary' type='button' id='btnPrint' onclick='printElem(document.getElementById(\"printThis\"));'>
    <span class='btn-inner--icon'><i class='fa fa-print'></i></span>
    <span class='btn-inner--text'>Print</span>
    </button></div><div class='col-sm-4'><button id='sendhistorique' class='btn btn-icon btn-3 btn-block btn-danger ld-ext-right' type='button' onclick='dismiss();'>
    <span id='sendhistoriqueTxt' class='btn-inner--text'>Komeza</span>
    <span class='btn-inner--icon'><i id='sendhistoriqueIcon' class='fa fa-arrow-right'></i></span>
    <div class='ld ld-ring ld-spin'></div>
    </button></div></div>");
        } else {
            echo ("</div></div></div></div></div></div><div class='row'><div class='col-sm-8'><button class='btn btn-icon btn-3 btn-block btn-primary' type='button' id='btnPrint' onclick='printElement(document.getElementById(\"printThis\"), \"$idno\",  \"$iTotalPrice\", \"$totalPrice\", \"$totalAkatwa\", \"$totalAmadeni\");'>
    <span class='btn-inner--icon'><i class='fa fa-money'></i></span>
    <span class='btn-inner--text'>Emeza</span>
    </button></div><div class='col-sm-4'><button class='btn btn-icon btn-3 btn-block btn-danger ld-ext-right' type='button' onclick='dismiss();'>
    <span id='sendhistoriqueTxt' class='btn-inner--text'>Komeza</span>
    <span class='btn-inner--icon'><i id='sendhistoriqueIcon' class='fa fa-arrow-right'></i></span>
    <div class='ld ld-ring ld-spin'></div>
    </button></div></div>");
        }
    }
} else if ($type == "historiqueall") {
    $idno = $_GET["q"];
    $kuva = $_GET["kuva"];
    $kugeza = $_GET["kugeza"];

    $iSql = "SELECT * FROM ifumbire WHERE idno = '$idno' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $iResult = $connect->query($iSql);

    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";
        //mysql_select_db("tea");
        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $bloc = fetcher('bloc', 'members', 'idno', $idno);
    $names = fetcher('names', 'members', 'idno', $idno);
    $zone = fetcher('zone', 'members', 'idno', $idno);
    $bank = fetcher('bank', 'members', 'idno', $idno);
    $account = fetcher('konti', 'members', 'idno', $idno);
    $pic = fetcher('images', 'members', 'idno', $idno);

    echo ('
    <div class="modal-header">
    <h6 class="modal-title" id="modal-title-default text-center">INYEMEZABWISHYU</h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body"><div id="printThis">');
    $arrays = array();
    //print_r($arrays);

    if ($iResult->num_rows > 0) {
        while ($iRow = $iResult->fetch_assoc()) {
            $iRow["status"] = "Ifumbire";
            array_push($arrays, $iRow);
        }
    }
    $imSql = "SELECT * FROM imbuto WHERE idno = '$idno' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $imResult = $connect->query($imSql);
    if ($imResult->num_rows > 0) {
        while ($imRow = $imResult->fetch_assoc()) {
            $imRow["status"] = "Imbuto";
            array_push($arrays, $imRow);
        }
    }
    //print_r($arrays);

    echo ('<div class="row font-weight-bold"><div class="col-sm-3">' . "<img class='rounded-circle'style='height: 10rem; width: 10rem' src='images/$cooperativeId/$pic'/>" . '</div><div class="col-sm mt-3"><div class="row"><div class="col-sm-4">Amazina:</div><div class="col-sm">' . $names . '</div><div class="w-100"></div><div class="col-sm-4">Indangamuntu:</div><div class="col-sm text-black" id="midno">' . $idno . '</div><div class="w-100"></div><div class="col-sm-4">Zone:</div><div class="col-sm">' . $zone . '</div><div class="w-100"></div><div class="col-sm-4">Itsinda:</div><div class="col-sm">' . $bloc . '</div><div class="w-100"></div><div class="col-sm-4">Banki:</div><div class="col-sm">' . $bank . '</div><div class="w-100"></div><div class="col-sm-4">Konti:</div><div class="col-sm">' . $account . '</div><div class="w-100"></div></div></div><div class="col-sm"><div class="container-fluid"><h3 class="text-center h3">AMAFUMBIRE</h3>');
    echo ("<table class='table table-bordered mb-4 font-weight-bold'><thead>
<tr class='text-center'><th>Itariki</th><th>Ubwoko</th><th>Izina</th><th>Ingano</th><th>Agaciro Ka Kimwe</th><th>Akatwa</th>
</tr></thead><tbody>");
    $i = 0;
    $tot = 0;
    $iTotalWeight = 0;
    $iTotalPrice = 0;
    $iTotalToBePaid = 0;
    for ($i; $i < count($arrays); $i++) {
        $info = $arrays[$i];
        $status = $info["status"];
        $ifumbire = "";
        $amount = 0;
        $date = "";
        $weight = 0;
        $ikiguzi = 0;
        $chargeName = "";
        $unitPrice = 0;
        if ($status != "Ubuso" && $status != "Ibiro" && $status != "Ibingana") {
            if ($status == "Ideni") {
                $ifumbire = $info["name"];
            } else {
                $ifumbire = $info["names"];
            }
            $sql = "SELECT cost FROM pricev WHERE chargename ='$ifumbire'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amount = $row["cost"];
            }
            $date = $info["date"];
            if ($status == "Ideni") {
                $weight = 1;
                $ikiguzi = $info["amount"];
            } else {
                $weight = $info["quantity"];
                if ($status == "Ifumbire") {
                    $sql5 = "SELECT SUM(quantity) AS quantity FROM umusaruro WHERE idno = '$idno' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
                    $result5 = $connect->query($sql5);

                    if ($result5->num_rows > 0) {
                        $row = $result5->fetch_assoc();
                        $quantity = $row['quantity'];
                        $kiguzi = $quantity * 26;
                        $toPay = $amount * $weight;
                        if ($kiguzi <= $toPay) {
                            $ikiguzi = $quantity * 26;
                        } else {
                            $ikiguzi = $toPay;
                        }
                    }
                } else {
                    $ikiguzi = $weight * $amount;
                }
            }
            $toBePaid = $ikiguzi;
            $iTotalWeight += $weight;
            $iTotalPrice += $ikiguzi;
            $iTotalToBePaid += $toBePaid;
            if ($status == "Ideni") {
                $chargeName = $info['name'];
                $amount = $info["amount"];
            } else {
                $chargeName = $info['names'];
            }
            print("<tr class='text-center'><td>$date</td><td>$status</td><td>$chargeName</td><td>$weight</td><td>$amount</td>

        <td>$ikiguzi</td></tr>");
        } else {
            $amount = 0;
            $date = date("Y-m-d");
            $chargeName = $info["chargename"];
            if ($status == "Ubuso") {
                $weight = fetcher("ubuso", "imirima", "idno", $idno);
                $ikiguzi = $weight * $info["cost"];
                $amount = $info["cost"];
            } else if ($status == "Ibiro") {
                $sql = "SELECT SUM(quantity) AS quantity FROM umusaruro WHERE idno = '$idno' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $weight = $row["quantity"];
                    $ikiguzi = $weight * $info["cost"];
                    $amount = $info["cost"];
                }
            } else if ($status == "Ibingana") {
                $weight = 1;
                $ikiguzi = $weight * $info["cost"];
                $amount = $info["cost"];
            }
            $toBePaid = $ikiguzi;
            //$iTotalWeight += $weight;
            $iTotalPrice += $ikiguzi;
            //$iTotalToBePaid += $toBePaid;

            print("<tr class='text-center'><td>$date</td><td>$status</td><td>$chargeName</td><td>$weight</td><td>$amount</td>

        <td>$ikiguzi</td></tr>");
        }
    }
    echo ("</tbody><tr><th colspan=5>IGITERANYO</th><th class='text-center'>$iTotalPrice</th></tr></table></div>");
    //print_r($arrays);
    echo ('
    <div class="container-fluid"><h3 class="text-center h3">AMADENI</h3>');
    $uSql = "SELECT * FROM amadeni WHERE idno = '$idno' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $uResult = $connect->query($uSql);

    $totalAmadeni = 0;
    if ($uResult->num_rows > 0) {
        echo ("<table class='table table-bordered'><thead><tr class='text-center'><th>Itariki</th><th>Ideni</th><th>Agaciro</th></tr></thead><tbody>");
        while ($uRow = $uResult->fetch_assoc()) {
            $date = $uRow["date"];
            $name = $uRow["name"];
            $amount = $uRow["amount"];
            $totalAmadeni += $amount;
            echo ("<tr class='text-center'><td>$date</td><td>$name</td><td>$amount</td>");
        }
        echo "</tbody><tfoot><tr><th colspan=2>IGITERANYO</th><th class='text-center'>$totalAmadeni</th></tfoot></table>";
    }
    $uSql = "SELECT * FROM umusaruro WHERE idno = '$idno' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $uResult = $connect->query($uSql);

    if ($uResult->num_rows > 0) {
        echo ('
<div class="container-fluid"><h3 class="text-center h3">UMUSARURO</h3>');
        echo ("<table class='table table-bordered'><thead>
<tr class='text-center'><th>Itariki</th><th>Ubwoko</th><th>Ibiro</th><th>Agaciro Ka Kimwe</th><th>Ikiguzi</th><th>Ayishyurwa Ifumbire</th>
<th>Asigara</th></tr></thead><tbody>");
        $i = 0;
        $tot = 0;
        $totalWeight = 0;
        $totalPrice = 0;
        $totalToBePaid = 0;
        $totalPaid = 0;
        $net = 0;
        $ikiguzi = 0;
        $totalAkatwa = 0;
        $totalAsigara = 0;
        while ($info = $uResult->fetch_assoc()) {
            $idno = $info["idno"];
            $date = $info["date"];
            $weight = $info["quantity"];
            $ifumbire = $info["names"];
            $sql = "SELECT cost FROM pricev WHERE chargename ='$ifumbire'";
            $result = $connect->query($sql);

            $amount = 0;
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amount = $row["cost"];
            }
            $ikiguzi = $weight * $amount;
            $i++;
            $totalWeight += $weight;
            $totalPrice += $ikiguzi;
            $totalPaid += $net;
            $names = $info["names"];
            $amt = $weight * 26;
            $totalAkatwa = $totalAkatwa + $amt;
            $net1 = $ikiguzi - $amt;
            print("<tr class='text-center'><td>$date</td><td>$names</td><td>$weight</td><td>$amount</td>

<td>$ikiguzi</td><td>$amt</td><td>$net1</td></tr>");
        }
        //$net = $ikiguzi - $iTotalPrice;
        $totalAsigara = $totalPrice - $totalAkatwa;

        echo ("</tbody><tr><th colspan=4>IGITERANYO</th><th class='text-center'>$totalPrice</th><th class='text-center'>$totalAkatwa</th><th class='text-center'>$totalAsigara</th></table>");
        echo ('
<div class="container-fluid"><h3 class="text-center h3">IKINYURANYO</h3>');
        $net = $totalPrice - $iTotalPrice;
        echo ("<table class='table table-bordered'><thead>
<tr class='text-center'><th>Ifumbire</th><th>Amadeni</th><th>Umusaruro</th><th>Asigara</th></tr></thead><tbody><tr class='text-center'><td>$totalAkatwa</td><td>$totalAmadeni</td><td>$totalPrice</td><td>" . ($totalPrice - ($totalAkatwa + $totalAmadeni)) . "</td></tr></tbody></table>");
        $sql = "SELECT * FROM pyty WHERE idno = '$idno' AND date >= '$kuva' AND date <= '$kugeza'";
        $result = $connect->query($sql);

        $sql1 = "SELECT * FROM pytn WHERE idno = '$idno' AND date >= '$kuva' AND date <= '$kugeza'";
        $result1 = $connect->query($sql1);

        if ($result->num_rows > 0 || $result1->num_rows > 0) {
            echo ("</div></div></div></div></div></div><div class='row'><div class='col-sm-8'><button class='btn btn-icon btn-3 btn-block btn-primary' type='button' id='btnPrint' onclick='printElem(document.getElementById(\"printThis\"));'>
    <span class='btn-inner--icon'><i class='fa fa-print'></i></span>
    <span class='btn-inner--text'>Print</span>
    </button></div><div class='col-sm-4'><button id='sendhistorique' class='btn btn-icon btn-3 btn-block btn-danger ld-ext-right' type='button' onclick='dismiss();'>
    <span id='sendhistoriqueTxt' class='btn-inner--text'>Komeza</span>
    <span class='btn-inner--icon'><i id='sendhistoriqueIcon' class='fa fa-arrow-right'></i></span>
    <div class='ld ld-ring ld-spin'></div>
    </button></div></div>");
        } else {
            echo ("</div></div></div></div></div></div><div class='row'><div class='col-sm-8'><button class='btn btn-icon btn-3 btn-block btn-primary' type='button' id='btnPrint' onclick='printElement(document.getElementById(\"printThis\"), \"$idno\",  \"$iTotalPrice\", \"$totalPrice\", \"$totalAkatwa\", \"$totalAmadeni\");'>
    <span class='btn-inner--icon'><i class='fa fa-money'></i></span>
    <span class='btn-inner--text'>Emeza</span>
    </button></div><div class='col-sm-4'><button class='btn btn-icon btn-3 btn-block btn-danger ld-ext-right' type='button' onclick='dismiss();'>
    <span id='sendhistoriqueTxt' class='btn-inner--text'>Komeza</span>
    <span class='btn-inner--icon'><i id='sendhistoriqueIcon' class='fa fa-arrow-right'></i></span>
    <div class='ld ld-ring ld-spin'></div>
    </button></div></div>");
        }
    }
} else if ($type == "historiquevuba") {
    $idno = $_GET["q"];
    $kuva = $_GET["kuva"];
    $kugeza = $_GET["kugeza"];
    $zone = $_GET["zone"];
    function fetcher($field, $table, $constraint, $condition)
    {
        include "conn.php";

        if ($connect->connect_error) {
            echo $connect->connect_error;
        }
        $sql = "SELECT $field FROM $table WHERE $constraint='$condition'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];

            return $answer;
        }
    }

    $bloc = fetcher('bloc', 'members', 'idno', $idno);
    $names = fetcher('names', 'members', 'idno', $idno);
    $zone = fetcher('zone', 'members', 'idno', $idno);
    $bank = fetcher('bank', 'members', 'idno', $idno);
    $account = fetcher('konti', 'members', 'idno', $idno);
    $pic = fetcher('images', 'members', 'idno', $idno);

    echo ('
    <div class="modal-header">
    <h6 class="modal-title" id="modal-title-default text-center">INYEMEZABWISHYU</h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body"><div id="printThis">');
    $arrays = array();

    $imSql = "SELECT * FROM imbuto WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $imResult = $connect->query($imSql);
    if ($imResult->num_rows > 0) {
        while ($imRow = $imResult->fetch_assoc()) {
            $imRow["status"] = "Imbuto";
            array_push($arrays, $imRow);
        }
    }


    echo ('<div class="row font-weight-bold"><div class="col-sm-3">' . "<img class='rounded-circle'style='height: 10rem; width: 10rem' src='images/$cooperativeId/$pic'/>" . '</div><div class="col-sm mt-3"><div class="row"><div class="col-sm-4">Amazina:</div><div class="col-sm">' . $names . '</div><div class="w-100"></div><div class="col-sm-4">Indangamuntu:</div><div class="col-sm text-black" id="midno">' . $idno . '</div><div class="w-100"></div><div class="col-sm-4">Zone:</div><div class="col-sm">' . $zone . '</div><div class="w-100"></div><div class="col-sm-4">Itsinda:</div><div class="col-sm">' . $bloc . '</div><div class="w-100"></div><div class="col-sm-4">Banki:</div><div class="col-sm">' . $bank . '</div><div class="w-100"></div><div class="col-sm-4">Konti:</div><div class="col-sm">' . $account . '</div><div class="w-100"></div></div></div><div class="col-sm"><div class="container-fluid"><h3 class="text-center h3">IMBUTO</h3>');
    echo ("<table class='table table-bordered mb-4 font-weight-bold'><thead>
<tr class='text-center'><th>Itariki</th><th>Ubwoko</th><th>Izina</th><th>Ingano</th><th>Agaciro Ka Kimwe</th><th>Igiciro Cyose</th>
</tr></thead><tbody>");
    $i = 0;
    $tot = 0;
    $iTotalWeight = 0;
    $iTotalPrice = 0;
    $iTotalToBePaid = 0;
    for ($i; $i < count($arrays); $i++) {
        $info = $arrays[$i];
        $status = $info["status"];
        $ifumbire = "";
        $amount = 0;
        $date = "";
        $weight = 0;
        $ikiguzi = 0;
        $chargeName = "";
        $unitPrice = 0;
        if ($status != "Ubuso" && $status != "Ibiro" && $status != "Ibingana") {
            if ($status == "Ideni") {
                $ifumbire = $info["name"];
            } else {
                $ifumbire = $info["names"];
            }
            $sql = "SELECT cost FROM pricev WHERE chargename ='$ifumbire'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amount = $row["cost"];
            }
            $date = $info["date"];
            if ($status == "Ideni") {
                $weight = 1;
                $ikiguzi = $info["amount"];
            } else {
                $weight = $info["quantity"];
                if ($status == "Ifumbire") {
                    $sql5 = "SELECT SUM(quantity) AS quantity FROM umusaruro WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
                    $result5 = $connect->query($sql5);

                    if ($result5->num_rows > 0) {
                        $row = $result5->fetch_assoc();
                        $quantity = $row['quantity'];
                        $ikiguzi = $amount * $weight;
                        $toPay = $amount * $weight;
                    }
                } else {
                    $ikiguzi = $weight * $amount;
                }
            }
            $toBePaid = $ikiguzi;
            $iTotalWeight += $weight;
            $iTotalPrice += $ikiguzi;
            $iTotalToBePaid += $toBePaid;
            if ($status == "Ideni") {
                $chargeName = $info['name'];
                $amount = $info["amount"];
            } else {
                $chargeName = $info['names'];
            }
            print("<tr class='text-center'><td>$date</td><td>$status</td><td>$chargeName</td><td>$weight</td><td>$amount</td>

        <td>$ikiguzi</td></tr>");
        } else {
            $amount = 0;
            $date = date("Y-m-d");
            $chargeName = $info["chargename"];
            if ($status == "Ubuso") {
                $weight = fetcher("ubuso", "imirima", "idno", $idno);
                $ikiguzi = $weight * $info["cost"];
                $amount = $info["cost"];
            } else if ($status == "Ibiro") {
                $sql = "SELECT SUM(quantity) AS quantity FROM umusaruro WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $weight = $row["quantity"];
                    $ikiguzi = $weight * $info["cost"];
                    $amount = $info["cost"];
                }
            }
            $toBePaid = $ikiguzi;
            //$iTotalWeight += $weight;
            $iTotalPrice += $ikiguzi;
            //$iTotalToBePaid += $toBePaid;

            print("<tr class='text-center'><td>$date</td><td>$status</td><td>$chargeName</td><td>$weight</td><td>$amount</td>

        <td>$ikiguzi</td></tr>");
        }
    }
    echo ("</tbody><tr><th colspan=5>IGITERANYO</th><th class='text-center'>$iTotalPrice</th></tr></table></div>");
    //print_r($arrays);
    echo ('
    <div class="container-fluid"><h3 class="text-center h3">AMADENI</h3>');
    $uSql = "SELECT * FROM amadeni WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $uResult = $connect->query($uSql);

    $totalAmadeni = 0;
    $totalAmadeni1 = 0;
    $totAmadeni = 0;

    if ($uResult->num_rows > 0) {
        echo ("<table class='table table-bordered'><thead><tr class='text-center'><th>Itariki</th><th>Ideni</th><th>Agaciro</th></tr></thead><tbody>");
        while ($uRow = $uResult->fetch_assoc()) {
            $date = $uRow["date"];
            $name = $uRow["name"];
            $amount = $uRow["amount"];
            if ($name == "IFUMBIRE KUGERA 2018") {
                $totalAmadeni1 += $amount;
            } else {
                $totalAmadeni += $amount;
            }
            echo ("<tr class='text-center'><td>$date</td><td>$name</td><td>$amount</td>");
        }
        $totAmadeni = $totAmadeni + $totalAmadeni1;
        echo "</tbody><tfoot><tr><th colspan=2>IGITERANYO</th><th class='text-center'>$totAmadeni</th></tfoot></table>";
    }

    $uSql = "SELECT * FROM umusaruro WHERE idno = '$idno' AND zone = '$zone' AND ((date >= '$kuva' AND date <= '$kugeza' AND status = 'unpaid') OR status = 'unpaid')";
    $uResult = $connect->query($uSql);

    if ($uResult->num_rows > 0) {
        echo ('
<div class="container-fluid"><h3 class="text-center h3">UMUSARURO</h3>');
        echo ("<table class='table table-bordered'><thead>
<tr class='text-center'><th>Itariki</th><th>Ubwoko</th><th>Ibiro</th><th>Agaciro Ka Kimwe</th><th>Ikiguzi</th><th>Ayishyurwa Ifumbire</th>
<th>Asigara</th></tr></thead><tbody>");
        $i = 0;
        $tot = 0;
        $totalWeight = 0;
        $totalPrice = 0;
        $totalToBePaid = 0;
        $totalPaid = 0;
        $net = 0;
        $ikiguzi = 0;
        $totalIfumbire = 0;
        $totalAsigara = 0;
        $totPrice = 0;
        while ($info = $uResult->fetch_assoc()) {
            $idno = $info["idno"];
            $date = $info["date"];
            $weight = $info["quantity"];
            $ifumbire = $info["names"];
            $sql = "SELECT cost FROM pricev WHERE chargename ='$ifumbire'";
            $result = $connect->query($sql);

            $amount = 0;
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amount = $row["cost"];
            }
            $ikiguzi = $weight * $amount;
            $i++;
            $totalWeight += $weight;
            $totalPrice += $ikiguzi;
            $totalPaid += $net;
            $names = $info["names"];
            $amt = $weight * 26;
            if ($amt > $totalAmadeni1) {
                $amt = $totalAmadeni1;
            } else {
            }
            $totalIfumbire = $totalIfumbire + $amt;
            $net1 = $ikiguzi - $amt;
            print("<tr class='text-center'><td>$date</td><td>$names</td><td>$weight</td><td>$amount</td>

<td>$ikiguzi</td><td>$amt</td><td>$net1</td></tr>");
        }
        //$net = $ikiguzi - $iTotalPrice;
        $totalAsigara = $totalPrice - $totalIfumbire;

        echo ("</tbody><tr><th colspan=4>IGITERANYO</th><th class='text-center'>$totalPrice</th><th class='text-center'>$totalIfumbire</th><th class='text-center'>$totalAsigara</th></table>");
        echo ('
<div class="container-fluid"><h3 class="text-center h3">IKINYURANYO</h3>');
        $net = $totalPrice - $iTotalPrice;
        echo ("<table class='table table-bordered'><thead>
<tr class='text-center'><th>Ifumbire</th><th>Amadeni</th><th>Umusaruro</th><th>Asigara</th></tr></thead><tbody><tr class='text-center'><td>$totalIfumbire</td><td>$totalAmadeni</td><td>$totalPrice</td><td>" . ($totalPrice - ($totalIfumbire + $totalAmadeni)) . "</td></tr></tbody></table>");
        $sql = "SELECT * FROM pyty WHERE idno = '$idno' AND date >= '$kuva' AND date <= '$kugeza'";
        $result = $connect->query($sql);

        $sql1 = "SELECT * FROM pytn WHERE idno = '$idno' AND date >= '$kuva' AND date <= '$kugeza'";
        $result1 = $connect->query($sql1);

        if ($result->num_rows > 0 || $result1->num_rows > 0) {
            echo ("</div></div></div></div></div></div><div class='row'><div class='col-sm-8'><button class='btn btn-icon btn-3 btn-block btn-primary' type='button' id='btnPrint' onclick='printElem(document.getElementById(\"printThis\"));'>
    <span class='btn-inner--icon'><i class='fa fa-print'></i></span>
    <span class='btn-inner--text'>Print</span>
    </button></div><div class='col-sm-4'><button id='sendhistorique' class='btn btn-icon btn-3 btn-block btn-danger ld-ext-right' type='button' onclick='dismiss();'>
    <span id='sendhistoriqueTxt' class='btn-inner--text'>Komeza</span>
    <span class='btn-inner--icon'><i id='sendhistoriqueIcon' class='fa fa-arrow-right'></i></span>
    <div class='ld ld-ring ld-spin'></div>
    </button></div></div>");
        } else {
            echo ("</div></div></div></div></div></div><div class='row'><div class='col-sm-8'><button class='btn btn-icon btn-3 btn-block btn-primary' type='button' id='btnPrint' onclick='printElement(document.getElementById(\"printThis\"), \"$idno\", \"$iTotalToBePaid\", \"$totalIfumbire\", \"$totalAmadeni1\", \"$totalAmadeni\", \"$totalPrice\");'>
    <span class='btn-inner--icon'><i class='fa fa-money'></i></span>
    <span class='btn-inner--text'>Emeza</span>
    </button></div><div class='col-sm-4'><button class='btn btn-icon btn-3 btn-block btn-danger ld-ext-right' type='button' onclick='dismiss();'>
    <span id='sendhistoriqueTxt' class='btn-inner--text'>Komeza</span>
    <span class='btn-inner--icon'><i id='sendhistoriqueIcon' class='fa fa-arrow-right'></i></span>
    <div class='ld ld-ring ld-spin'></div>
    </button></div></div>");
        }
    }
}

?>