<?php 
    include './includes/header.inc.php';
?>

<!-- Contenido de la página actual -->
<!-- Contenido de la página actual -->
<style>
    /* Estilo CSS personalizado para las imágenes */
    .img-custom {
        max-width: 100%; /* Asegura que las imágenes no excedan el ancho de su contenedor */
        height: auto; /* Mantiene la proporción de aspecto original de las imágenes */
        display: block; /* Elimina espacios en blanco no deseados debajo de las imágenes */
        margin: 0 auto; /* Centra horizontalmente las imágenes */
    }
</style>
<div class="container mt-5">
    <h1 class="text-center">Bienvenido a al sitio web</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-md-4 text-center">
            <a href="./paginas/Carrera" class="btn btn-primary">
                <img src="./img/carrera.png" alt="Carrera de Informática" class="img-custom">
                <p class="mt-2">Carrera de Informática</p>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="./paginas/kardex" class="btn btn-primary">
                <img src="./img/kardex.png" alt="Kardex" class="img-custom">
                <p class="mt-2">Kardex</p>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="./paginas/instituto" class="btn btn-primary">
                <img src="./img/centro.png" alt="Centro de Investigación" class="img-custom">
                <p class="mt-2">Centro de Investigación</p>
            </a>
        </div>
    </div>
</div>

<?php  include './includes/footer.inc.php';?>