<?php 
session_start();
include 'conexao.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$erroMsg = '';

if(isset($_POST['confirmar'])){
    if(empty($nome) || empty($usuario) || empty($senha)) {
        $erroMsg = 'Preencha todos os campos.';
    } else {
        if(strlen($senha) != 8) {
            $erroMsg = 'A senha deve ter 8 digitos!';
        } elseif(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[^\w\d\s])\S{8}$/',$senha)) {
            $erroMsg = 'A senha é fraca(1Aa@)!';
        } else {
            $verifica_email = $pdo->prepare('SELECT COUNT(*) AS total FROM usuario WHERE usuario = :usuario');
            $verifica_email->bindValue(':usuario', $usuario);
            $verifica_email->execute();
            $resultado = $verifica_email->fetch(PDO::FETCH_ASSOC);

            if($resultado['total'] > 0) {
                $erroMsg = 'Este email já existe';
            } else {
                $cmd = $pdo->prepare('INSERT INTO usuario (nome, usuario, senha, idNivel) VALUES (:nome, :usuario, :senha, 2)');
                $cmd->bindValue(':nome', $nome);
                $cmd->bindValue(':usuario', $usuario);
                $cmd->bindValue(':senha', $senha);
                $cmd->execute();
                echo '<script>alert("Cadastro realizado com sucesso"); window.location.href = "login.php";</script>';
                exit; // após redirecionar, saia do script para evitar a execução do código abaixo
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Bumba Shop - Tela de Cadastro</title>
</head>

<body>

    <form method="post">
        <h1>Faça seu cadastro</h1>
        <div class="input-box">
            <input type="text" name="nome" placeholder="Seu nome completo" required value="<?php echo htmlspecialchars($nome); ?>">
        </div>
        <div class="input-box">
            <input type="email" name="usuario" placeholder="Seu email" required value="<?php echo htmlspecialchars($usuario); ?>">
        </div>
        <div class="input-box">
            <input type="password" name="senha" id="senha" placeholder="Senha" required value="<?php echo htmlspecialchars($senha); ?>">
        </div>
        <?php if (!empty($erroMsg)): ?>
            <div style="color: red; margin-top: 5px;"><?php echo $erroMsg; ?></div>
            <?php endif; ?>
        <div class="input-box" style="margin-top: 10px;">
            <input type="submit" name="confirmar" value="Cadastrar">
        </div>
        <div class="input-box">
            <a href="./login.php"><input type="button" value="Cancelar"></a>
        </div>
    </form>
</body>

</html>