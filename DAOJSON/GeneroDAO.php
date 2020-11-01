<?php
    namespace DAOJSON;

    use Models\Genero as Genero;

    class GeneroDao 
    {
        private $listaGeneros = array();
        

        public function getAllGenres()
        {            
             $this->listaGeneros = array();

             $apiContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?&api_key=7e5de46aba8f155b486beee9b4b4cc4f', true);
             $data = json_decode($apiContent);

            //guardame todos los datos bajo la key genres
             $generos = $data->{'genres'};
                 
                 foreach($generos as $GenresMovie)
                 {
                     $genero = new Genero();
                     //var_dump($GenresMovie);
                     
                     $genero->setIdGenero($GenresMovie->{'id'});
                     $genero->setGenero($GenresMovie->{'name'});
                     

                     array_push($this->listaGeneros, $genero);
                 }
                
                 return $this->listaGeneros;

            //otra manera de retornar la api por un atributo en especifico
            //return  $data->{'genres'};
        }

        

        
    }

?>