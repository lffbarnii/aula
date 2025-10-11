<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="border: 1px solid black; padding: 2px; width: 200px;">
        <form action="login.php", method="post">
            <label for="usuario">Usuário</label>
            <br>
            <input type="text" name="usuario" id="usuario">
            <br><br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="senha" id="senha">
            <br><br>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>