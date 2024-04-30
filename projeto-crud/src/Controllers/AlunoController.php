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
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";

        if ($acao == "inserir" && $status == "true"){
            $cor = "success";
            $mensagem = "Registro inserido com sucesso!";
        }
        elseif ($acao == "inserir" && $status == "false"){
            $cor = "danger";
            $mensagem = "Erro ao inserir!";
        }
        elseif ($acao == "alterar" && $status == "true"){
            $cor = "warning";
            $mensagem = "Registro alterado com sucesso!";
        }
        elseif ($acao == "alterar" && $status == "false"){
            $cor = "danger";
            $mensagem = "Erro ao alterar!";
        }
        elseif ($acao == "excluir" && $status == "true"){
            $cor = "secondary";
            $mensagem = "Registro excluído com sucesso!";
        }
        elseif ($acao == "excluir" && $status == "false"){
            $cor = "danger";
            $mensagem = "Erro ao excluir!";
        }
        else
            $mensagem = "";
        require_once ("../src/Views/Aluno/Index.php");
    }

    public function buscar($params)
    {
        $id =$_POST['id'];
        $alunoDao = new AlunoDAO();
        $resultado = $alunoDao->consultarPorId($id);
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
            header("Location: /aluno/visualizar/inserir/true");
        } else {
            header("Location: /aluno/visualizar/inserir/false");
        }
    }

    public function editar($params)
    {
        $id = $params[1];
        $AlunoDAO = new AlunoDAO();
        $resultado = $AlunoDAO->consultarPorId($id);
        require_once ("../src/Views/Aluno/Editar.php");
    }

    public function alterado($params)
    {
        $aluno = new Aluno($params[1], $_POST['nome'], $_POST['idade'], $_POST['cpf']);
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->alterar($aluno)) {
            header("Location: /aluno/visualizar/alterar/true");
        } else {
            header("Location: /aluno/visualizar/alterar/false");
        }
    }

    public function excluir($params)
    {
        $id = $params[1];
        $AlunoDAO = new AlunoDAO();
        $resultado = $AlunoDAO->consultarPorId($id);
        require_once ("../src/Views/Aluno/Excluir.php");
    }

    public function excluido($params)
    {
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->excluir($params[1])) {
            header("Location: /aluno/visualizar/excluir/true");
        } else {
            header("Location: /aluno/visualizar/excluir/false");
        }
    }

}