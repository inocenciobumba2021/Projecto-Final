<?php
/*----- ELIMANAR PEDIDO*/
    if (isset($_POST['eliminar_pedido'])){
        require_once '../../conexao.php';
        $idPedido = addslashes($_POST['eliminar_pedido']);
        
        $apagar_itens_venda = $pdo->prepare("DELETE FROM item_pedido WHERE idPedido = :idp");
        $apagar_itens_venda->bindValue(":idp", $idPedido);
        $apagar_itens_venda->execute();
        
        if($apagar_itens_venda){
            $apagar_venda = $pdo->prepare("DELETE FROM pedido WHERE idPedido = :id");
            $apagar_venda->bindValue(":id", $idPedido);
            $apagar_venda->execute();
            header('location: ../pedidos.php');
        }
    }

    /*----- ELIMANAR MENSAGEM*/
    if (isset($_POST['eliminar_mensagem'])){
        require_once '../../conexao.php';
        $idMensagem = addslashes($_POST['eliminar_mensagem']);
        
        $apagar_itens_venda = $pdo->prepare("DELETE FROM mensagem WHERE idMensagem = :idp");
        $apagar_itens_venda->bindValue(":idp", $idMensagem);
        $apagar_itens_venda->execute();
        header('location: ../mensagem.php');
    }


    /*----- ELIMANAR CATEGORIA*/
    if (isset($_POST['eliminar_categoria'])){
        require_once '../../conexao.php';
        $idCategoria = addslashes($_POST['eliminar_categoria']);
        
        $apagar_categoria = $pdo->prepare("DELETE FROM categoria WHERE idCategoria = :idp");
        $apagar_categoria->bindValue(":idp", $idCategoria);
        $apagar_categoria->execute();
        header('location: ../categorias.php');
    }

    /*----- ELIMANAR PRODUTO*/
    if (isset($_POST['eliminar_produto'])){
        require_once '../../conexao.php';
        $idProduto = addslashes($_POST['eliminar_produto']);

        $apagar_img_produto = $pdo->prepare("DELETE FROM imagens WHERE idProduto = :idp");
        $apagar_img_produto->bindValue(":idp", $idProduto);
        $apagar_img_produto->execute();

        if($apagar_img_produto){
            $apagar_itens_venda = $pdo->prepare("DELETE FROM produtos WHERE idProduto = :idp");
            $apagar_itens_venda->bindValue(":idp", $idProduto);
            $apagar_itens_venda->execute();
            header('location: ../produtos.php');
        }
    }


?>