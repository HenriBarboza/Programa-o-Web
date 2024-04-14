<?php

namespace Php\ProjetoBanco\Controllers;

use Php\ProjetoBanco\Models\DAO\ProfessorDAO;
use Php\ProjetoBanco\Models\Domain\Professor;



class ProfessorController
{
    public function index($params)
    {
        $professorDao = new ProfessorDAO();
        $resultado = $professorDao->consultar();
        require_once ("../src/Views/Professor/Index.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/Professor/Adicionar.php");
    }

    public function novo($params)
    {
        $professor = new Professor(0, $_POST['nome'], $_POST['cpf'],$_POST['carga_horaria'], $_POST['formacao'],);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->inserir($professor)) {
            $sucesso = "Inserido com sucesso!";
            header("Location: /professor/visualizar?sucesso=" . urlencode($sucesso));
            exit;
        } else {
            $falha = "Erro ao inserir!";
            header("Location: /professor/visualizar?falha=" . urlencode($falha));
            exit;
        }
    }

}