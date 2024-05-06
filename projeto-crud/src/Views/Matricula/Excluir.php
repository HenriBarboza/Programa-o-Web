<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Excluir Matricula</title>
</head>

<body>
    <a class="btn btn-secondary mt-3 ms-3" href="/">Inicio</a>
    <main class="container">
        <h1>Excluir Matricula</h1>
        <form action="/matricula/excluido/<?= $resultado['id'] ?>" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="id_alu" class="form-label">Aluno:</label>
                    <select disabled required name="id_alu" class="form-select">
                        <option value="<?= $resultado['id_alu'] ?>" selected><?= $resultado['nome_aluno'] ?></option>
                        <?php while ($c = $resultadoAluno->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?= $c['id']; ?>"><?= $c['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="id_cur" class="form-label">Curso:</label>
                    <select disabled required name="id_cur" class="form-select">
                        <option value="<?= $resultado['id_cur'] ?>" selected><?= $resultado['nome_curso'] ?></option>
                        <?php while ($c = $resultadoCurso->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?= $c['id']; ?>"><?= $c['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="periodo" class="form-label">Periodo:</label>
                    <input type="text" value="<?= $resultado['periodo'] ?>" name="periodo" class="form-control" disabled
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mt-4">Tem certeza que deseja excluir esse professor?</p>
                    <button type="submit" class="btn btn-danger ">Excluir</button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>