<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";

    $nom = $_POST["nom"];
	$email = $_POST["email"];
	$intara = $_POST["modalProvince1"];
	$akarere = $_POST["modalDistrict1"];
	$umurenge = $_POST["sector"];
	$akagari = $_POST["cell"];
	$umudugudu = $_POST["village"];
	$website = $_POST["website"];
	$username = $_POST["username"];
    $telPersonne = $_POST["telpersonne"];
    $password = $_POST["password"];
    $fertilizerPaymentMean = $_POST["fert-pyt-mean"];

    $unionId = $_SESSION["institution"];
    $userId = $_SESSION["user_id"];
    $q = $_POST["q"];

    $coopType = $_POST["type"];
    $area = 0;
    $zone = $hangar = $longitude = $latitude = "";

    $eStatus = $_POST["electronic-scale"];

    if ($coopType == 2) {
        $area = $_POST["ubuso"];
        $zone = $_POST["zone"];
        $hangar = $_POST["hangar"];
        $longitude = $_POST["longitude"];
        $latitude = $_POST["latitude"];
    }

    $sql = "UPDATE `cooperatives` SET `name` = '$nom', `email` = '$email', `village_id` = '$umudugudu', `website` = '$website', `phone` = '$telPersonne', `coop_type` = '$coopType', `area` = '$area', `e_status` = '$eStatus', `zone` = '$zone', `bloc` = '$hangar', `longitude` = '$longitude', `latitude` = '$latitude', `fertilizer_pyt_mean` = '$fertilizerPaymentMean' WHERE id = '$q'";

    if ($connect->query($sql)) {
        $insertedId = $q;
        $tmpLogoPath = $_FILES['logo']['tmp_name'];

            //Make sure we have a file path
            if ($tmpLogoPath != ""){
                //Setup our new file path
                $newLogoName = $_FILES['logo']['name'];
                $newLogoPath = "./uploads/assets/$insertedId/$newLogoName";

                if (!file_exists(getcwd()."/uploads/assets/$insertedId")) {
                    mkdir(getcwd()."/uploads/assets/$insertedId", 0777, true);
                }

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpLogoPath, $newLogoPath)) {
                    $quer = "UPDATE cooperatives SET logo = '$newLogoName' WHERE id = '$insertedId'";

                    if ($connect->query($quer) === TRUE) {
                        echo "<script>alert('Logo uploaded successfully.');</script>";
                    }
                }
            }

            //Get the temp file path
            $tmpSignaturePath = $_FILES['signature']['tmp_name'];

            //Make sure we have a file path
            if ($tmpSignaturePath != ""){
                //Setup our new file path
                $newSignatureName = $_FILES['signature']['name'];
                $newSignaturePath = "./uploads/assets/$insertedId/$newSignatureName";

                if (!file_exists(getcwd()."/uploads/assets/$insertedId")) {
                    mkdir(getcwd()."/uploads/assets/$insertedId", 0777, true);
                }

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpSignaturePath, $newSignaturePath)) {
                    $quer = "UPDATE cooperatives SET p_signature = '$newSignatureName' WHERE id = '$insertedId'";

                    if ($connect->query($quer) === TRUE) {
                        echo "<script>alert('Signature uploaded successfully.');</script>";
                    }
                }
            }
        $query = "UPDATE `login` SET `username` = '$username', `password` = '$password' WHERE institution_id = '$q' AND users_category_id = '4'";
        if ($connect->query($query)) {
            echo "<script>alert('Updated successfully')</script>";
            echo "<script>location.assign('allcooperatives.php')</script>";
        } else {
            die($connect->error);
        }
    } else {
        die($connect->error);
    }
}
?>