<?php
require_once '../../conexao.php';
session_start();

//pegando no carrinho.js
if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

if (isset($_POST['idProduto'])) {
	/*campos vindo javascript*/
	
	$idProduto = intval($_POST['idProduto']);
    $nome = $_POST['nome'];
    // $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    // $qtd = $_POST['quantidade'];
    // $imagem = $_POST['foto'];

	if (!isset($_SESSION['carrinho'][$idProduto])) {
		$_SESSION['carrinho'][$idProduto] = array('idProduto'=> $idProduto,'nome'=> $nome,'preco' => $preco,'quantidade' => 1);
		echo json_encode("Produto adicionado");
	}else{
		$_SESSION['carrinho'][$idProduto]['quantidade']++;
		// echo json_encode("Quantidade acrescentada");
		?>
		<script>
			alert("Quantidade acrescentada");
		</script>
		<?php
	}
}





?>