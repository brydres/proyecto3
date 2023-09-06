<?php
session_start();
require("connection.php");
$inputIdS = $_POST["inputIdS"];
$inputEmailS = $_POST["inputEmailS"];
$permisoSelect = $_POST["permisoSelect"];

if ($_POST["permisoCheckbox"] == 1) {
    $permisoEstado = 1;
} elseif ($_POST["permisoCheckbox"] == NULL) {
    $permisoEstado = 0;
}

// print_r($inputIdS . " " . $inputEmailS . " " . $permisoSelect . " " . $permisoEstado);
$updatePermisos = $mysqli->query("UPDATE info SET email= '$inputEmailS',id_rol = '$permisoSelect',state = '$permisoEstado' WHERE id_info = '$inputIdS'");


// print_r($_POST["permisoCheckbox"]);
header("Location:./lobby.php");
die();