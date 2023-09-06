<?php
session_start();
require("connection.php");
$idDelInfo4Classe = $_POST["idDelInfo4Classe"];

$idDelClasse = $_POST["idDelClasse"];
$editClaseNombre = $_POST["editClaseNombre"];
$editProfeClaseAsign = $_POST["editProfeClaseAsign"];


// print_r($idDelClasse . " " . $editClaseNombre . " " . $editProfeClaseAsign . " " . $idDelInfo4Classe);

$insertInfoMaestros01 = $mysqli->query("UPDATE classes SET name_class = '$editClaseNombre' WHERE id_class = '$idDelClasse'");
$insertInfoMaestros02 = $mysqli->query("UPDATE info SET teacher_class = NULL WHERE id_info = '$idDelInfo4Classe'");
$insertInfoMaestros03 = $mysqli->query("UPDATE info SET teacher_class = '$idDelClasse' WHERE id_info = '$editProfeClaseAsign'");
header("Location:./lobby.php");
die();