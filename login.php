<?php 
session_start();
include 'conexao.php';

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$erroMsg = '';

if(isset($_POST['usuario'])) {
    if(empty($usuario) || empty($senha)) {
        $erroMsg = 'Preencha todos os campos.';
    } else {
        $sql = $pdo->prepare("SELECT idUsuario, nome, usuario, senha, idNivel FROM usuario WHERE usuario = :e AND senha = :s");
        $sql->bindValue(":e",$usuario);
        $sql->bindValue(":s",$senha);
        $sql->execute();

        if($sql->rowCount() > 0) {
            while($dado = $sql->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION["user_portal"] = $dado["idUsuario"];
                $_SESSION['idUsuario'] = $dado['idUsuario'];
                $_SESSION['nome'] = $dado['nome'];
                $_SESSION['usuario'] = $dado['usuario'];
                $_SESSION['senha'] = $dado['senha'];
                $_SESSION['idNivel'] = $dado['idNivel'];

                if ($dado['idNivel'] == '1' || $dado['idNivel'] >= '2') {
                    header('location:index.php');
                } else {
                    header('location:index.php');
                }
            }
        } else {
            $erroMsg = 'Email ou senha incorreta!';
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
   <title>Bumba Shop - Tela de login</title>
</head>

<body>

   <form method="POST">
      <h1>Bumba Shop</h1>
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
         <input type="submit" value="Entrar">
      </div>
      <div class="input-box">
         <a href="./index.php"><input type="button" value="Cancelar"></a>
      </div>
      <div class="input-box">
         Não tem uma conta? <a href="./cadastrar.php">Cadastre-se</a>
      </div>

   </form>
   
</body>

</html>