<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/', function (){
    include("home.html");
} );

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

$r->get('/exemplo1/formulario', function(){
    include("exemplo1.html");
});

$r->post('/exemplo1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

# Lista de exercícios

# Exercicio 1

$r->get('/exercicio1/form', function (){
    include("listaExercicios2/exercicio1.html");
});

$r->post('/exercicio1/resposta', function(){
    $num = $_POST['num'];

    if($num < 0){
        return "Valor negativo.";
    } 
    else if($num == 0){
        return "Igual a zero.";
    }
    else{
        return "Valor positivo";
    }

});

# Exercício 2

$r->get('/exercicio2/form', function (){
    include("listaExercicios2/exercicio2.php");
}); 

$r->post('/exercicio2/resposta', function(){
    $numeros = array();
    $posicaoMenorValor = 0;
    $menorValor = $_POST["numero1"];
    for ($i = 1; $i <= 7; $i++) {
        $numero = $_POST["numero$i"];
        array_push($numeros, $numero);
        if ($numero < $menorValor) {
            $menorValor = $numero;
            $posicaoMenorValor = $i;
        }
    }
    echo "<p>O menor valor é $menorValor e está na posição $posicaoMenorValor.</p>";
});


# Exercicio 3

$r->get('/exercicio3/form', function () {
    include("listaExercicios2/exercicio3.html");
});

$r->post('/exercicio3/resposta', function(){
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    $resposta = $num1 + $num2;

    if($num1 == $num2){
        return $resposta * 3 ;
    } else {
        return $resposta;
    }

});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


