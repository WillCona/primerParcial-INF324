<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
</head>
<?php

include "./includes/head.inc.php";
include "./includes/isLogin.php";
include "./includes/isDirector.php";
include "./includes/obtenerColor.php";
?>

<body style="background-color: <?php echo $colores;?>;">

   
    <div class="event-schedule-area-two bg-color pad100">
        <div class="container">
            <?php
            include "./includes/title.inc.php";
            ?>

        <h2 class="">Bienvenido usuario: <?php echo $_SESSION['usuario'];?></h2>
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
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <?php
                                            foreach($_SESSION['notasRow'] as $key => $value){
                                                echo '<th scope="col">'.$key.'</th>';
                                            }
                                        ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr class='inner-box'>
                                        <?php
                                        foreach ($_SESSION['notasRow'] as $key => $value) {
                                            echo "
                                            <td>
                                                <div class='inner-boc'>
                                                    $value
                                                </div>
                                            </td>
                                        ";
                                        }
                                        ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?
    include "./includes/head.inc.php";
    ?>
</body>

</html>