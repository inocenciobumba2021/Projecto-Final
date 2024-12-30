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

	<title>BUMBA SHOP</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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
					
								<a href="index.php">BUMBA SHOP</a>
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
								<a href="carrinho.php">
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
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="./components/computadores.php">Computadores</a></li>
					<li><a href="./components/telefones.php">Telefones</a></li>
					<li><a href="./components/cameras.php">Cameras</a></li>
					<li><a href="./components/acessorios.php">Accessorios</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop01.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Coleção<br>Computadores</h3>
							<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop03.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Coleção<br>Accessorios</h3>
							<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop02.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Coleção<br>Cameras</h3>
							<a href="#" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Produtos Novos</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="">
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
											<div class="product-label">
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Enconstrução</a></h3>
											<h4 class="product-price">Enconstrução</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product02.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em construção</a></h3>
											<h4 class="product-price">Em construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product03.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em construção</a></h3>
											<h4 class="product-price">Em construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product04.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em construção</a></h3>
											<h4 class="product-price">Em construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product05.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em construção</a></h3>
											<h4 class="product-price">Em construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>

	<div class="publi">
		<div class="left">
			<img src="./img/product02.png" alt="">
		</div>
		<div class="text1">
			<h1>Bumba Shop</h1>
			<p>Inovação sem fim</p>
		</div>
		<div class="left">
			<img src="./img/product03.png" alt="">
		</div>
	</div>
	<section class="feature-area section_gap_bottom_custom">
			<div class="container">
			  <div class="row">
				<div class="col-lg-3 col-md-6"  style="margin-top: 30px;">
				  <div class="single-feature">
					<a href="#" class="title">
					<i class="fa-solid fa-truck"></i>	
					<h3>Entregas em Luanda</h3>
					</a>
					<p>Em até 72 horas</p>
				  </div>
				</div>
		
				<div class="col-lg-3 col-md-6" style="margin-top: 30px;">
				  <div class="single-feature">
					<a href="#" class="title">
					<i class="fa-solid fa-money-bill"></i>
					  <h3>Devoluções</h3>
					</a>
					<p>No prazo de 7 dias</p>
				  </div>
				</div>
		
				<div class="col-lg-3 col-md-6" style="margin-top: 30px;">
				  <div class="single-feature">
					<a href="#" class="title">
					<i class="fa-solid fa-phone"></i>
					  <h3>Call Center</h3>
					</a>
					<p>+244 172 243</p>
				  </div>
				</div>
		
				<div class="col-lg-3 col-md-6" style="margin-top: 30px;">
				  <div class="single-feature">
					<a href="#" class="title">
					<i class="fa-brands fa-paypal"></i>
					  <h3>Pagamento Seguro</h3>
					</a>
					<p>100% Segurança no pagamento</p>
				  </div>
				</div>
			  </div>
			</div>
		  </section>


	<!-- SECTION -->
	<div class="section">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Mais Vendidos</h3>
					</div>
				</div>

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<div class="product">
										<div class="product-img">
											<img src="./img/product06.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em Construção</a></h3>
											<h4 class="product-price">Em Construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product07.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em Construção</a></h3>
											<h4 class="product-price">Em Construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product08.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em Construção</a></h3>
											<h4 class="product-price">Em Construção</h4>

											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product09.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em Construção</a></h3>
											<h4 class="product-price">Em Construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Categoria</p>
											<h3 class="product-name"><a href="#">Em Construção</a></h3>
											<h4 class="product-price">Em Construção</h4>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
												<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i></button> -->
												<button class="quick-view"><i class="fa fa-eye"></i></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn">Add Carrinho</button>
										</div>
									</div>
									<!-- /product -->
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>


	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<strong>NEWSLETTER</strong>
						<form method="post">
							<input class="input" type="email" name="email" placeholder="Seu email" required value="<?php echo htmlspecialchars($email); ?>">
							<button class="newsletter-btn" name="confirmar"><i class="fa fa-envelope"></i> Subscrever</button>
					
					<?php if (!empty($erroMsg)): ?>
                    <div style="color: white; margin-top: 5px;font-size:28px;"><?php echo $erroMsg; ?></div>
                     <?php endif; ?>
                     <?php if (!empty($sucessoMsg)): ?>
                        <div style="color: white; margin-top: 5px;font-size:28px;"><?php echo $sucessoMsg; ?></div>
                     <?php endif; ?>


						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

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