<?php
// require '../src/Views/cabecalho.php';

if (isset($_GET['sucesso'])) {
    echo "<p>" . $_GET['sucesso'] . "</p>";
} elseif (isset($_GET['falha'])) {
    echo "<p>" . $_GET['falha'] . "</p>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Matrícula</title>
</head>

<body>
<a class="btn btn-secondary mt-3 ms-3" href="/">Inicio</a>
    <div class="container">
        <h1>Matrícula</h1>
        <div class="d-flex justify-content-end">
        <a href="/matricula/inserir" class="d-flex text-center btn-lg btn btn-primary">Nova matrícula</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id do aluno</th>
                    <th scope="col">Nome do aluno</th>
                    <th scope="col">Id do curso</th>
                    <th scope="col">Nome do curso</th>
                    <th scope="col">periodo</th>
                    <th scope="col">Data de matrícula</th>
                    <!-- <th scope="col">Ações</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($c = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= $c['id_alu'] ?></td>
                        <td><?= $c['nome_aluno'] ?></td>
                        <td><?= $c['id_cur'] ?></td>
                        <td><?= $c['nome_curso'] ?></td>
                        <td><?= $c['periodo'] ?></td>
                        <td><?= $c['data_matricula'] ?></td>                    
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>