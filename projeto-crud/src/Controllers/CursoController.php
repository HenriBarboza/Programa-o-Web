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
            $mensagem = "Erro ao excluir!";
        } else
            $mensagem = "";
        require_once ("../src/Views/Curso/Index.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/Curso/Adicionar.php");
    }

    public function novo($params)
    {
        $curso = new Curso(0, $_POST['id_professor'], $_POST['nome'], $_POST['sala'], $_POST['horario'], );
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->inserir($curso)) {
            header("Location: /curso/visualizar/inserir/true");
            exit;
        } else {
            header("Location: /curso/visualizar/inserir/false");
            exit;
        }
    }

    public function editar($params)
    {
        $id = $params[1];
        $cursoDAO = new CursoDAO();
        $resultado = $cursoDAO->consultarPorId($id);
        require_once ("../src/Views/Curso/Editar.php");
    }

    public function alterado($params)
    {
        $curso = new Curso($params[1], $_POST['id_professor'], $_POST['nome'], $_POST['sala'], $_POST['horario']);
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->alterar($curso)) {
            header("Location: /curso/visualizar/alterar/true");
        } else {
            header("Location: /curso/visualizar/alterar/false");
        }
    }

    public function excluir($params)
    {
        $id = $params[1];
        $cursoDAO = new CursoDAO();
        $resultado = $cursoDAO->consultarPorId($id);
        require_once ("../src/Views/Curso/Excluir.php");
    }

    public function excluido($params)
    {
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->excluir($params[1])) {
            header("Location: /curso/visualizar/excluir/true");
        } else {
            header("Location: /curso/visualizar/excluir/false");
        }
    }

}