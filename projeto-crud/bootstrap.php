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

$r->get('/aluno/editar/{id}',
    'Php\ProjetoBanco\Controllers\AlunoController@editar');

$r->post('/aluno/alterado/{id}',
    'Php\ProjetoBanco\Controllers\AlunoController@alterado');

$r->get('/aluno/excluir/{id}',
    'Php\ProjetoBanco\Controllers\AlunoController@excluir');

$r->post('/aluno/excluido/{id}',
    'Php\ProjetoBanco\Controllers\AlunoController@excluido');

$r->post('/aluno/novo',
    'Php\ProjetoBanco\Controllers\AlunoController@novo');
    
$r->post('/aluno/buscar',
    'Php\ProjetoBanco\Controllers\AlunoController@buscar');

$r->get('/aluno/visualizar',
    'Php\ProjetoBanco\Controllers\AlunoController@index');

$r->get('/aluno/visualizar/{acao}/{status}', 
    'Php\ProjetoBanco\Controllers\AlunoController@index');
# `Professor

$r->get('/professor/inserir',
    'Php\ProjetoBanco\Controllers\ProfessorController@inserir');

$r->post('/professor/novo',
    'Php\ProjetoBanco\Controllers\ProfessorController@novo');

$r->get('/professor/visualizar',
    'Php\ProjetoBanco\Controllers\ProfessorController@index');

$r->get('/professor/editar/{id}',
    'Php\ProjetoBanco\Controllers\ProfessorController@editar');

$r->post('/professor/alterado/{id}',
    'Php\ProjetoBanco\Controllers\ProfessorController@alterado');

$r->get('/professor/excluir/{id}',
    'Php\ProjetoBanco\Controllers\ProfessorController@excluir');

$r->post('/professor/excluido/{id}',
    'Php\ProjetoBanco\Controllers\ProfessorController@excluido');

$r->post('/professor/novo',
    'Php\ProjetoBanco\Controllers\ProfessorController@novo');
    
$r->post('/professor/buscar',
    'Php\ProjetoBanco\Controllers\ProfessorController@buscar');

$r->get('/professor/visualizar/{acao}/{status}', 
    'Php\ProjetoBanco\Controllers\ProfessorController@index');


# `Curso

$r->get('/curso/inserir',
    'Php\ProjetoBanco\Controllers\CursoController@inserir');

$r->post('/curso/novo',
    'Php\ProjetoBanco\Controllers\CursoController@novo');

$r->get('/curso/visualizar',
    'Php\ProjetoBanco\Controllers\CursoController@index');

$r->get('/curso/editar/{id}',
    'Php\ProjetoBanco\Controllers\CursoController@editar');

$r->post('/curso/alterado/{id}',
    'Php\ProjetoBanco\Controllers\CursoController@alterado');

$r->get('/curso/excluir/{id}',
    'Php\ProjetoBanco\Controllers\CursoController@excluir');

$r->post('/curso/excluido/{id}',
    'Php\ProjetoBanco\Controllers\CursoController@excluido');

$r->post('/curso/novo',
    'Php\ProjetoBanco\Controllers\CursoController@novo');
    
$r->post('/curso/buscar',
    'Php\ProjetoBanco\Controllers\CursoController@buscar');

$r->get('/curso/visualizar/{acao}/{status}', 
    'Php\ProjetoBanco\Controllers\CursoController@index');

# `matricula

$r->get('/matricula/inserir',
    'Php\ProjetoBanco\Controllers\MatriculaController@inserir');

$r->post('/matricula/novo',
    'Php\ProjetoBanco\Controllers\MatriculaController@novo');

$r->get('/matricula/visualizar',
    'Php\ProjetoBanco\Controllers\MatriculaController@index');


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

