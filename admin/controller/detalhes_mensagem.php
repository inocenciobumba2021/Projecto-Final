
<?php

if (isset($_POST['mostrar'])) {
	require_once '../../conexao.php';
	$idMensagem = addslashes($_POST['mostrar']);

	$itens = array();
	$itens['dados']='';
	$cmd = $pdo->prepare("SELECT * FROM mensagem WHERE idMensagem = :id");
	$cmd->bindValue(":id", $idMensagem);
	$cmd->execute();

	$itens = $cmd->fetchAll(PDO::FETCH_ASSOC);
	foreach ($itens as $exibir) {
		echo '<tr><td>'.$exibir['nome'].': '.$exibir['mensagem'].'</tr>';
	}
}
?>
