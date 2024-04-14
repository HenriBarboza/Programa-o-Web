<?php

require __DIR__ ."/vendor/autoload.php";


$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\ProjetoBanco\Router($metodo, $caminho);

## Rotas

$r->get('/', 'Php\ProjetoBanco\Controllers\HomeController@index');

# Aluno

$r->get('/aluno/inserir',
    'Php\ProjetoBanco\Controllers\AlunoController@inserir');

$r->post('/aluno/novo',
    'Php\ProjetoBanco\Controllers\AlunoController@novo');

$r->get('/aluno/visualizar',
    'Php\ProjetoBanco\Controllers\AlunoController@index');


# `Professor

$r->get('/professor/inserir',
    'Php\ProjetoBanco\Controllers\ProfessorController@inserir');

$r->post('/professor/novo',
    'Php\ProjetoBanco\Controllers\ProfessorController@novo');

$r->get('/professor/visualizar',
    'Php\ProjetoBanco\Controllers\ProfessorController@index');

# `Curso

$r->get('/curso/inserir',
    'Php\ProjetoBanco\Controllers\CursoController@inserir');

$r->post('/curso/novo',
    'Php\ProjetoBanco\Controllers\CursoController@novo');

$r->get('/curso/visualizar',
    'Php\ProjetoBanco\Controllers\CursoController@index');


## Fim das rotas

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}

