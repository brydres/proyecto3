<?php
session_start();
require("connection.php");
$idDelMaestroDelete = $_POST["idDelMaestroDelete"];

// print_r($idDelAlumno . " " . $editAlumnoDNI . " " . $editAlumnoEmail . " " . $editAlumnoNombre . " " . $editAlumnoApellido . " " . $editAlumnoDirec . " " . $editAlumnoFecha);

$deleteAlumno = $mysqli->query("DELETE FROM info WHERE id_info = '$idDelMaestroDelete'");

header("Location:./lobby.php");
die();