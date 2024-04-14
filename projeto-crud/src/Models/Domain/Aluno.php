<?php

namespace Php\ProjetoBanco\Models\Domain;

class Aluno{

    private $id;
    private $nome;
    private $idade;
    private $cpf;

    public function __construct($id, $nome, $idade, $cpf){
        $this->setId($id);
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setCpf($cpf);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }
    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

}   