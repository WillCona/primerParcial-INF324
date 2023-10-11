<?php
//session_start();
include "conexion.php";

$usuario = $_SESSION['usuarioo'];

$pdo = new conexion();
$sql = $pdo->prepare("SELECT * FROM usuario WHERE usuario=:usuario");

$sql->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);

$usuarios = $sql->fetch();

$colores = $usuarios['color'];
?>