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
                        <div class=" table table-striped table-bordered" id="home" role="tabpanel">
                            <div class="table-responsive">
                           <table class="table">
    
    
    <thead class="thead-dark">
        <tr><?php
            $deptos = ["DEPTO", "CH", "LPZ", "CBBA", "OR", "PO", "TJ", "SCZ", "BE", "PD"];
            for ($i=0; $i < count($deptos) ; $i++) { 
                echo "<th scope='col'>".$deptos[$i]."</th>";
            }?>
        </tr>
    </thead>
    <tbody>
    <?php
        $deptos = ["nn", "CH", "LPZ", "CBBA", "OR", "PO", "TJ", "SCZ", "BE", "PD"];
        $notast = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        
        $cont = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        /*
        print_r($_SESSION["notasRow"]);
        echo '<br>';
        var_dump($_SESSION['notasRow']);
        */
        foreach ($_SESSION['notasRow'] as $row) {
            $notast[intval($row['departamento'])] += intval($row['notafinal']);
            $cont[intval($row['departamento'])]++;
        }
        ?>
        <tr class='inner-box'>
            <td>
                NOTA
            </td>
            <?php for ($i = 1; $i < count($cont); $i++) : ?>
                <td>
                    <div class='inner-boc'>
                        <?php echo ($cont[$i] > 0) ? ($notast[$i] / $cont[$i]) : 0; ?>
                    </div>
                </td>
            <?php endfor; ?>
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