<?php

namespace Php\ProjetoBanco\Models\Domain;

class matricula{

    private $id;
    private $id_alu;
    private $id_cur;
    private $periodo;
    private $data_matricula;

    public function __construct($id, $id_alu, $id_cur, $periodo, $data_matricula){
        $this->setId($id);
        $this->setId_alu($id_alu);
        $this->setId_Cur($id_cur);
        $this->setPeriodo($periodo);
        $this->setData_Matricula($data_matricula);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId_alu(){
        return $this->id_alu;
    }

    public function setId_alu($id_alu){
        $this->id_alu = $id_alu;
    }
    public function getId_cur(){
        return $this->id_cur;
    }

    public function setId_cur($id_cur){
        $this->id_cur = $id_cur;
    }
    public function getPeriodo(){
        return $this->periodo;
    }

    public function setPeriodo($periodo){
        $this->periodo = $periodo;
    }
    public function getData_matricula(){
        return $this->data_matricula;
    }

    public function setData_matricula($data_matricula){
        $this->data_matricula = $data_matricula;
    }

}   