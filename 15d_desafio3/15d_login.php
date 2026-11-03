<?php
session_start();


// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os valores enviados pelo formulário
    $usuario =$_POST['usuario'];
    $senha =$_POST['senha'];
    $cor_fundo =$_POST['cor_fundo'];


    // Conecta com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "Senai@118";
    $dbname = "exerciciopfr";
    $conn = new mysqli($servername,$username, $password,$dbname);


    // Verifica a conexao
    if ($conn->connect_error) {
        die("Falha de conexão: " . $conn->connect_error);
    }


    // Consulta o usuário no BD
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";


    $result = $conn->query($sql);


    // Verifica se encontrou o usuário
    if ($result->num_rows > 0) {
        $_SESSION['usuario'] =$usuario;
        $_SESSION['cor_fundo'] =$cor_fundo;


        $conn->close();
        header("Location: 15d_perfil.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos";
    }


    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <h2>Login</h2>


        <label for="usuario">Usuário: </label>
        <input type="text" name="usuario" id="usuario" required><br>


        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha" required><br>


        <label for="cor_fundo">Cor de Fundo: </label>
        <input type="color" name="cor_fundo" id="cor_fundo" value="#ffffff" required><br>


        <button type="submit">Entrar</button>
    </form>


    <?php
    if (isset($erro)) {
        echo "<p style='color: red;'>$erro</p>";
    }
    ?>
</body>
</html>