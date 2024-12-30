<?php
session_start();
if (!isset($_SESSION["user_portal"])) {
	header('location: ../login.php');
}


require_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- mobile metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<!-- site metas -->
	<title>Bumba Shop Admin</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- style css -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- fevicon -->
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/app.js"></script>
	<link rel="icon" href="img/fevicon.png" type="image/gif" />
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<!-- Tweaks for older IEs-->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<!-- owl stylesheets -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
	<script src="../assets/js/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/app.js"></script>
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">

	<div class="container">
		<aside>
			<div class="top">
				<!-- <div class="logo"><img src="../img/ok.png" alt="#" /></div> -->
				<h1 style="margin-top: 50px; color:white; font-weight:300; text-align:center; text-transform:uppercase; margin-left:10px;">Bumba Shop</h1>
			</div>
			<div class="close">
				<img class="close-btn" src="../img/icones/close.png">
			</div>

			<div class="sidebar">
				<a href="admin.php" class="active">
					<span><img src="../img/icones/geral.png" width="20" height="20"></span>
					<h3>Cadastrar Produto</h3>
				</a>
				<a href="produtos.php" class="">
					<span><img src="../img/icones/produto.png" width="20" height="20"></span>
					<h3>Produtos</h3>
				</a>
				<a href="categorias.php">
					<span><img src="../img/icones/acesso_24px.png" width="20" height="20"></span>
					<h3>Categorias</h3>
				</a>
				<a href="pedidos.php" class="">
					<span><img src="../img/icones/listarVendas_32px.png" width="20" height="20"></span>
					<h3>Pedidos</h3>
				</a>
				<a href="mensagem.php" class="">
					<span><img src="../img/icones/dia.png" width="20" height="20"></span>
					<h3>Mensagem</h3>
				</a>
				<a href="cliente.php" class="">
					<span><img src="../img/icones/customer_30px.png" width="20" height="20"></span>
					<h3>Usuarios </h3>
				</a>
				<a href="subscrito.php">
					<span><img src="../img/icones/email-icon.png" width="20" height="20"></span>
					<h3>Subscrição</h3>
				</a>
				<a href="sair.php" class="sair">
					<span><img src="../img/icones/cancel_48px.png" width="20" height="20"></span>
					<h3>Sair</h3>
				</a>
			</div>

			<div class="fundo-sair">
				<div class="janela-modal-sair">
					<p class="header-modal-sair">Sair da área administrativa?</p>
					<div class="btns-modal-sair">
						<form method="POST">
							<input style="margin-top:-2.5rem;" type="submit" value="Sim" name="sair">
						</form>
						<p class="fechar-modal-sair" title="Fechar">Não</p>
					</div>
				</div>

				<?php
				if (isset($_POST['sair'])) {
					header('location: sair.php');
				}
				?>
			</div>

			<script type="text/javascript">
				$('.sair').on('click', function(e) {
					e.preventDefault();
					$('.fundo-sair').fadeIn();
					$('.fechar-modal-sair').click(function() {
						$('.fundo-sair').hide();
					});

				});
			</script>
		</aside>
		<!-------------------- FIM DO ASIDE ---------------------->

		<main>
			<div class="box">
				<div class="direita">
					<h2>Painel <small class="versao">versão 1.0</small></h2>
					<div class="top">
						<button class="menu-btn">
							<img src="../img/icones/menu.png">
						</button>

						<div class="perfil">
							<div class="info">
								<p><b><?php echo $_SESSION['nome'] ?></b></p>
								<small class="texto-mudo">
									<?php
									$nivel = $pdo->prepare("SELECT n.nivel AS nivel FROM usuario u INNER JOIN nivel n ON n.idNivel = u.idNivel WHERE idUsuario = :id");
									$nivel->bindValue(":id", $_SESSION['idUsuario']);
									$nivel->execute();
									$nv = $nivel->fetch(PDO::FETCH_ASSOC);
									echo $nv['nivel'];
									?>
								</small>
							</div>

							<div class="perfil-foto-e-notificacao">

							</div>
						</div>
					</div>
				</div>

				<h2>CADASTRAR PRODUTO</h2>
				<form method="POST" action="" enctype="multipart/form-data">
					<label for="nome">Nome</label>
					<input type="text" name="nome" id="nome" required />
					<label for="descricao">Descrição</label>
					<input type="text" name="descricao" id="descricao" required />
					<label for="preco">Preço</label>
					<input type="text" name="preco" id="preco" required />
					<label for="quantidade">Quantidade</label>
					<input type="text" name="quantidade" id="quantidade" required />
					<label for="idCategoria">Categoria</label>
					<select name="idCategoria">
						<?php
						$cmd = $pdo->prepare("SELECT * FROM categoria ");
						$cmd->execute();
						if ($cmd->rowCount() > 0) {
							while ($categoria = $cmd->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value=" . $categoria['idCategoria'] . ">" . $categoria['categoria'] . "</option>";
							}
						}
						?>
					</select>

					<label for="nome">Usuario</label>
					<select name="idUsuario">
						<?php
						$cmd = $pdo->prepare("SELECT * FROM usuario INNER JOIN nivel ON usuario.idNivel = nivel.idNivel WHERE idUsuario = :id");
						$cmd->bindValue(":id", $_SESSION['idUsuario']);
						$cmd->execute();
						if ($cmd->rowCount() > 0) {
							while ($nivel = $cmd->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value=" . $nivel['idNivel'] . ">" . $nivel['nivel'] . "</option>";
							}
						}
						?>
					</select>
					<label>Imagem</label>
					<input type="file" name="foto[]" multiple id="foto">
					<Button style="width:100%; height:50px;">Cadastrar</Button>
				</form>

				<?php
				if (isset($_POST['nome'])) {
					$nome = addslashes($_POST['nome']);
					$descricao = addslashes($_POST['descricao']);
					$preco = addslashes($_POST['preco']);
					$qtd = addslashes($_POST['quantidade']);
					$categoria = addslashes($_POST['idCategoria']);
					$usuario = addslashes($_POST['idUsuario']);
					$fotos = array();
					$dataCadastro = date('Y-m-s H:i:s');


					if (isset($_FILES['foto'])) {
						// Verifica se alguma imagem foi enviada
						if ($_FILES['foto']['size'][0] == 0) {
							echo "Por favor, selecione pelo menos uma imagem.";
							exit; // Encerra o script para evitar a execução do restante do código
						}
						// Salva as imagens na pasta e adiciona os nomes ao array
						for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
							$arquivo = $_FILES['foto']['name'][$i] . rand(1, 999) . '.png';
							move_uploaded_file($_FILES['foto']['tmp_name'][$i], '../img/' . $arquivo);
							array_push($fotos, $arquivo);
						}
					} else {
						echo "Por favor, selecione uma imagem.";
						exit;
					}

					if (!empty($nome) && !empty($preco) && !empty($qtd) && !empty($categoria)) {
						// require 'classes/produto.php';
						// $p = new Produto('beleza_mbutinha','localhost', 'root','root');
						// $p->enviarProduto($nome, $descricao, $preco, $qtd, $categoria, $usuario, $fotos);
						$cmd = $pdo->prepare('INSERT INTO produtos (nome, descricao,preco,quantidade,idCategoria,idUsuario,dataCadastro) VALUES (:n, :d, :p, :q, :c, :u, :dt)');
						$cmd->bindValue(':n', $nome);
						$cmd->bindValue(':d', $descricao);
						$cmd->bindValue(':p', $preco);
						$cmd->bindValue(':q', $qtd);
						$cmd->bindValue(':c', $categoria);
						$cmd->bindValue(':u', $usuario);
						$cmd->bindValue(':dt', $dataCadastro);

						$cmd->execute();
						$idProduto = $pdo->LastInsertId();

						if (count($fotos) > 0) {
							for ($i = 0; $i < count($fotos); $i++) {
								$nome_foto = $fotos[$i];
								$cmd = $pdo->prepare('INSERT INTO imagens (nome_imagem, idProduto) VALUES (:n, :id)');
								$cmd->bindValue(':n', $nome_foto);
								$cmd->bindValue(':id', $idProduto);
								$cmd->execute();
							}
						}
					} else {
						echo "";
					}
				}
				?>
			</div>
		</main>
	</div>
</body>

</html>