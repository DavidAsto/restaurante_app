<!DOCTYPE html>
<html lang="es">
<?php
        $ruta = "../..";
        $titulo = "FoodTech";
    include("../includes/cabecera.php");
?>
<head>
    <!-- Bootstrap CSS -->
    <!-- Font Awesome for Icons -->
    <style>
        /* Ajuste de los botones del carrusel */

    </style>
</head>

<body>
    <?php include("../includes/menu.php"); ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-university"></i> <?=$titulo?></h1>
            <hr/>
        </header>

        <section>
            <article>
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?=$ruta?>/img/slide1.jpg" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="<?=$ruta?>/img/slide2.jpg" class="d-block w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="<?=$ruta?>/img/slide3.jpg" class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
            </article>
        </section>
    </div>


                
            </article>
        </section>
        
    </div>

    <?php include("../includes/pie.php"); ?>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inicializa el carrusel con un intervalo de 2 segundos
            var myCarousel = new bootstrap.Carousel(document.querySelector('#carouselExample'), {
                interval: 1800, // Cambio automático cada 2 segundos
                ride: 'carousel' // Auto-inicia el carrusel
            });
        });
    </script>
</body>

</html>
