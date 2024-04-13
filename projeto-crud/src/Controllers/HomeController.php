<?php

namespace Php\ProjetoBanco\Controllers;

class HomeController{

    public function index($params){
        require '..\src\Views\Home\index.php';
}
}