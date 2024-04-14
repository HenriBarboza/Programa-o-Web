<?php

namespace Php\ProjetoBanco\Models\Domain;

class Curso{

    private $id;
    private $id_professor;
    private $nome;
    private $sala;
    private $horario;

    public function __construct($id, $id_professor, $nome, $sala, $horario){
        $this->setId($id);
        $this->setId_professor($id_professor);
        $this->setNome($nome);
        $this->setSala($sala);
        $this->setHorario($horario);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId_professor(){
        return $this->id_professor;
    }

    public function setId_professor($id_professor){
        $this->id_professor = $id_professor;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getSala(){
        return $this->sala;
    }

    public function setSala($sala){
        $this->sala = $sala;
    }
    public function getHorario(){
        return $this->horario;
    }

    public function setHorario($horario){
        $this->horario = $horario;
    }

}   