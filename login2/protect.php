<?php

// Inicia sessão
if(!isset($_SESSION)) {
    session_start(); // Inicia a session (Revive a session para trazer as variáveis que foram criadas)
}

// Caso não exista nenhuma sessão de ID -> Mata o script e exibe msg
if(!isset($_SESSION['id'])) {
die("Você não pode acessar esta página, porque não está logado. <p><a href=\"index.php\">Entrar</a></p>");
}



?>