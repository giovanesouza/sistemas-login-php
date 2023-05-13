<?php
include('conexao.php'); // Inclui a conexão neste arquivo (Se a página carregar corretamente é pq a conexão com o BD foi realizada com sucesso)

// Verifica se existem as variáveis de e-mail e senha (existindo, realiza login)
if (isset($_POST['email']) || isset($_POST['senha'])) {

    // Verifica se o e-mail e senha foram preenchidos (strlen = qtd de caracteres)
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";


        // Email e senha inseridos corretamente -> realiza o login
    } else {

        // Limpa o e-mail/senha para evitar a vulnerabilidade sql (sql injection)
        // A variaável $mysqli está disponível neste arquivo graças ao include realizado acima (conexao.php)
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Sql Query - Verificação de Login (E-mail e Senha)
        $sql_code = "SELECT * FROM usuarios WHERE email =  '$email' AND senha = '$senha'";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error); // Se houver algum problema na execução -> mata a aplicação e exibe a msg


        // Verifica se a qtd de registros que a consulta retornou é IGUAL = 1
        $quantidade = $sql_query->num_rows; // Retorna a quantidade de linnhas localizadas na query

        // Se localizar apenas 1, cria sessão e loga
        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc(); // Pega os dados do banco e insere na variável $usuario 

            // Se não existir sessão, cria-se uma.
            if (!isset($_SESSION)) {
                session_start(); // Inicia sessão
            }

            $_SESSION['id'] = $usuario['id']; // Armazena o id do usuário na sessão
            $_SESSION['nome'] = $usuario['nome']; // Armazena o nome do usuário na sessão
            //$_SESSION['user'] = $usuario; // Armazena todos os dados do usuário na sessão


            // Redireciona o usuário para a pág painel.php
            header("Location: painel.php");

        } else {
            echo "Falhar ao logar! E-mail e/ou senha incorretos.";
        }

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
    <!-- Action em branco => Os dados do formulário são enviados para a própria pág (index.php) -->
    <form action="" method="POST">
        <p>
            <label for="email">E-mail</label>
            <input type="text" name="email"  />
        </p>
        <p>
            <label for="senha">E-mail</label>
            <input type="password" name="senha" />
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>

</html>