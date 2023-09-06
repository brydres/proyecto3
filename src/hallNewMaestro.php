<?php
session_start();
require("connection.php");

$newMaestroEmail = $_POST["newMaestroEmail"];
$newMaestroNombre = $_POST["newMaestroNombre"];
$newMaestroApellido = $_POST["newMaestroApellido"];
$newMaestroDirec = $_POST["newMaestroDirec"];
$newMaestroFecha = $_POST["newMaestroFecha"];
if (isset($empty["claseAsign"])) {
    $claseAsign = $_POST["claseAsign"];
    $insertNewMaestro = $mysqli->query("INSERT INTO info (name,lastname,email,address,birthday,teacher_class,state,DNI,id_rol) VALUES ('$newMaestroNombre','$newMaestroApellido','$newMaestroEmail','$newMaestroDirec','$newMaestroFecha','$claseAsign',1,NULL,2)");
} else {
    $insertNewMaestro = $mysqli->query("INSERT INTO info (name,lastname,email,address,birthday,teacher_class,state,DNI,id_rol) VALUES ('$newMaestroNombre','$newMaestroApellido','$newMaestroEmail','$newMaestroDirec','$newMaestroFecha',NULL,1,NULL,2)");
}

// if ($claseAsign == NULL) {

//     print_r($newMaestroEmail . " " . $newMaestroNombre . " " . $newMaestroApellido . " " . $newMaestroDirec . " " . $newMaestroFecha . " " . $claseAsign);
// }


// $insertNewMaestro = $mysqli->query("INSERT INTO info (name,lastname,email,address,birthday,teacher_class,state,DNI,id_rol) VALUES ('$newMaestroNombre','$newMaestroApellido','$newMaestroEmail','$newMaestroDirec','$newMaestroFecha',$claseAsign,1,NULL,2)");
header("Location:./lobby.php");
die();