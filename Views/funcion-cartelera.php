<?php

include('nav-bar.php');
require_once("validate-session.php");

?>

    <main class="min-vh-100 d-flex justify-content-center">

        <div class="w-75">

            <div id="carouselExampleIndicators" class="carousel slide mb-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                        <img src="https://image.tmdb.org/t/p/w500/5UkzNSOK561c2QRy2Zr4AkADzLT.jpg" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <a class="btn btn-outline-info" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Titulo de la pelicula</a>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://image.tmdb.org/t/p/w500/xoqr4dMbRJnzuhsWDF3XNHQwJ9x.jpg" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <a class="btn btn-outline-primary" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Titulo de la pelicula</a>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://image.tmdb.org/t/p/w500/86L8wqGMDbwURPni2t7FQ0nDjsH.jpg" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <a class="btn btn-info" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Titulo de la pelicula</a>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row"><!-- Lista de peliculas -->                

                <div class="col-3 my-2 slide-top1">
                    <img src="https://image.tmdb.org/t/p/w500/zGVbrulkupqpbwgiNedkJPyQum4.jpg" class="img-fluid rounded" alt="">
                    <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
                </div>

                <div class="col-3 my-2 slide-top2">
                    <img src="https://image.tmdb.org/t/p/w500/kiX7UYfOpYrMFSAGbI6j1pFkLzQ.jpg" class="img-fluid rounded" alt="">
                    <a class="btn btn-link btn-block" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Titulo de la peli</a>
                </div>

                
                <div class="col-3 my-2 slide-top3">
                    <img src="https://image.tmdb.org/t/p/w500/ltyARDw2EFXZ2H2ERnlEctXPioP.jpg" class="img-fluid rounded" alt="">
                    <a class="btn btn-link btn-block" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Titulo de la peli</a>
                </div>

                <div class="col-3 my-2 slide-top4">
                    <img src="https://image.tmdb.org/t/p/w500/zGVbrulkupqpbwgiNedkJPyQum4.jpg" class="img-fluid rounded" alt="">
                    <a class="btn btn-link btn-block" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Titulo de la peli</a>
                </div>

            </div><!-- Fin lista de peliculas -->
            
        </div>

        

    </main>