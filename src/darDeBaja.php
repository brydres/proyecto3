<?php
require("connection.php");
session_start();
$i = $_POST["iValue"];
$idInfoFk = $_SESSION['numIdInfo' . $i];
$idClassFk = $_SESSION['numClass' . $i];

$deleteInfoClass = $mysqli->query("DELETE FROM info_classes WHERE id_info_fk = '$idInfoFk' AND id_class_fk = '$idClassFk'");
header("Location:./lobby.php");
die();