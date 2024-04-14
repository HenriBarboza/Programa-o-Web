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

    public function consultar(){
        try{
            $sql = "SELECT curso.*, professor.nome as nome_professor FROM curso INNER JOIN professor ON curso.id_professor = professor.id";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    }

}