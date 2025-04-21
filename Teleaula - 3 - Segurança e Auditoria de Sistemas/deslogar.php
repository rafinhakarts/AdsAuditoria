<?php
// Sempre verifique se a sessão foi iniciada antes de destruí-la
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_destroy();
header("Location: exemplo1.php"); // ou onde você quiser redirecionar após logout
exit;
?>
