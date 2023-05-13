<?php

// Se não existir SESSION
if(!isset($_SESSION)) {
    session_start(); // Revive sessão
}


// Ao clicar no botão sair, destroy a sessão e redireciona p/ index.php

// Se existir SESSION
session_destroy(); // Destrói variáveis

header("Location: index.php"); // Redireciona o usuário para a pág index.
