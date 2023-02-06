<?php
include_once "./constants.php";
$connect = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($connect->connect_error) {
    die($connect->connect_error);
} else {
    $conn = $connect;
}
?>