<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Boas Práticas de Segurança</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 20px;
    }
    h2, h3 {
      color: #333;
    }
    ul {
      list-style-type: disc;
      margin-left: 20px;
    }
    .observacao {
      margin-top: 20px;
      font-style: italic;
      background-color: #f8f8f8;
      padding: 10px;
      border-left: 4px solid #ccc;
    }
    code {
      background-color: #eee;
      padding: 2px 4px;
      border-radius: 4px;
      font-family: monospace;
    }
  </style>
</head>
<body>

  <h2><strong>Questão:</strong></h2>
  <p>Um colaborador recebeu um e-mail com o intuito de obter suas credenciais.</p>

  <h2>Boas práticas recomendadas:</h2>
  <ul>
    <li><strong>Limitar acesso por IP específico (por colaborador):</strong> Restringe o acesso apenas a endereços IP autorizados, reduzindo a superfície de ataque.</li>
    <li><strong>Autenticação multifator (MFA):</strong> Utilizar autenticação via e-mail, SMS ou aplicativos de códigos para garantir maior segurança no login.</li>
    <li><strong>Credenciais temporárias:</strong> Utilizar senhas e acessos com tempo de validade limitado para reduzir o risco de uso indevido.</li>
    <li><strong>Limitação de controles do usuário:</strong> Conceder apenas os privilégios necessários para a função de cada colaborador.</li>
  </ul>

  <div class="observacao">
    <strong>Observação:</strong> A empresa deve promover eventos e treinamentos para conscientizar os colaboradores sobre boas práticas de segurança da informação e como identificar tentativas de phishing e outros tipos de ataques.
    <br><br>
    <strong>Abaixo teremos exemplos na prática quanto a proteções relacionadas aos exercícios da teleaula 2:</strong>
  </div>

</body>
</html>

<?php
// Desativa mensagens de erro para não expor falhas em ambientes públicos
error_reporting(0);

// ==========================
// EXEMPLO 1 - Criptografia
// ==========================

echo "<h3>Exemplo 1: Criptografia com MD5</h3>";

// Mostramos uma string simples
echo "Texto original: 'alguma coisa'<br>";

// A função md5() transforma o texto em uma hash (um código "embaralhado" de mão única)
// Isso é útil para guardar senhas ou verificar se dados foram alterados
echo "Hash MD5: " . md5("alguma coisa") . "<br>";

// Podemos comparar o hash gerado com um hash conhecido
// Isso é usado, por exemplo, para verificar se a senha digitada é igual à salva
if (md5("alguma coisa") === "f84bd34f3d21db4636b99b21d1869e17") {
    echo "Verificação: o hash corresponde à string 'alguma coisa'<br>";
}

echo "<hr>";

// ==========================
// EXEMPLO 2 - Auditoria de Ações
// ==========================

echo "<h3>Exemplo 2: Registro de ações em arquivo de log</h3>";

// Verifica se a variável 'cadastrar' foi enviada pela URL com ?cadastrar=algumvalor
if (isset($_GET['cadastrar']) && $_GET['cadastrar'] !== null) {

    // Pega os dados da URL (GET)
    $texto   = $_GET['cadastrar']; // Ex: cadastrar=true
    $acao    = $_GET['acao'];      // Ex: acao=1
    $usuario = $_GET['usuario'];   // Ex: usuario=admin

    // Se o valor for 'true', transformamos em algo mais descritivo
    if ($texto === 'true') {
        $texto = "Cadastro";
    }

    // Se o valor for '1', transformamos em texto descritivo
    if ($acao === "1") {
        $acao = "realizou o cadastro";
    }

    // Apenas se o usuário for 'admin', registramos a ação
    if ($usuario === "admin") {
        auditoria($texto, $acao, $usuario);
        echo "Auditoria registrada com sucesso para o usuário <strong>admin</strong>.<br>";
    }
}

/**
 * Função que registra uma ação do usuário em um arquivo chamado 'auditoria.txt'
 * 
 * @param string $texto   - Tipo da ação (ex: "Cadastro")
 * @param string $acao    - O que foi feito (ex: "realizou o cadastro")
 * @param string $usuario - Quem fez (ex: "admin")
 */
function auditoria($texto, $acao, $usuario) {
    // Abre (ou cria) o arquivo 'auditoria.txt' no modo de adicionar conteúdo (a+)
    $arquivo = fopen("auditoria.txt", "a+");

    // Escreve no arquivo com data, hora, usuário e ação
    fwrite($arquivo, "Horário: " . date("d-m-Y H:i:s") . " | $texto - $usuario: $acao" . PHP_EOL);

    // Fecha o arquivo para liberar o recurso
    fclose($arquivo);
}
?>
