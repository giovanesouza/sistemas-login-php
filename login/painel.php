<?php

include('protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <!-- Pega o nome do usuário logado e exibe na tela -->
    <h1>Bem vindo(a) ao painel, <?php echo $_SESSION['nome']; ?></h1>

    <p><a href="logout.php">Sair</a></p>
    
</body>
</html>