<?php
session_start();
require("connection.php");

// $newAlumnoDNI = $_POST["newAlumnoDNI"];
$newClaseNombre = $_POST["newClaseNombre"];
$profeClaseAsign = $_POST["profeClaseAsign"];


// print_r($newClaseNombre . " " . $profeClaseAsign );
$insertNewClase = $mysqli->query("INSERT INTO classes (name_class) VALUES ('$newClaseNombre')");

$iselectNewClase = $mysqli->query("SELECT * FROM classes WHERE name_class = '$newClaseNombre'");
$newClaseRow = $iselectNewClase->fetch_assoc();

$asignClasse = $newClaseRow["id_class"];

if (isset($profeClaseAsign)) {
    $updateNewInfo = $mysqli->query("UPDATE info SET teacher_class = '$asignClasse'  WHERE id_info = '$profeClaseAsign'");
}
header("Location:./lobby.php");
die();