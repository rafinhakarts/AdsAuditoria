<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) { //se for request method == post e o arquivo a ser enviado não for vazio
    if (!is_dir('uploads')) mkdir('uploads'); //se nao existir o diretorio uploads, cria com o nome definido "uploads", já existe no nosso projeto, se clonado
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' . $_FILES['arquivo']['name']); // aqui vai mover o arquivo + nome temporario (nome do arquivo), para o dir, todas funções nativas do php
}


// a idéia é que não tenha nenhum tipo de validação nesse primeiro exemplo, deixando em aberto a opção de recebimento de uma shell reversa


header('Location: exemplo1.php'); //move de volta para o exemplo1.php
exit; //finaliza a execução a fim de não executar o que estiver abaixo (aqui no nosso caso vai ser inutil pq nao tem nada mais a ser executado)

?>