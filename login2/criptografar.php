<?php
// Como NÃO fazer -> Método md5
// https://www.md5online.org/md5-decrypt.html

$senha = "1234"; // Senha sem criptografia
$criptografada = md5($senha); // Senha criptografada (md5)

// $sql = "SELECT * from usuarios WHERE senha = '$criptografada'";

echo $criptografada;


// Como FAZER (RECOMENDADO) -> password_hash();

$hash = password_hash($senha, PASSWORD_DEFAULT);
echo $hash;

// Verica se a senha passada + criptografada confere À que está salva no BD
echo password_verify($senha, $hash); // Retorno boolean