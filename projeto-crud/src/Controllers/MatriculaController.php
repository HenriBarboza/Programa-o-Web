<?php

namespace Php\ProjetoBanco\Controllers;

use Php\ProjetoBanco\Models\DAO\MatriculaDAO;
use Php\ProjetoBanco\Models\Domain\Matricula;



class MatriculaController
{
    public function index($params)
    {
        $matriculaDao = new MatriculaDAO();
        $resultado = $matriculaDao->consultar();
        require_once ("../src/Views/matricula/Index.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/matricula/Adicionar.php");
    }

    public function novo($params)
    {
        $matricula = new Matricula(0, $_POST['id_alu'], $_POST['id_cur'],$_POST['periodo'], 0);
        $matriculaDAO = new MatriculaDAO();
        if ($matriculaDAO->inserir($matricula)) {
            $sucesso = "Inserido com sucesso!";
            header("Location: /matricula/visualizar?sucesso=" . urlencode($sucesso));
            exit;
        } else {
            $falha = "Erro ao inserir!";
            header("Location: /matricula/visualizar?falha=" . urlencode($falha));
            exit;
        }
    }

}