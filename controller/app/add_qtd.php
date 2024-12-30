<?php
session_start();
if (isset($_POST['idProduto'])) {
    include_once '../../conexao.php';
	/*campos vindo javascript*/
	$idProduto = intval($_POST['idProduto']);
	$nome= $_POST['nome'];
	$preco = $_POST['preco'];

	if (!isset($_SESSION['carrinho'][$idProduto])) {
		$_SESSION['carrinho'][$idProduto] = array('nome'=> $nome,'preco' => $preco,'quantidade' => 1);

		if ($_SESSION['carrinho'][$idProduto]['quantidade'] == 0) {
			session_start();

			if (isset($_POST['idProduto'])){
				/*remover carrinho*/
				$id = intval($_POST['idProduto']);
				if (isset($_SESSION['carrinho'][$id])) {
					unset($_SESSION['carrinho'][$id]);
				}
			}
		}
	}else{
		$_SESSION['carrinho'][$idProduto]['quantidade']++;
		echo json_encode("Quantidade aumentada");
	}
}



?>