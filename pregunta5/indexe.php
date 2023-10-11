<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
</head>

<?php
//session_start();
include "./includes/head.inc.php";
include "./includes/obtenerColor.php";
?>
<body style="background-color: <?php echo $colores;?>;">

   
    <div class="event-schedule-area-two bg-color pad100">
        <div class="container">
            <?php
            include "./includes/title.inc.php";
            ?>

        <h2 class="">Bienvenido usuario: <?php echo $_SESSION['usuarioo'];?></h2>
        <h2 class="">Ingreso con rol: <?php echo $_SESSION['rol'];?> </h2>
        <h3>Desea cambiar el background</h3>
        <form method="POST" action="color.php">
            <div class="form-group">
                <label for="colorPicker">Elige un color:</label>
                <input type="color" class="" id="colorPicker" name="colorPicker" value="<?php echo $colores;?>">
            </div>
            <button type="submit" class="btn btn-primary">Cambiar color</button>
        </form>
        <br>
            <form  method="post" action="logout.php">
                    <button class="btn btn-danger" type="submit">Cerrar Sesión</button>
            </form>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h2>DATOS ESTUDIANTE: </h2>
                    <?php
                        if (is_array($_SESSION["persona"])) {
                            //print_r($_SESSION["persona"]);
                            echo  "<h3> CI: ".$_SESSION["persona"]["ci"]."</h2>";
                            echo  "<h3> Nombre: ".$_SESSION["persona"]["nombre_completo"]."</h2>";
                            echo  "<h3> Fecha de Nacimiento: ".$_SESSION["persona"]["fecha_nacimiento"]."</h2>";
                            echo  "<h3> Telefono: ".$_SESSION["persona"]["telefono"]."</h2>";
                            echo  "<h3> Departamento: ".$_SESSION["persona"]["departamento"]."</h2>";
                        } else {
                            echo "No es un array.";
                        }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <?
    include "./includes/head.inc.php";
    ?>
</body>

</html>
