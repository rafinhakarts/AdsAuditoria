<?php
error_reporting(~E_ALL);

$senha_encriptada = md5('admin'); // senha correta

// Verifica se os dados foram enviados via POST
if (!isset($_POST['senha'])) {
    echo "Senha não enviada";
    exit;
}

$senha_criptografada = md5($_POST['senha']);

if ($senha_encriptada === $senha_criptografada) {
    echo "senha correta";
} else {
    echo "senha incorreta";
}
?>
