<br>
<center>
<h1>Caso 1: Uploader de arquivos sem filtrar o que está sendo recebido</h1>

<!-- Formulário para envio de arquivo -->
<form action="api.php" method="post" enctype="multipart/form-data"> 
    <!-- 
        action="api.php" → o arquivo que vai receber e processar o upload (o script PHP)
        method="post" → método HTTP usado para enviar os dados (necessário para arquivos)
        enctype="multipart/form-data" → obrigatório para enviar arquivos via formulário
    -->

    <!-- Campo para o usuário escolher o arquivo do computador -->
    <p><input type="file" name="arquivo"></p>
    <!-- 
        type="file" → define que é um campo de upload
        name="arquivo" → nome da variável que será usada no PHP: $_FILES['arquivo']
    -->

    <!-- Botão para enviar o formulário -->
    <p><input type="submit" value="Enviar Arquivo"></p>
    <!-- 
        type="submit" → envia os dados do formulário ao clicar
        value="Enviar Arquivo" → texto exibido no botão
    -->
</form>

<br>
</center>
