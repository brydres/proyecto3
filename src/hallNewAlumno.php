<?php
session_start();
require("connection.php");

$newAlumnoDNI = $_POST["newAlumnoDNI"];
$newAlumnoEmail = $_POST["newAlumnoEmail"];
$newAlumnoNombre = $_POST["newAlumnoNombre"];
$newAlumnoApellido = $_POST["newAlumnoApellido"];
$newAlumnoDirec = $_POST["newAlumnoDirec"];
$newAlumnoFecha = $_POST["newAlumnoFecha"];

// print_r($newMaestroEmail . " " . $newMaestroNombre . " " . $newMaestroApellido . " " . $newMaestroDirec . " " . $newMaestroFecha . " " . $claseAsign);

$insertNewAlumno = $mysqli->query("INSERT INTO info (name,lastname,email,address,birthday,state,DNI,id_rol) VALUES ('$newAlumnoNombre','$newAlumnoApellido','$newAlumnoEmail','$newAlumnoDirec','$newAlumnoFecha',1,$newAlumnoDNI,3)");
header("Location:./lobby.php");
die();