<?php

namespace Php\ProjetoBanco\Models\DAO;


use Php\ProjetoBanco\Models\Domain\Professor;
use PDOException;

class ProfessorDAO
{

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Professor $professor)
    {
        try {
            $sql = "INSERT INTO professor (nome, cpf, carga_horaria, formacao) VALUES (:nome, :cpf, :carga_horaria, :formacao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":cpf", $professor->getCpf());
            $p->bindValue(":carga_horaria", $professor->getCarga_horaria());
            $p->bindValue(":formacao", $professor->getFormacao());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM professor
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultar()
    {
        try {
            $sql = "SELECT * FROM professor";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return 0;
        }
    }


    public function alterar(Professor $professor)
    {
        try {
            $sql = "UPDATE professor SET nome = :nome, cpf = :cpf, carga_horaria = :carga_horaria, formacao = :formacao
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $professor->getId());
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":cpf", $professor->getCpf());
            $p->bindValue(":carga_horaria", $professor->getCarga_horaria());
            $p->bindValue(":formacao", $professor->getFormacao());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultarPorId($id)
    {
        try {
            $sql = "SELECT * FROM professor WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }
}