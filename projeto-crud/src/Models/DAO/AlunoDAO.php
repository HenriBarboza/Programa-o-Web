<?php

namespace Php\ProjetoBanco\Models\DAO;


use Exception;
use Php\ProjetoBanco\Models\Domain\Aluno;

class AlunoDAO
{

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Aluno $aluno)
    {
        try {
            $sql = "INSERT INTO aluno (nome, idade, cpf) VALUES (:nome, :idade, :cpf)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":idade", $aluno->getIdade());
            $p->bindValue(":cpf", $aluno->getCpf());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function alterar(Aluno $aluno)
    {
        try {
            $sql = "UPDATE aluno SET nome = :nome, idade = :idade, cpf = :cpf
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $aluno->getId());
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":idade", $aluno->getIdade());
            $p->bindValue(":cpf", $aluno->getCpf());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function excluir(int $id)
    {
        try {
            $sql = "DELETE FROM aluno
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
            $sql = "SELECT * FROM aluno";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultarPorId($id)
    {
        try {
            $sql = "SELECT * FROM aluno WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }



}