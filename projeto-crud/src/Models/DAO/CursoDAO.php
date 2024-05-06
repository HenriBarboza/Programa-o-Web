<?php

namespace Php\ProjetoBanco\Models\DAO;


use Php\ProjetoBanco\Models\Domain\Curso;

class CursoDAO{

private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Curso $curso){
        try{
            $sql = "INSERT INTO curso (id_professor, nome, sala, horario) VALUES (:id_professor, :nome, :sala, :horario)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_professor", $curso->getId_professor());
            $p->bindValue(":nome", $curso->getNome());  
            $p->bindValue(":sala", $curso->getSala());
            $p->bindValue(":horario", $curso->getHorario());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM curso
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultar(){
        try{
            $sql = "SELECT curso.*, professor.nome as nome_professor FROM curso INNER JOIN professor ON curso.id_professor = professor.id";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    }

    public function alterar(Curso $curso)
    {
        try {
            $sql = "UPDATE curso SET id_professor = :id_professor, nome = :nome, sala = :sala, horario = :horario
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $curso->getId());
            $p->bindValue(":id_professor", $curso->getId_professor());
            $p->bindValue(":nome", $curso->getNome());
            $p->bindValue(":sala", $curso->getSala());
            $p->bindValue(":horario", $curso->getHorario());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultarPorId($id)
    {
        try {
            $sql = "SELECT curso.*, professor.nome as nome_professor FROM curso INNER JOIN professor ON curso.id_professor = professor.id WHERE curso.id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }
}