<?php

namespace Php\ProjetoBanco\Models\Dao;

use PDO;

class Conexao{

    private $conexao;

    public function __construct(){
        $this->conexao = 
            new PDO("mysql:host=localhost; dbname=escola", "root", "");
    }

    public function getConexao(){
        return $this->conexao;
    }
}