<?php

namespace Models;

class Genero
{

    private $id_genero;
    private $genero;

    public function Genero()
    {
        
    }

    public function getIdGenero()
    {
        return $this->id_genero;
    }

    public function setIdGenero($id_genero)
    {
        $this->id_genero = $id_genero;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
}
