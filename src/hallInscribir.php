<?php
session_start();
require("connection.php");

$id_info = $_SESSION["id_info"];
$resultIC = $mysqli->query("SELECT DISTINCT classes.id_class,classes.name_class FROM info_classes RIGHT JOIN classes ON classes.id_class = info_classes.id_class_fk WHERE id_info_fk IS NULL OR NOT id_info_fk = $id_info;");
// $resultClasses = $mysqli->query("SELECT * FROM classes WHERE id_class = $numClass");

// SELECT * FROM info_classes WHERE id_info_fk = $id_info;

while ($datosC = $resultIC->fetch_assoc()) {
    $id_class = $datosC["id_class"];
    $name_class = $datosC["name_class"];


    if (isset($_POST["$id_class"])) {
        $insertarDATOS = $mysqli->query("INSERT INTO info_classes(id_info_fk,id_class_fk) VALUES ('$id_info','$id_class')");
        // print_r($name_class);
    }
};
header("Location:./lobby.php");
die();