
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/app.js"></script>

<?php
session_start();


 if(!isset($_SESSION['idUsuario']))
 { 
 	unset($_SESSION['idUsuario']);
 	header("location:../../../index.php");
 	exit;
 }

include_once '../../conexao.php'; 

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_resultado_pg = filter_input(INPUT_POST, 'qnt_resultado_pg', FILTER_SANITIZE_NUMBER_INT);
//Calucular inicio da vizulizacao
$inicio = ($pagina * $qnt_resultado_pg) - $qnt_resultado_pg;

$pedido = array();
$cmd = $pdo->prepare("SELECT  * FROM pedido ORDER BY idPedido DESC LIMIT $inicio, $qnt_resultado_pg");
$cmd->execute();
$pedido = $cmd->fetchAll(PDO::FETCH_ASSOC);

if($pedido != 0)
{
    ?>
    <table class="tabela">
        <thead>
            <!-- <th>#</th> -->
            <th>#</th>
            <th>Email</th>
            <th>Pais</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Apartamento</th>
            <th>Cidade</th>
            <th>Telefone</th>
            <th>Total</th>
            <th>Data Pedido</th>
            <th>Ações</th>
        </thead>
        <tbody id="mostrarVendas">
        <?php
            foreach ($pedido as  $value) 
            {
                extract($pedido);
                // echo '<td><input type="checkbox" name=""></td>';
                // echo'</tr><td>'.$value['idPedido'].'</td>';
                echo'<td>'.$value['idPedido'].'</td>';
                echo '<td>'.$value['email'].'</td>';
                echo'<td>'.$value['pais'].'</td>';
                echo'<td>'.$value['nome'].'</td>';
                echo'<td>'.$value['sobrenome'].'</td>';
                echo'<td>'.$value['apartamento'].'</td>';
                echo'<td>'.$value['cidade'].'</td>';
                echo'<td>'.$value['telefone'].'</td>';
                echo'<td>'.number_format($value['total'], 2,',','.').' kz</td>';
                echo'<td>'.date('d/m/Y', strtotime($value['dataPedido'])).'</td>';
                echo '<td class="opcoes">';
                
                ?>
                <button class="listar" name="listar" id="<?php echo $value['idPedido'];?>" data-nome="<?php echo $value['nome'];?>'">
                    <img class="verModal" src="imagens/ver.png" title="Mais detalhes deste pedido" >
                </button>
                |
                <button class="confirmar_eliminar" name="eliminar_venda" data-id="<?php echo $value['idPedido'];?>">
                    <img src="imagens/apagar.png" title="Apagar este pedido">
                </button>
                <?php
                echo'</td></tr>';
            }
            ?>
        </tbody>
    </table>
            
        <!-- <div class="fundo-eliminar">
            <div class="janela-modal-eliminar">
            <p class="header-modal-eliminar">Eliminar este registro?</p>
                <div class="btns-modal-eliminar">
                    <button class="confirmar_eliminar" name="eliminar_venda" data-id="<?php echo $value['idPedido'];?>">
                        Sim
                    </button>
                    <p class="fechar-modal-eliminar" title="Fechar">Não</p>
                </div>  
            </div>
        </div> -->

    <?php
        /* paginacao - somar a quqantidade de venda*/ 
        $resultado_pg = $pdo->prepare("SELECT COUNT(idPedido) AS numero_resultado FROM pedido");
        $resultado_pg->execute();
        $linha_pg = $resultado_pg->fetch(PDO::FETCH_ASSOC);
        
        //quantiadade de pagina
        $quantidade_pg = ceil($linha_pg['numero_resultado'] / $qnt_resultado_pg);
    
        //Limitar link antes e depois
        $max_link = 2;

        ?>
        <div class="btn_paginacao">
            <?php
                echo "<a href='#' onclick='pedidos(1, $qnt_resultado_pg)'><button>Primeira</button></a>";
                    
                /*So exibe as anterior da que esta visulizar quando for maior ou igual a 1*/
                    for($pag_anterior = $pagina - $max_link; $pag_anterior <= $pagina - 1; $pag_anterior ++){
                        if($pag_anterior >= 1){
                            echo "<a href='#' onclick='pedidos($pag_anterior, $qnt_resultado_pg)'><button>$pag_anterior</button></a>";
                        }
                    }
                
                echo "<a href='#' ><button>$pagina</button></a>";/*Primeira pagina*/
        
                /*Exibe 2 pagina depois da que a exibir*/
                for($pag_depois = $pagina + 1; $pag_depois <= $pagina + $max_link; $pag_depois ++){
                    if($pag_depois <= $quantidade_pg){
                        echo "<a herf='#' onclick='pedidos($pag_depois, $qnt_resultado_pg)'><button>$pag_depois</button></a>";
                    }
                }
                
                /*Exibe a Ultima pagina*/
                echo "<a href='#' onclick='pedidos($quantidade_pg, $qnt_resultado_pg)'><button>Última</button></a>"; 
                ?>
        </div>
    <?php 
}
else
{
    echo "Nenhuma venda efetuada";
}
