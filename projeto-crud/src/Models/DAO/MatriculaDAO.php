<?php

namespace Php\ProjetoBanco\Models\DAO;


use Php\ProjetoBanco\Models\Domain\Matricula;

class MatriculaDAO{

private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Matricula $matricula){
        try{
            $sql = "INSERT INTO Matricula (id_alu, id_cur, periodo) VALUES (:id_alu, :id_cur, :periodo)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_alu", $matricula->getId_alu());  
            $p->bindValue(":id_cur", $matricula->getId_cur());
            $p->bindValue(":periodo", $matricula->getPeriodo());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar(){
        try{
            $sql = "SELECT m.*, a.nome as nome_aluno, c.nome as nome_curso FROM matricula m INNER JOIN aluno a ON m.id_alu = a.id INNER JOIN curso c ON m.id_cur = c.id";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    }

}