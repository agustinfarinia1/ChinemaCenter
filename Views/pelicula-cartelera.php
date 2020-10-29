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
                        <h5>Titulo de la pelicula</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://image.tmdb.org/t/p/w500/xoqr4dMbRJnzuhsWDF3XNHQwJ9x.jpg" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Titulo de la pelicula</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://image.tmdb.org/t/p/w500/86L8wqGMDbwURPni2t7FQ0nDjsH.jpg" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Titulo de la pelicula</h5>
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

            <div class="col-4 my-2 slide-top1">
                <img src="https://image.tmdb.org/t/p/w500/zGVbrulkupqpbwgiNedkJPyQum4.jpg" class="img-fluid" alt="">
                <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
            </div>

            <div class="col-4 my-2 slide-top2">
                <img src="https://image.tmdb.org/t/p/w500/kiX7UYfOpYrMFSAGbI6j1pFkLzQ.jpg" class="img-fluid img-thumbnail" alt="">
                <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
            </div>

            
            <div class="col-4 my-2 slide-top3">
                <img src="https://image.tmdb.org/t/p/w500/ltyARDw2EFXZ2H2ERnlEctXPioP.jpg" class="img-fluid rounded" alt="">
                <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
            </div>
            
            <div class="col-4 mt-3">
                <div class="card">
                    <img src="https://image.tmdb.org/t/p/w500/4gKyQ1McHa8ZKDsYoyKQSevF01J.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

            <div class="col-4 mt-3">
                <div class="card">
                    <img src="https://image.tmdb.org/t/p/w500/zzWGRw277MNoCs3zhyG3YmYQsXv.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

            <div class="col-4 mt-3">
                <div class="card">
                    <img src="https://image.tmdb.org/t/p/w500/r5srC0cqU36n38azFnCyReEksiR.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>


        </div><!-- Fin lista de peliculas -->
        
    </div>

</main>