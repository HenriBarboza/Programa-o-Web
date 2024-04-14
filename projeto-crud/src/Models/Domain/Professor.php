<?php

namespace Php\ProjetoBanco\Models\Domain;

class Professor{

    private $id;
    private $nome;
    private $cpf;
    private $carga_horaria;
    private $formacao;

    public function __construct($id, $nome, $cpf, $carga_horaria, $formacao){
        $this->setId($id);
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setCarga_horaria($carga_horaria);
        $this->setFormacao($formacao);
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
    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getCarga_horaria(){
        return $this->carga_horaria;
    }

    public function setCarga_horaria($carga_horaria){
        $this->carga_horaria = $carga_horaria;
    }
    public function getFormacao(){
        return $this->formacao;
    }

    public function setFormacao($formacao){
        $this->formacao = $formacao;
    }

}   