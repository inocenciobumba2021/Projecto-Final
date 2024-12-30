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
	<link type="text/css" rel="stylesheet" href="./../css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="./../css/slick.css" />
	<link type="text/css" rel="stylesheet" href="./../css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="./../css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="./../css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="./../css/style.css" />

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
					<li><a href="login.php"><i class="fa fa-user-o"></i>Minha Conta</a></li>
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
								<a href="./../index.php">BUMBA SHOP</a>
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
					<li><a href="./../index.php">Home</a></li>
					<li><a href="./computadores.php">Computadores</a></li>
					<li><a href="./telefones.php">Telefones</a></li>
					<li class="active"><a href="./cameras.php">Cameras</a></li>
					<li><a href="./acessorios.php">Accessorios</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

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
											<img src="./../img/product01.png" alt="">
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
											<img src="./../img/product02.png" alt="">
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
											<img src="./../img/product03.png" alt="">
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
											<img src="./../img/product04.png" alt="">
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
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
			<div class="row">

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs" style="margin-top: 60px;">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="">
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./../img/product01.png" alt="">
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
											<img src="./../img/product02.png" alt="">
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
											<img src="./../img/product03.png" alt="">
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
											<img src="./../img/product04.png" alt="">
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
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
			<div class="row">

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs" style="margin-top: 60px;">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="">
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./../img/product01.png" alt="">
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
											<img src="./../img/product02.png" alt="">
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
											<img src="./../img/product03.png" alt="">
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
											<img src="./../img/product04.png" alt="">
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

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<strong>NEWSLETTER</strong>
						<form>
							<input class="input" type="email" placeholder="Seu email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscrever</button>
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
	<script src="./../js/jquery.min.js"></script>
	<script src="./../js/bootstrap.min.js"></script>
	<script src="./../js/slick.min.js"></script>
	<script src="./../js/nouislider.min.js"></script>
	<script src="./../js/jquery.zoom.min.js"></script>
	<script src="./../js/main.js"></script>

</body>

</html>