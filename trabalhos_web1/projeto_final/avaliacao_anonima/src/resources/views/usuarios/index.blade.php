<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários Cadastrados</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->login }}</td>
                    <td>{{ $usuario->data_criacao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>