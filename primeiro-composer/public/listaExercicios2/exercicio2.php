<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercicio 2</title>
</head>

<body>
    <div class="container mt-4">
        <form action="/exercicio2/resposta" method="POST">
            <?php for ($i = 1; $i <= 7; $i++): ?>
                <label for="numero"><h2>Insira um número</h2></label><br>
                <input type="number" name="numero<?php echo $i; ?>" id="numero" class="form-control" required><br>
                <?php endfor; ?>
                <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>