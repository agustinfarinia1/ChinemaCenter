<?php 
    include('nav-bar.php');
    require_once("validate-session.php");


    
    $api = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?with_genres=53&api_key=7e5de46aba8f155b486beee9b4b4cc4f', true);
    $data = json_decode($api);
    
    $peliculas = $data->{'results'};

    //echo var_dump($data);
?>
<div class="card-deck">
    <?php foreach($peliculas as $pelicula) { ?>
        <div class="col-sm-1 col-md-1 col-lg-3">
            <div class="card" style="width: 300px">
                    <img src="https://image.tmdb.org/t/p/w500/<?php echo $pelicula->{'poster_path'} ?>" class="card-img-top" alt=" <?php  echo $pelicula->{'title'} ?> ">
                        <div class="card-body">
                            <h5 class="negrita"><?php echo $pelicula->{'title'} ?> </h5>
                            <p class="negrita"> <?php echo $pelicula->{'overview'} ?> </p>
            </div>
        </div>
    </div>
    <?php
        }
    ?>