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
    /*$sql = "SELECT
	sum(case when departamento='01' then cantidad else 0 end) as CHUQUISACA,
	sum(case when departamento='02' then cantidad else 0 end) as LA_PAZ,
	sum(case when departamento='03' then cantidad else 0 end) as ORURO,
	sum(case when departamento='04' then cantidad else 0 end) as POTOSI
    FROM 
    (
        SELECT departamento, (nota1 + nota2 + nota3 + notafinal)/4 as cantidad
        FROM inscripcion
        INNER JOIN persona ON inscripcion.ci_estudiante = persona.ci
        GROUP BY persona.ci, inscripcion.sigla
    ) as depto;";
    */

    $sql = "select
    AVG(case when persona.departamento ='01' then notafinal else 0 end) CHU,
    AVG(case when persona.departamento ='02' then notafinal else 0 end) LPZ,
    AVG(case when persona.departamento ='03' then notafinal else 0 end) CBBA,
    AVG(case when persona.departamento ='04' then notafinal else 0 end) ORU,
    AVG(case when persona.departamento ='05' then notafinal else 0 end) PO,
    AVG(case when persona.departamento ='06' then notafinal else 0 end) TJ,
    AVG(case when persona.departamento ='07' then notafinal else 0 end) SCZ,
    AVG(case when persona.departamento ='08' then notafinal else 0 end) BE,
    AVG(case when persona.departamento ='09' then notafinal else 0 end) PD
    from inscripcion
    INNER JOIN persona WHERE persona.ci = inscripcion.ci_estudiante;
    ";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $notasRow = $sql->fetch();
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



