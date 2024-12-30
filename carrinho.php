<?php 
session_start();
include 'conexao.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';

$erroMsg = '';
$sucessoMsg = '';

if (isset($_POST['confirmar'])) {
    if (empty($email)) {
        $erroMsg = 'Preencha o campo de email.';
    } else {
        // Verificar se o email já está cadastrado
        $check_cmd = $pdo->prepare("SELECT COUNT(*) FROM subscricao WHERE email = :email");
        $check_cmd->bindValue(':email', $email);
        $check_cmd->execute();
        $result = $check_cmd->fetchColumn();

        if ($result > 0) {
            $erroMsg = 'Este email já existe!';
        } else {
            // Se o email não estiver cadastrado, inserir no banco de dados
            $cmd = $pdo->prepare("INSERT INTO subscricao (email, dataSubscricao) VALUES(:e, NOW())");
            $cmd->bindValue(':e', $email);
            $cmd->execute();

            $sucessoMsg = 'Subscrição feita!';
            $email = ''; // Limpar o valor do email após a inserção bem-sucedida
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>BUMBA SHOP</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="./css/carrinho.css">


</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +244 172 2243</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> bumbashop@gmail.com.com</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li></li>
					<?php
            if(isset($_SESSION['idNivel'])) {
               if($_SESSION['idNivel'] == '1') {
                  // Se o usuário logado for um administrador
                  echo '<li class="nav-item">
                   <a class="nav-link" href="admin/admin.php">Área Administrativa</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="sair.php">Sair</a>
               </li>';
               } else {
                  // Se o usuário logado não for um administrador
                  echo '<li class="nav-item">
                              <a class="nav-link" href="sair.php">Sair</a>
                           </li>';
   }
            } else {
               // Se não houver uma sessão ativa, mostrar apenas o link de login
               echo '<li class="nav-item">
               <a href="login.php"><i class="fa fa-user-o"></i>Minha Conta</a>
           </li>';
         }?>

				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
								<!-- <img src="./img/logo.png" alt=""> -->
								<a href="index.php">BUMBA SHOP</a>
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Seus Gostos</span>
									<div class="qty">0</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Seu carrinho</span>
									<div class="qty">0</div>
								</a>

							</div>

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="carrinho.php">Seu carrinho</a></li>
					</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- SECTION -->
        <div class="cart-container">
        <div class="cart-header">
            <div>Detalhes do produto</div>
            <div>Preço</div>
            <div>Quantidade</div>
            <div>Total</div>
            <div>Eliminar</div>
        </div>

        <div class="cart-item">
            <div>
                <img src="./img/product01.png" alt="Product">
                <span class="product-name">Nome</span>
            </div>
            <div>Em construção</div>
            <div>
                <input type="number" value="1" style="width: 50px; height:30px; text-align: center;">
            </div>
            <div>Em construção</div>
            <div class="remove">&times;</div>
        </div>

        <div class="cart-item">
            <div>
                <img src="./img/product01.png" alt="Product">
                <span class="product-name">Nome</span>
            </div>
            <div>Em construção</div>
            <div>
                <input type="number" value="1" style="width: 50px; height:30px; text-align: center;">
            </div>
            <div>Em construção</div>
            <div class="remove">&times;</div>
        </div>

        <div class="cart-item">
            <div>
                <img src="./img/product01.png" alt="Product">
                <span class="product-name">Nome</span>
            </div>
            <div>Em construção</div>
            <div>
                <input type="number" value="1" style="width: 50px; height:30px; text-align: center;">
            </div>
            <div>Em construção</div>
            <div class="remove">&times;</div>
        </div>

        <div class="cart-total">
            <span>Subtotal: Em construção</span>
            <span class="total">Total: Em construção</span>
        </div>
		<div class="btn">
		<button>Continuar</button>
		</div>
    </div>

		<!-- /container -->
	</div>


	
	<!-- FOOTER -->
	<footer id="footer">
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="footer">
							<h3 class="footer-title">Bumba Shop</h3>
							<p> Bumba Shop é uma empresa de vendas virtual, criada em 2024, conta atualmente com mais de
								6 clientes frequentes. Cadastre-se, torne-se nosso cliente e faça parte da nossa
								história!
							</p>
						</div>
					</div>

					<div class="col-md-2"></div>

					<div class="col-md-4 ">
						<div class="footer">
							<h3 class="footer-title">Informacão</h3>
							<ul class="footer-links">
								<li><a href="#">Sobre Nós</a></li>
								<li><a href="#">Contata Nos</a></li>
								<li><a href="#">Politica & Privacidade</a></li>
								<li><a href="#">Termos & Condicions</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3"></div>

					<div class="col-md-3 ">
						<div class="footer">
							<h3 class="footer-title">Serviços</h3>
							<ul class="footer-links">
								<li><a href="#">Minha conta</a></li>
								<li><a href="#">Ver Carrinho</a></li>
								<li><a href="#">Gostos</a></li>
								<li><a href="#">Ajuda</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<span class="copyright">
					bumbashop@gmail.com || Todos Os Direitos Reservados</a>
				</span>
			</div>
		</div>
		</div>
		</div>
	</footer>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>