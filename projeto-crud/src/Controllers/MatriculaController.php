<?php

namespace Php\ProjetoBanco\Controllers;

use Php\ProjetoBanco\Models\DAO\MatriculaDAO;
use Php\ProjetoBanco\Models\Domain\Matricula;
use Php\ProjetoBanco\Models\DAO\AlunoDAO;
use Php\ProjetoBanco\Models\DAO\CursoDAO;


class MatriculaController
{
    public function index($params)
    {
        $matriculaDao = new MatriculaDAO();
        $resultado = $matriculaDao->consultar();
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
        require_once ("../src/Views/matricula/Index.php");
    }

    public function inserir($params)
    {
        $alunoDAO = new AlunoDAO();
        $resultadoAluno = $alunoDAO->consultar();
        $cursoDAO = new CursoDAO();
        $resultadoCurso= $cursoDAO->consultar();
        require_once ("../src/Views/matricula/Adicionar.php");
    }

    public function novo($params)
    {
        $matricula = new Matricula(0, $_POST['id_alu'], $_POST['id_cur'],$_POST['periodo'], 0);
        $matriculaDAO = new MatriculaDAO();
        if ($matriculaDAO->inserir($matricula)) {
            header("Location: /matricula/visualizar/inserir/true");
            exit;
        } else {
            header("Location: /matricula/visualizar/inserir/false");
            exit;
        }
    }

    public function editar($params)
    {
        $alunoDAO = new AlunoDAO();
        $resultadoAluno = $alunoDAO->consultar();
        $cursoDAO = new CursoDAO();
        $resultadoCurso = $cursoDAO->consultar();
        $id = $params[1];
        $matriculaDAO = new MatriculaDAO();
        $resultado = $matriculaDAO->consultarPorId($id);
        require_once ("../src/Views/Matricula/Editar.php");
    }

    public function alterado($params)
    {
        $matricula = new Matricula($params[1], $_POST['id_alu'], $_POST['id_cur'], $_POST['periodo'], 0);
        $matriculaDAO = new MatriculaDAO();
        if ($matriculaDAO->alterar($matricula)) {
            header("Location: /matricula/visualizar/alterar/true");
        } else {
            header("Location: /matricula/visualizar/alterar/false");
        }
    }

    public function excluir($params)
    {
        $alunoDAO = new AlunoDAO();
        $resultadoAluno = $alunoDAO->consultar();
        $cursoDAO = new CursoDAO();
        $resultadoCurso = $cursoDAO->consultar();
        $id = $params[1];
        $matriculaDAO = new MatriculaDAO();
        $resultado = $matriculaDAO->consultarPorId($id);
        require_once ("../src/Views/Matricula/Excluir.php");
    }

    public function excluido($params)
    {
        $matriculaDAO = new MatriculaDAO();
        if ($matriculaDAO->excluir($params[1])) {
            header("Location: /matricula/visualizar/excluir/true");
        } else {
            header("Location: /matricula/visualizar/excluir/false");
        }
    }

}