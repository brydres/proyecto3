<?php
session_start();
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $veryficationEmail = $_POST["emailLg"];
    $veryficationEntry = $mysqli->query("SELECT * FROM info WHERE email = '$veryficationEmail'");
    $datosEntry = $veryficationEntry->fetch_assoc();
    // var_dump($datosEntry["state"]);
    if ($datosEntry["state"] == 1) {

        $_SESSION["email_Lg"] = $_POST["emailLg"];
        $_SESSION["pass_Lg"] = $_POST["passLg"];

        $eLG = $_SESSION["email_Lg"];
        $pLG = $_SESSION["pass_Lg"];

        $resultLog = $mysqli->query("SELECT * FROM info WHERE email = '$eLG' AND password ='$pLG'");
        $datosLog = $resultLog->fetch_assoc();

        // $resultLog = $mysqli->query("SELECT * FROM info WHERE email = '$eLG' AND password ='$pLG'");
        // $datosLog = $resultLog->fetch_assoc();

        $datosLogRow = $resultLog->num_rows;

        if ($datosLogRow == 1) {

            $_SESSION["nombre"] = $datosLog["name"];
            $_SESSION["apellido"] = $datosLog["lastname"];
            $_SESSION["pemision1"] = " ";
            $_SESSION["pemision2"] = " ";
            $_SESSION["pemision3"] = " ";
            $_SESSION["id_info"] = $datosLog["id_info"];

            if ($datosLog["id_rol"] == 1) {
                $_SESSION["cargo"] = "Administrador";
                $_SESSION["menuCargo"] = "ADMINISTRACIÓN";
                $_SESSION["pemision1"] = "hidden";
            } elseif ($datosLog["id_rol"] == 2) {
                $_SESSION["cargo"] = "Maestro";
                $_SESSION["menuCargo"] = "MAESTROS";
                $_SESSION["pemision2"] = "hidden";
            } elseif ($datosLog["id_rol"] == 3) {
                $_SESSION["menuCargo"] = "ALUMNOS";
                $_SESSION["cargo"] = "Alumno";
                $_SESSION["pemision3"] = "hidden";
            }
            $_SESSION["message_error"] = "&#160;";
            header("Location:./lobby.php");
            die();
        } else {
            $_SESSION["message_error"] = "Usuario o contraseña incorrectos.";
            header("Location:../index.php");
            die();
        }
    } elseif ($datosEntry["state"] == 0) {
        $_SESSION["message_error"] = "Usuario Inactivo.";
        header("Location:../index.php");
        die();
    }
} else {

    $_SESSION["message_error"] = "Error al enviar datos.";
    header("Location:../index.php");
    die();
}