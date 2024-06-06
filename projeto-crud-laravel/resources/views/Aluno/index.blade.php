<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alunos</title>
</head>

<body>
    <a class="btn btn-secondary mt-3 ms-3" href="/">Inicio</a>
    <div class="container">
        <h1>Alunos</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <div class="d-flex mt-3 justify-content-end">
            <a href="{{route('alunos.create')}}" class="d-flex text-center btn-lg btn btn-primary">Novo aluno</a>
        </div>
        <br>
        <table class="table table-stripped table-hover" id="tabela">
            <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col-4">Nome</th>
                    <th class="col-2">telefone</th>
                    <th class="col-2">Cpf</th>
                    <th class="col-2">Data de nascimento</th>
                    <th class="col-2 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id}}</td>
                        <td>{{ $aluno->nome}}</td>
                        <td>{{ $aluno->telefone}}</td>
                        <td>{{ $aluno->cpf}}</td>
                        <td>{{ $aluno->data_nascimento}}</td>
                        <td>
                            <a href="{{route('alunos.edit', $aluno->id) }}" class="btn btn-warning">
                                Alterar
                            </a>
                            <a href="{{route('alunos.delete', $aluno->id) }}" class="btn btn-danger">
                                Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
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