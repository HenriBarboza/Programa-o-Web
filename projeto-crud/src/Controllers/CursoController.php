<?php

namespace Php\ProjetoBanco\Controllers;

use Php\ProjetoBanco\Models\DAO\CursoDAO;
use Php\ProjetoBanco\Models\Domain\Curso;



class CursoController
{
    public function index($params)
    {
        $cursoDao = new CursoDAO();
        $resultado = $cursoDao->consultar();
        require_once ("../src/Views/Curso/Index.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/Curso/Adicionar.php");
    }

    public function novo($params)
    {
        $curso = new Curso(0, $_POST['id_professor'], $_POST['nome'],$_POST['sala'], $_POST['horario'],);
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->inserir($curso)) {
            $sucesso = "Inserido com sucesso!";
            header("Location: /Curso/visualizar?sucesso=" . urlencode($sucesso));
            exit;
        } else {
            $falha = "Erro ao inserir!";
            header("Location: /Curso/visualizar?falha=" . urlencode($falha));
            exit;
        }
    }

}