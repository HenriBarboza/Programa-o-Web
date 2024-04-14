<?php

namespace Php\ProjetoBanco\Controllers;

use Php\ProjetoBanco\Models\DAO\AlunoDAO;
use Php\ProjetoBanco\Models\Domain\Aluno;



class AlunoController
{
    public function index($params)
    {
        $alunoDao = new AlunoDAO();
        $resultado = $alunoDao->consultar();
        require_once ("../src/Views/Aluno/Index.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/Aluno/Adicionar.php");
    }

    public function novo($params)
    {
        $aluno = new Aluno(0, $_POST['nome'], $_POST['idade'], $_POST['cpf']);
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->inserir($aluno)) {
            $sucesso = "Inserido com sucesso!";
            header("Location: /aluno/visualizar?sucesso=" . urlencode($sucesso));
            exit;
        } else {
            $falha = "Erro ao inserir!";
            header("Location: /aluno/visualizar?falha=" . urlencode($falha));
            exit;
        }
    }

}