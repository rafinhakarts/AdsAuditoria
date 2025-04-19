

<?php

//idéia sobre o phishing


//o phishing é nada mais, nada menos que uma tentativa de capturar seus dados via engenharia social, que pode ser feita de vários aspectos, como:

//Aplicações/sites que simulam um site terceiro e salvam suas senhas/dados sensíveis no geral para uso posterior.
//Redes wi-fi falsas que requerem login ou algum tipo de dado ou cartão para obter acesso a internet
//existem outros metódos, mas o que eu lembro é mais ou menos esses

//OBS: há muitos pontos na qual os usuários finais (pessoas comuns), estão desatentas e são mitos, como:
//"HTTPS", sites com ssl(certificados), PODEM SIM estar com conteúdo malicioso no geral, ou seja, eles podem estar contendo páginas de phishing sim.
//Os sites falsos podem sim ter o visual/tecnologias similares ao original.
//Sites falsos podem sim usar api como requests retornando o cep/rua/endereço, ou seja, eles podem simular uma opção de entrega/ simulação de taxas/tempo de entrega

//Existem outras coisas a serem notadas em sites falsos que podem ser similares ao original.



//aqui teremos que imaginar 


//salva as informações, se enviado um post em um arquivo cartoes.txt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Caminho do arquivo onde será salvo
    $arquivo = 'cartoes.txt';

    // Pega os dados do POST e transforma em uma string
    $dados = '';
	
	
	
	//aqui contem o foreach, é um loop, vai percorrer todas as informações do array $_POST e adicionar a variavel string $dados
	
    foreach ($_POST as $chave => $valor) {
        $dados .= "$chave: $valor\n";
    }
	
	
	
	
    $dados .= "--------------------------\n";

    // Salva os dados no arquivo (append mode)
    file_put_contents($arquivo, $dados, FILE_APPEND); 
	//funcao que salva informacoes, sendo $arquivo um nome de arquivo e $dados, que contem os valores a ser adicionados
	// FILE_APPEND, serve para adicionar algo no arquivo, sem sobrescrever o arquivo todo
}
?>

<center><br>
<h1>Exemplo de phishing</h1>


<form action="index.php" method="POST">

<p><strong>Cartão:</strong></p>
  <p><input type="text" name="card" minlength="15" maxlength="16" placeholder="CC: 1234 5678 9101 1111" required></p>
  <p><strong>Mês:</strong></p>
  <p><input type="text" name="mes" minlength="2" maxlength="2" placeholder="Mês: 01" required></p>
  <p><strong>Ano:</strong></p>
  <p><input type="text" name="ano" minlength="4" maxlength="4" placeholder="Ano: 2025" required></p>
  <p><strong>CVV:</strong></p>
  <p><input type="text" name="cvv" minlength="3" maxlength="4" placeholder="CVV: 0000" required></p>
  <br>
  <input type="submit" value="Enviar">
  
</form>


<br><h2>Exemplo conhecido e básico de phishing, sem detalhes visuais, mas seguindo o mesmo parametro de input de dados sensíveis em sites falsos.</h2>