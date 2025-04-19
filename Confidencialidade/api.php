<?php

	
	if (VerificarLogin($_POST['login'], $_POST['senha']) == true){ //chama a função que está dentro da api.php, validando as entradas (post), se for true retorna algo, se for false retorna outra coisa tb
	
		echo "<center><br>";
		echo "<h3>Acesso liberado!</h3>";
		echo "<h3>Credenciais:</h3>";
		//aqui iremos chamar a senha criptografada em md5, visando boas práticas de criptografia de informações sensíveis
		
		
		
				echo "<table border='3' style='border-color: yellow; width: 30%;'><tr><td>";
		
	
		echo "<p style='color: red'>1° exemplo de mostragem do usuário dando echo na variavel enviada via post com o name login</p>";
		echo "<strong>Login:</strong> " .$_POST['login']. "<br><br>";
		echo "</td></tr></table><br>";
		
				echo "<table border='3' style='border-color: yellow; width: 30%;'><tr><td>";
		
		
		echo "<p style='color: red;'>2° Exemplo de mostragem do input do post[senha] em plain text, apenas dando echo na variavel S_POST[senha]: </p>";
		echo "<strong>senha em plain-text: </strong> " . $_POST['senha']. "<br><br>";
		echo "</td></tr></table>";
		
		echo "<table border='3' style='border-color: yellow; width: 30%;'><tr><td>";
		
		echo "<p style='color: red;'>3° Exemplo de criptografia usando a função md5 do PHP: </p>";
		echo "<strong>senha criptografada em md5: </strong>" . md5($_POST['senha']);
		echo "</td></tr></table>";
		echo "</center>";
		
	}
	else
	{
		echo "login ou senha incorretos!";
		echo "<a href='index.php'></a>";
	}
	

function VerificarLogin($login, $senha){
	
	if ($login == 'admin' && $senha == 'admin')
	{	
		return true;
	}
	else
	{
		return false;
	}
	
	
	
	

	
	
	
}