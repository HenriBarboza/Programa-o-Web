<?php

namespace Php\ProjetoBanco\Controllers;

use PDOException;
use Php\ProjetoBanco\Models\DAO\ProfessorDAO;
use Php\ProjetoBanco\Models\Domain\Professor;



class ProfessorController
{
    public function index($params)
    {
        $professorDao = new ProfessorDAO();
        $resultado = $professorDao->consultar();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";

        if ($acao == "inserir" && $status == "true") {
            $cor = "success";
            $mensagem = "Registro inserido com sucesso!";
        } elseif ($acao == "inserir" && $status == "false") {
            $cor = "danger";
            $mensagem = "Erro ao inserir!";
        } elseif ($acao == "alterar" && $status == "true") {
            $cor = "warning";
            $mensagem = "Registro alterado com sucesso!";
        } elseif ($acao == "alterar" && $status == "false") {
            $cor = "danger";
            $mensagem = "Erro ao alterar!";
        } elseif ($acao == "excluir" && $status == "true") {
            $cor = "secondary";
            $mensagem = "Registro excluído com sucesso!";
        } elseif ($acao == "excluir" && $status == "false") {
            $cor = "danger";
            $mensagem = "Erro ao excluir! Talvez o professor esteja matriculado em algum curso. 
            Remova sua matrícula e tente novamente.";
        } else
            $mensagem = "";
        require_once ("../src/Views/Professor/Index.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/Professor/Adicionar.php");
    }

    public function novo($params)
    {
        $professor = new Professor(0, $_POST['nome'], $_POST['cpf'], $_POST['carga_horaria'], $_POST['formacao']);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->inserir($professor)) {
            header("Location: /professor/visualizar/inserir/true");
        } else {
            header("Location: /professor/visualizar/inserir/false");
        }
    }

    public function editar($params)
    {
        $id = $params[1];
        $ProfessorDAO = new ProfessorDAO();
        $resultado = $ProfessorDAO->consultarPorId($id);
        require_once ("../src/Views/Professor/Editar.php");
    }

    public function alterado($params)
    {
        $professor = new Professor($params[1], $_POST['nome'], $_POST['cpf'], $_POST['carga_horaria'], $_POST['formacao']);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->alterar($professor)) {
            header("Location: /professor/visualizar/alterar/true");
        } else {
            header("Location: /professor/visualizar/alterar/false");
        }
    }

    public function excluir($params)
    {
        $id = $params[1];
        $ProfessorDAO = new ProfessorDAO();
        $resultado = $ProfessorDAO->consultarPorId($id);
        require_once ("../src/Views/Professor/Excluir.php");
    }

    public function excluido($params)
    {
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->excluir($params[1])) {
            header("Location: /professor/visualizar/excluir/true");
        } else {
            header("Location: /professor/visualizar/excluir/false");
        }
    }

}