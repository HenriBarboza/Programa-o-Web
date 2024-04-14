<?php

namespace Php\ProjetoBanco\Models\DAO;


use Php\ProjetoBanco\Models\Domain\Professor;

class ProfessorDAO{

private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Professor $professor){
        try{
            $sql = "INSERT INTO professor (nome, cpf, carga_horaria, formacao) VALUES (:nome, :cpf, :carga_horaria, :formacao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $professor->getNome());  
            $p->bindValue(":cpf", $professor->getCpf());
            $p->bindValue(":carga_horaria", $professor->getCarga_horaria());
            $p->bindValue(":formacao", $professor->getFormacao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar(){
        try{
            $sql = "SELECT * FROM professor";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    }

}