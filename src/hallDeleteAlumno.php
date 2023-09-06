<?php
session_start();
require("connection.php");
$idDelAlumnoDelete = $_POST["idDelAlumnoDelete"];

// print_r($idDelAlumno . " " . $editAlumnoDNI . " " . $editAlumnoEmail . " " . $editAlumnoNombre . " " . $editAlumnoApellido . " " . $editAlumnoDirec . " " . $editAlumnoFecha);

$deleteAlumno = $mysqli->query("DELETE FROM info WHERE id_info = '$idDelAlumnoDelete'");

header("Location:./lobby.php");
die();