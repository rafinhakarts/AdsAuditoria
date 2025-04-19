<html>
<?php 
include_once('includes.php'); 
//aqui vai incluir as variaveis globais na qual foram setados no arquivo includes, ou seja vai ter as variaveis declaradas do includes.php, dentro do index.php, deixando o código modularizado.

// eu não gosto muito de html, mas podemos deixar modular chamando as tags diretamente de um arquivo e deixando dinâmico,
// futuramente fazendo um select via db e deixando num cache, as informações
// relacionadas a title, google tags, styles, etc, os arquivos css podem ser chamados via tags do html, os includes servem para deixar o código mais clean, creio que é chamado de "clean code".
//aqui chamamos o head.php
include_once('head.php'); 
?>

<header>
<center><h1>Acesso ao sistema</h1></center>
</header>

<main>

<?php

// a idéia é chamar o header.php com as informações somente se estiver no modo get (não feito o post com o formulário ainda).
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	include_once('api.php');
	
	//caso seja post, ja apareceu o form e foi preenchido, caso nao seja (else), mostra o formulario 
	
} else {
    include_once('header.php'); 
	// aqui chamamos o header.php se não tiver enviado um post ainda no mesmo arquivo index, ou seja, 
	//caso seja get, vai mostrar somente o formulario para receber informacoes
}

?>
<center> A ideia aqui é mostrar que, ao enviar uma informação, você pode tratá-la conforme necessário — seja para realizar um CRUD ou qualquer outra forma de manipulação de dados.<br><br>
Uma boa prática é sempre validar as entradas do usuário, tanto para evitar SQL Injection quanto para garantir que os dados estejam de acordo com o que se espera no banco de dados.<br><br>

Por exemplo: imagine uma consulta à tabela de credenciais para verificar login e senha. Você pode fazer um SELECT password FROM credenciais WHERE login = ?. Essa query retornaria a senha (em MD5, por exemplo) correspondente ao login informado. Em seguida, basta comparar o valor enviado via $_POST['senha'] com a senha retornada do banco para validar a autenticação.<br><br>

<strong>Pense assim, se(if), $senha_tentada == $_senha_do_banco_de_dados, prossegue.</strong><br><br>


Esse tipo de tratamento é essencial para segurança e integridade na manipulação dos dados recebidos.

</center>

</main>


<footer>


<?php


?>


</footer>

</html>