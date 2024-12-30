<?php
	session_start();

	if (isset($_POST['idProduto'])){
        include_once '../../conexao.php';
		/*remover carrinho*/
		$id = intval($_POST['idProduto']);
		if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
            
        }
        echo json_encode("Produto Eliminado");
	}
?>

