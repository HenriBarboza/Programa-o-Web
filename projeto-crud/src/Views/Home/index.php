<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <div class="container mt-4">
        <h1>Projeto 2 - MVC</h1>
        <div class="mt-5 row-gap-5 d-flex justify-content-between flex-wrap border border-success p-5">
            <div class="col-6 container">
                <h2>Alunos</h2>
                <a href="/aluno/visualizar" class="btn btn-primary ">Visualizar</a>
                <a href="/aluno/inserir" class="btn btn-success ">Adicionar</a>
            </div>
            <div class="col-6 container">
                <h2>Professores</h2>
                <a href="/professor/visualizar" class="btn btn-primary ">Visualizar</a>
                <a href="/professor/inserir" class="btn btn-success ">Adicionar</a>
            </div>
            <div class="col-6 container">
                <h2>Curso</h2>
                <a href="" class="btn btn-primary ">Visualizar</a>
                <a href="" class="btn btn-success ">Adicionar</a>
            </div>
            <div class="col-6 container">
                <h2>Matrícula</h2>
                <a href="" class="btn btn-primary ">Visualizar</a>
                <a href="" class="btn btn-success ">Adicionar</a>
            </div>
        </div>
    </div>

    <footer class="fixed-bottom d-flex justify-content-center">
        <p>Desenvolvido por Henri Barboza</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>