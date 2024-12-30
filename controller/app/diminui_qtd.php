<?php
session_start();

if (isset($_POST['idProduto'])) {
    include_once '../../conexao.php';
    /* campos vindos do JavaScript */
    $idProduto = intval($_POST['idProduto']);
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    if (!isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto] = array('nome' => $nome, 'preco' => $preco, 'quantidade' => 1);
    } else {
        $_SESSION['carrinho'][$idProduto]['quantidade']--;

        if ($_SESSION['carrinho'][$idProduto]['quantidade'] == 0) {
            unset($_SESSION['carrinho'][$idProduto]);
        }
    }

    if (empty($_SESSION['carrinho'])) {
        echo json_encode("Seu carrinho está vazio");
        session_destroy(); // Clear the session
        // Redirect to the homepage
        header("Location: index.php");
        exit;
    } else {
        echo json_encode("Quantidade diminuída");
    }
}
?>
