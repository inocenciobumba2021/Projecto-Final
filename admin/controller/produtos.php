
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

$produtos = array();
$cmd = $pdo->prepare("SELECT p.idProduto, p.nome, p.descricao, p.preco, p.quantidade, c.categoria AS categoria, u.nome AS usuario, p.dataCadastro FROM produtos p INNER JOIN categoria c ON c.idCategoria = p.idCategoria INNER JOIN usuario u ON u.idUsuario = p.idUsuario ORDER BY idProduto DESC LIMIT $inicio, $qnt_resultado_pg");
$cmd->execute();
$produtos = $cmd->fetchAll(PDO::FETCH_ASSOC);

if($produtos != 0)
{
    ?>
    <table class="tabela">
        <thead>
            <!-- <th>#</th> -->
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Categoria</th>
            <th>Usuario</th>
            <th>Data Cadastro</th>
            <th>Ações</th>
        </thead>
        <tbody id="mostrarVendas">
        <?php
            foreach ($produtos as  $value) 
            {
                extract($produtos);
                // echo '<td><input type="checkbox" name=""></td>';
                // echo'</tr><td>'.$value['idPedido'].'</td>';
                echo'<td>'.$value['idProduto'].'</td>';
                echo'<td>'.$value['nome'].'</td>';
                echo'<td>'.$value['descricao'].'</td>';
                echo'<td>'.number_format($value['preco'], 2,',','.').'</td>';
                echo'<td>'.$value['quantidade'].'</td>';
                echo'<td>'.$value['categoria'].'</td>';
                echo'<td>'.$value['usuario'].'</td>';
                echo'<td>'.$value['dataCadastro'].'</td>';
                echo '<td class="opcoes">';
                
                ?>
                  <button class="editar-produto" name="editar" data-id="<?php echo $value['idProduto'];?>">
                    <img src="imagens/editar.png" title="Editar produto" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                </button>
                <button class="eliminar-produto" name="eliminar_venda" data-id="<?php echo $value['idProduto'];?>">
                    <img src="imagens/apagar.png" title="Apagar este produto">
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
        $resultado_pg = $pdo->prepare("SELECT COUNT(idProduto) AS numero_resultado FROM produtos");
        $resultado_pg->execute();
        $linha_pg = $resultado_pg->fetch(PDO::FETCH_ASSOC);
        
        //quantiadade de pagina
        $quantidade_pg = ceil($linha_pg['numero_resultado'] / $qnt_resultado_pg);
    
        //Limitar link antes e depois
        $max_link = 2;

        ?>
        <div class="btn_paginacao">
            <?php
                echo "<a href='#' onclick='produtos(1, $qnt_resultado_pg)'><button>Primeira</button></a>";
                    
                /*So exibe as anterior da que esta visulizar quando for maior ou igual a 1*/
                    for($pag_anterior = $pagina - $max_link; $pag_anterior <= $pagina - 1; $pag_anterior ++){
                        if($pag_anterior >= 1){
                            echo "<a href='#' onclick='produtos($pag_anterior, $qnt_resultado_pg)'><button>$pag_anterior</button></a>";
                        }
                    }
                
                echo "<a href='#' ><button>$pagina</button></a>";/*Primeira pagina*/
        
                /*Exibe 2 pagina depois da que a exibir*/
                for($pag_depois = $pagina + 1; $pag_depois <= $pagina + $max_link; $pag_depois ++){
                    if($pag_depois <= $quantidade_pg){
                        echo "<a herf='#' onclick='produtos($pag_depois, $qnt_resultado_pg)'><button>$pag_depois</button></a>";
                    }
                }
                
                /*Exibe a Ultima pagina*/
                echo "<a href='#' onclick='produtos($quantidade_pg, $qnt_resultado_pg)'><button>Última</button></a>"; 
                ?>
        </div>
    <?php 
}
else
{
    echo "Nenhuma venda efetuada";
}?>
