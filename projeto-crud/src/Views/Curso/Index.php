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
        <?php if ($mensagem != null) { ?>
            <div class="alert alert-<?= $cor; ?> alert-dismissible fade show  mt-4" role="alert">
                <?= $mensagem; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= $t = "";
        } ?>
        <div class="d-flex justify-content-end">
            <a href="/curso/inserir" class="d-flex text-center btn-lg btn btn-primary">Novo Curso</a>
        </div>
        <table class="table table-stripped table-hover" id="tabela">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id do Professor</th>
                    <th scope="col">Nome do Professor</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Ações</th>
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
                        <td>
                            <a href="/curso/editar/<?= $c['id'] ?>" class="btn btn-warning">
                                Alterar
                            </a>
                            <a href="/curso/excluir/<?= $c['id'] ?>" class="btn btn-danger">
                                Excluir
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#tabela', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
    </script>
</body>

</html>