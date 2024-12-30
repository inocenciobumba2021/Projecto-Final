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
	<title>Clientes Subscritos</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- style css -->
	<link rel="stylesheet" href="css/pedidos.css">
	<!-- Responsive-->
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/app.js"></script>
	<!-- fevicon -->
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
				<a href="admin.php" class="">
					<span><img src="../img/icones/geral.png"></span>
					<h3>Cadastrar Produto</h3>
				</a>
				<a href="produtos.php" class="">
					<span><img src="../img/icones/produto.png"></span>
					<h3>Produtos</h3>
				</a>
				<a href="categorias.php">
					<span><img src="../img/icones/acesso_24px.png"></span>
					<h3>Categorias</h3>
				</a>
				<a href="pedidos.php" class="">
					<span><img src="../img/icones/listarVendas_32px.png"></span>
					<h3>Pedidos</h3>
				</a>
				<a href="mensagem.php" class="">
					<span><img src="../img/icones/dia.png"></span>
					<h3>Mensagem</h3>
				</a>

				<a href="cliente.php" class="">
					<span><img src="../img/icones/customer_30px.png"></span>
					<h3>Usuarios </h3>
				</a>
				<a href="subscrito.php" class="active">
					<span><img src="../img/icones/email-icon.png"></span>
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

				<h2 class="txt-pedido">Clientes Subscritos</h2>

				<div class="box-table">
					<span class="listarVendas">
						<!--Aqui e aonde vai listar as todas as vendas finalizadas que foram recuperadsa no documento carrinho.js da alinea 112 ate 128-->
					</span>
				</div>

				<script>
					//Script da paginacao
					/*-- Recuperar todas as vendas finalizadas neste diretorio ('../assets/controller/vendas_finalizadas.php') e Listar no documento ('admin/listarVendas.php')*/
					var qnt_resultado_pg = 6; //quantidade de registo a exibir
					var pagina = 1; // primeira pagina a exibir

					$(document).ready(function() {
						mensagem(pagina, qnt_resultado_pg);
						// Chamar a funcao para listar registros
					});

					function mensagem(pagina, qnt_resultado_pg) {
						var dados = {
							pagina: pagina,
							qnt_resultado_pg: qnt_resultado_pg
						}
						var dados = $.post('controller/subscrito.php', dados, function(retorna) {
							$(".listarVendas").html(retorna);
						})
					}
				</script>

			</div>
		</main>
	</div>

	<div class="modal-ver">
		<div class="header-ver">
			<p> Detalhes da Mensagem</p>
			<p class="fechar-modal-ver" title="Fechar">X</p>
		</div>

		<div class="janela-modal-ver">

			<table>
				<thead>
					<th>Clientes Subscritos</th>
				</thead>
				<tbody id="listaDados">
					<?php
					// include '../assets/controller/mensagem.php';
					?>
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>