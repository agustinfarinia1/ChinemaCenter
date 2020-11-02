<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista cine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script>
        const obtenerPeliculas = async() => {
            try {
                const res = await fetch('https://api.themoviedb.org/3/movie/now_playing?api_key=7e5de46aba8f155b486beee9b4b4cc4f&language=en-US&page=1')
                const data = await res.json()
                console.log(data)
            } catch (error) {
                console.log(error)
            }
        }
       obtenerPeliculas()
    </script>

    <style>
        .slide-top1 {
            -webkit-animation: slide-top 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                    animation: slide-top 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        .slide-top2 {
            -webkit-animation: slide-top 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                    animation: slide-top 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        .slide-top3 {
            -webkit-animation: slide-top 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                    animation: slide-top 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @-webkit-keyframes slide-top {
            0% {
                -webkit-transform: translateY(100px);
                        transform: translateY(100px);
            }
            100% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
            }
        }
        @keyframes slide-top {
            0% {
                -webkit-transform: translateY(100px);
                        transform: translateY(100px);
            }
            100% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
            }
        }

    </style>

</head>
<body class="bg-dark text-light">

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

                <div class="col-3 my-2 slide-top1">
                    <img src="https://image.tmdb.org/t/p/w500/zGVbrulkupqpbwgiNedkJPyQum4.jpg" class="img-fluid" alt="">
                    <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
                </div>

                <div class="col-3 my-2 slide-top2">
                    <img src="https://image.tmdb.org/t/p/w500/kiX7UYfOpYrMFSAGbI6j1pFkLzQ.jpg" class="img-fluid img-thumbnail" alt="">
                    <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
                </div>

                
                <div class="col-3 my-2 slide-top3">
                    <img src="https://image.tmdb.org/t/p/w500/ltyARDw2EFXZ2H2ERnlEctXPioP.jpg" class="img-fluid rounded" alt="">
                    <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
                </div>

                <div class="col-3 my-2 slide-top1">
                    <img src="https://image.tmdb.org/t/p/w500/zGVbrulkupqpbwgiNedkJPyQum4.jpg" class="img-fluid" alt="">
                    <button type="button" class="btn btn-link btn-block">Titulo de la peli</button>
                </div>
                
                <!-- <div class="col-4 mt-3">
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
                </div> -->

                <!-- <div class="col-4 mt-3">
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
                </div> -->


            </div><!-- Fin lista de peliculas -->
            
        </div>

        

    </main>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>