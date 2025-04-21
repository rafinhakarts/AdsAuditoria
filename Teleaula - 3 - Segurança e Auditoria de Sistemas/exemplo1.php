<?php  
error_reporting(0); // aqui iniciamos o script
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// vamos chamar o arquivo include.php onde vai conter variaveis globais para nosso arquivo exemplo1.php  
include_once('include.php');  

// no include.php temos a variavel global que é a chave para descriptografia de nossos dados impostos
// chamamos a variavel global chamada: $chave_da_empresa  

// primeiro vamos receber o $_GET['cpf'] pela requisição get, contendo o valor inteiro,  
// sem fazer filtros para remover "." ou "-", usaremos valor inteiro no get.   
if (isset($_GET['cpf'])) {
    $cpf_plain_text = $_GET['cpf'];  

    echo "<br>"; 
    echo "CPF plain-text: ".$cpf_plain_text; 
    echo "<br>"; 

    // criptografar o cpf
    $cpf_criptografado = criptografar($cpf_plain_text);  

    // descriptografar o cpf
    descriptografar($cpf_criptografado);  
} else {
	
echo '<br><form action="" method="get">
    <input type="text" name="cpf" placeholder="Digite 1 a 4">
    <input type="submit" value="Logar">
</form>';

    
}

// função para criptografar
function criptografar($cpf_plain_text){
    global $chave_da_empresa; // vamos usar a variavel global $chave_da_empresa que está no include.php
    $iv = '1234567890123456'; // vetor de inicialização fixo com 16 caracteres

    // vamos usar o base64_encode, funcao do php
    $criptografado = openssl_encrypt($cpf_plain_text, 'aes-256-cbc', $chave_da_empresa, 0, $iv);
    $base64 = base64_encode($criptografado);

    echo "CPF Criptografado: " . $base64 . "<br>";
    return $base64;
}

// função para descriptografar
function descriptografar($cpf_criptografado){
    global $chave_da_empresa; // vamos usar a variavel global $chave_da_empresa que está no include.php
    $iv = '1234567890123456'; // vetor de inicialização fixo com 16 caracteres

    // vamos usar o base64_decode, funcao do php
    $decodificado = base64_decode($cpf_criptografado);
    $descriptografado = openssl_decrypt($decodificado, 'aes-256-cbc', $chave_da_empresa, 0, $iv);

    echo "CPF DESCriptografado: " . $descriptografado . "<br>";
}
$cargo = $_SESSION['cargo'];

if ($cargo == 1) {
    $nome = 'Cargo Admin 1, nível baixo';
} elseif ($cargo == 2) {
    $nome = 'Cargo Admin 2, nível moderado';
} elseif ($cargo == 3) {
    $nome = 'Cargo Admin 3, nível médio';
} elseif ($cargo == 4) {
    $nome = 'Cargo Admin 4, nível alto';
} else {
    $nome = 'Cargo desconhecido';
}
?>

<?php
echo "<br><h1>Você é cargo $nome</h1>";
?>
<a href="deslogar.php"><h3>Deslogar</h3></a>