<?php

// Se existir a variável de email
if (isset($_POST['email'])) {

    include('conexao.php'); // Inclui a conexão neste arquivo 

    if (isset($_POST['email']) || isset($_POST['senha'])) {

        // Verifica se o e-mail e senha foram preenchidos (strlen = qtd de caracteres)
        if (strlen($_POST['email']) == 0) {
            echo "Digite seu e-mail";
        } else if (strlen($_POST['senha']) == 0) {
            echo "Digite uma senha";

            // Email e senha inseridos corretamente -> realiza o cadastro
        } else {

            $email = $_POST['email']; // Pega o e-mail digitado 
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Pega a senha digitada e criptografa


            // Query para salvar os dados no BD
            $mysqli->query("INSERT INTO senhas (email, senha) VALUES ('$email','$senha')");

            // Redireciona o usuário para a pág de login
            header("Location: index.php");
        }

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastre-se</title>
</head>

<body>
    <h1>Cadastre-se abaixo:</h1>

    <form action="" method="post">
        <input type="email" name="email" />
        <input type="password" name="senha" />
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>