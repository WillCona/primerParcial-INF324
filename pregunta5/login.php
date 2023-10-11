<?php
//session_start();
include "./includes/conexion.php";

if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
} else {
    header("Location: login_form.php");
    die();
}

$pdo = new conexion();
$sql = $pdo->prepare("SELECT * FROM usuario WHERE usuario=:usuario AND password=:pass");
$sql->bindParam(':usuario', $usuario);
$sql->bindParam(':pass', $password);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);

$usuario = $sql->fetch();

$color = $usuario['color'];



$sql = $pdo->prepare("SELECT * FROM rol WHERE ci=:ci");
$sql->bindParam(':ci', $usuario["ci"]);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$rol = $sql->fetch();

$_SESSION['color'] = $color;
$_SESSION['usuarioo'] = $usuario['usuario'];
$_SESSION['info'] = $usuario;
if (!empty($rol["rol"]) && $rol["rol"] == "Docente") {


    $sql = "select
    persona.departamento, inscripcion.notafinal
    from inscripcion
    INNER JOIN persona WHERE persona.ci = inscripcion.ci_estudiante;
    ";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $notasRow = $sql->fetchAll();
    $_SESSION['notasRow'] = $notasRow;
    $_SESSION['rol'] = "Docente";
    $_SESSION['usuario'] = $usuario["usuario"];
    header("Location: index.php");
    
}else if(!empty($rol["rol"]) && $rol["rol"] == "Estudiante"){

    $_SESSION['info'] = $usuario; 
    
    $sql = $pdo->prepare("SELECT * FROM persona WHERE ci=:ci");
    $sql->bindParam(':ci', $usuario["ci"]);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $rol = $sql->fetch();
    
    $_SESSION['rol'] = "Estudiante";
    $_SESSION["persona"] = $rol;
    
    header("Location: indexe.php");
}else if (empty($usuario["ci"])) {
    header("Location: login_form.php");
}else{
    $_SESSION['usuario'] = $usuario["usuario"];
    header("Location: index.php");
}



