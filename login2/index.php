<?php

// Se existir o campo de e-mail
if (isset($_POST['email'])) {

    include('conexao.php'); // Inclui a conexão neste arquivo 

    // Verifica se o usuário pode se logar

    $email = $_POST['email']; // Pega o e-mail digitado 
    $senha = $_POST['senha']; // Pega a senha digitada

    //$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Pega a senha digitada e criptografa

    // Consulta no BD
    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1"; // Seleciona o usuário com o e-mail digitado (Pega todos os dados)

    // Executa a query
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    // Guarda os dados na variável usuário
    $usuario = $sql_exec->fetch_assoc();


    // Verifica se a senha digitada bate com a do BD (criptografada)  
    if (password_verify($senha, $usuario['senha'])) {
        // Caso true
               
        // echo "Usuário logado";
        
        // Se não existir sessão, cria-se uma.
        if (!isset($_SESSION)) {
            session_start(); // Inicia sessão
        }
        
        $_SESSION['id'] = $usuario['id']; // Armazena o id do usuário na sessão
        $_SESSION['email'] = $usuario['email']; // Armazena o email do usuário na sessão
        //$_SESSION['user'] = $usuario; // Armazena todos os dados do usuário na sessão
        
        
        // Redireciona o usuário para a pág painel.php
        header("Location: painel.php");
        echo "Usuário logado";
        
    } else {
        echo "Falha ao logar. Senha ou E-mail incorretos!";
    }


}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Entrar</h1>
    <form action="" method="post">
        <input type="email" name="email" /></br>
        <input type="password" name="senha" /></br>
        <button type="submit">Logar</button>
    </form>
</body>
<a href="cadastrar.php">Ainda não possui cadastro? Clique aqui para se cadastrar.</a>
</html>