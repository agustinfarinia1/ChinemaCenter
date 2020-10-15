<<<<<<< HEAD

<?php
include('nav-bar.php');
require_once("validate-session.php");
// echo '<label for="genero">Eliga un Genero:</label>';
// echo '<select id="genero" name="genero">';

// foreach ($generoslist as $genero) {

    
//     //echo $genero->getIdGenero() . " " . $genero->getGenero() . "<br>";

//    echo "<option value= " .$genero->getIdGenero(). ">" .$genero->getGenero(). "</option>";
   
// }
// echo '</select>'
?>

<form class="form-inline" action="pelicula-list.php" method="POST">

        <div class="form-group mb-2">
        <label for="genero" class="text-secondary" >Genero:</label>
        <select id="genero" name="genero">
            <?php
                 foreach ($generoslist as $genero) {
            
                echo "<option value= " .$genero->getIdGenero(). ">" .$genero->getGenero(). "</option>";
               
                }
            ?>  
        </select>
        </div>
        <div class="form-group mb-2">
            <label for="fechaEntrada"  class="text-secondary">Peliculas desde la fecha</label>
            <input type="date" name="fechainicio" id="fechaEntrada" min="2018-12-31">            
        </div>

        <div class="form-group mb-2">
            <label for="fechaSalida"  class="text-secondary">Hasta la fecha </label>
            <input type="date" name="fechafinal" id="fechaSalida" min="2020-10-15">   
        </div>
       
        <div class="form-group mb-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
        
</form>



<?php 


use Controllers\PeliculaController as PeliculaController;


$pelicula = new PeliculaController();

echo "<pre>";
var_dump($pelicula->getPeliculasPorGenero(1,53,"2020-01-10","2020-10-10"));   // Puede buscar por genero solo o por genero y
echo "</pre>";

<script>    

    const generoItem = (genero) => {
        // console.log(genero)
        const generostHTML = document.querySelector("#generos")
        const item = document.createElement("option")
        item.innerHTML = genero.name
        item.value = genero.id
        generostHTML.appendChild(item)
    }
  
    const listarPëliculas = async() => {
        
        const url = 'https://api.themoviedb.org/3/movie/now_playing?api_key=<?php echo API_KEY ?>&language=en-US&page=1'
        
        try {
            const res = await fetch(url)
            const data = await res.json()   
            console.log(data) 
            const {results:peliculas} = data                   

            peliculas.forEach( pelicula => peliculaItem(pelicula))

        } catch (error) {
            console.log(error)
        }

    }

    const peliculaItem = (pelicula) => {
        const peliculasListHTML = document.querySelector("#listarPëliculas")

        // const item = document.createElement("p")
        // item.innerHTML = pelicula.title
        // peliculasListHTML.appendChild(item)

        const img = new Image();

        let urlImg = (pelicula.poster_path)
                        ? `https://image.tmdb.org/t/p/w500${ pelicula.poster_path }`
                        : '<?php echo IMG_PATH ?>fondo3.jpg'

        img.src = urlImg

        peliculasListHTML.appendChild(img)
    }
    listarGeneros()
    listarPëliculas()

</script>

<div class="container">

    <div id="listarPëliculas">

        <h2 class="text-center">Peliculas</h2>

        <div>
            <select name="generos" id="generos">                      
            </select>

            <!-- <input 
                type="datetime-local" 
                id="meeting-time"
                name="meeting-time" 
                value="2018-06-12T19:30"
                min="2018-06-07T00:00" 
                max="2018-06-14T00:00"
            > -->
<!-- 
            <input 
                type="date" 
                name="fecha" 
                value="2020-10-14"
                min="2020-07-10" 
                max="2020-11-15"
            >
          
        </div>        
    </div>    
    
    <nav class="mt-3">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div> --> -->

?>

<!-- Codigo de Julian -->
<?php 
    // include('nav-bar.php');
    // require_once("validate-session.php");


    
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
                        <div class="card-body" style="width: 300px">
                            <h5 class="negrita"><?php echo $pelicula->{'title'} ?> </h5>
                            <p class="negrita"> <?php echo $pelicula->{'overview'} ?> </p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php
        }
        
    ?>

