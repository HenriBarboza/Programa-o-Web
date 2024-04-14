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
    <title>Curso</title>
</head>

<body>
<a class="btn btn-secondary mt-3 ms-3" href="/">Inicio</a>
    <div class="container">
        <h1>Curso</h1>
        <div class="d-flex justify-content-end">
        <a href="/curso/inserir" class="d-flex text-center btn-lg btn btn-primary">Novo Curso</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id do Professor</th>
                    <th scope="col">Nome do Professor</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Horário</th>
                    <!-- <th scope="col">Ações</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($c = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= $c['id_professor'] ?></td>
                        <td><?= $c['nome_professor'] ?></td>
                        <td><?= $c['nome'] ?></td>
                        <td><?= $c['sala'] ?></td>
                        <td><?= $c['horario'] ?></td>
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