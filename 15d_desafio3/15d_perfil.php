<?php
session_start();


// Controle de acesso: se não estiver logado, redireciona para o login
if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}


// Cor padrão caso a sessão não tenha cor salva
$cor = isset($_SESSION['cor_fundo']) ? $_SESSION['cor_fundo'] : '#ffffff';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Restrita - Perfil</title>
</head>
<body style="background-color: <?php echo $cor; ?>;">
    <h2>Bem vindo, <?php echo $_SESSION['usuario']; ?>! 👋</h2>
    <p>Esta é a sua página de perfil restrita.</p>


    <br><br>
    <a href="15d_logout.php">Sair (Logout)</a>
</body>
</html>