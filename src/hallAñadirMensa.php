<?php
session_start();
require("connection.php");
$idnombreMensa = $_POST["idnombreMensa"];
$editMensaje = $_POST["editMensaje"];
$idnombreClassMensa = $_POST["idnombreClassMensa"];

// print_r($idnombreMensa . " " . $editMensaje . " " . $idnombreClassMensa);

$insertMensa4Alum = $mysqli->query("UPDATE info_classes SET messages = '$editMensaje'  WHERE id_info_fk = '$idnombreMensa' AND id_class_fk = '$idnombreClassMensa'");

header("Location:./lobby.php");
die();