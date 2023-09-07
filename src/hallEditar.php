<?php
session_start();
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["editEmail"];
    $password = $_POST["editPassword"];
    $name = $_POST["editName"];
    $lastName = $_POST["editLastname"];
    $address = $_POST["editAddress"];
    $birthday = $_POST["editBirthday"];

    $id_info = $_SESSION["id_info"];

    $selectInfo = $mysqli->query("SELECT * FROM info WHERE id_info = '$id_info'");
    $datosInfo = $selectInfo->fetch_assoc();
    // var_dump($password);

    if ($password == "") {
        $password = $datosInfo["password"];
        // var_dump($password);
    }
    $insertInfo = $mysqli->query("UPDATE info SET name = '$name',lastname = '$lastName',password = '$password',address ='$address',birthday = '$birthday' WHERE id_info = '$id_info'");
    $_SESSION["nombre"] = $name;
    $_SESSION["apellido"] = $lastName;
    header("Location:./lobby.php");
} else {

    $_SESSION["edit_error"] = "Erro al enviar datos.";
    header("Location:../index.php");
    die();
}