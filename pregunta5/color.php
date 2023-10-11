<?php 

session_start();
include "./includes/conexion.php";

$color = $_POST["colorPicker"];
$usuario = $_SESSION['usuarioo'];

$pdo = new conexion();
$sql = $pdo->prepare("UPDATE usuario SET color = :color WHERE usuario = :usuario");

$sql->bindParam(':color', $color, PDO::PARAM_STR);
$sql->bindParam(':usuario', $usuario, PDO::PARAM_STR);

if ($sql->execute()) {
    
} else {
    echo "Error al actualizar el color. $color";
}

if($_SESSION['rol'] == "Docente"){
    header("Location: index.php");
}

if($_SESSION['rol'] == "Estudiante"){
    header("Location: indexe.php");
}

?>