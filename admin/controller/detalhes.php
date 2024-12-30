
<?php

if (isset($_POST['mostrar'])) {
	require_once '../../conexao.php';
	$idPedido = addslashes($_POST['mostrar']);

	$itens = array();
	$itens['dados']='';
	$cmd = $pdo->prepare("SELECT P.*, IT.idItemPedido, IT.idPedido, P.nome AS produtos, IT.preco, IT.quantidade, IT.subtotal FROM item_pedido IT INNER JOIN produtos P ON P.idProduto = IT.idProduto WHERE idPedido = :id");
	$cmd->bindValue(":id", $idPedido);
	$cmd->execute();

	$itens = $cmd->fetchAll(PDO::FETCH_ASSOC);
	foreach ($itens as $exibir) {
		// echo '<tr><td>'.$exibir['idItemPedido'].'</td>';
		// echo '<td>'.$exibir['idPedido'].'</td>';
		echo '<tr><td>'.$exibir['produtos'].'</td>';
		echo'<td>'.number_format($exibir['preco'], 2,',','.').' kz</td>';
		echo'<td>'.$exibir['quantidade'].'</td>';
		echo'<td>'.number_format($exibir['subtotal'], 2,',','.').' kz</td></tr>';

	}

}
?>
