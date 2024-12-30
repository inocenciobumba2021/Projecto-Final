
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

$categoria = array();
$cmd = $pdo->prepare("SELECT  * FROM categoria ORDER BY idCategoria DESC LIMIT $inicio, $qnt_resultado_pg");
$cmd->execute();
$categoria = $cmd->fetchAll(PDO::FETCH_ASSOC);

if($categoria != 0)
{
    ?>
    <table class="tabela">
        <thead>
            <!-- <th>#</th> -->
            <th>#</th>
            <th>Categoria</th>
            <th>Ações</th>
        </thead>
        <tbody id="mostrarVendas">
        <?php
            foreach ($categoria as  $value) 
            {
                extract($categoria);
              
                echo'<td>'.$value['idCategoria'].'</td>';
                
                echo'<td>'.$value['categoria'].'</td>';
        
                echo '<td class="opcoes">';
                
                ?>
                <button class="eliminar-categoria" name="eliminar-categoria" data-id="<?php echo $value['idCategoria'];?>">
                    <img src="imagens/apagar.png" title="Apagar esta Mensagem">
                </button>
                <?php
                echo'</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <?php
        /* paginacao - somar a quqantidade de venda*/ 
        $resultado_pg = $pdo->prepare("SELECT COUNT(idCategoria) AS numero_resultado FROM categoria");
        $resultado_pg->execute();
        $linha_pg = $resultado_pg->fetch(PDO::FETCH_ASSOC);
        
        //quantiadade de pagina
        $quantidade_pg = ceil($linha_pg['numero_resultado'] / $qnt_resultado_pg);
    
        //Limitar link antes e depois
        $max_link = 2;

        ?>
        <div class="btn_paginacao">
            <?php
                echo "<a href='#' onclick='categoria(1, $qnt_resultado_pg)'><button>Primeira</button></a>";
                    
                /*So exibe as anterior da que esta visulizar quando for maior ou igual a 1*/
                    for($pag_anterior = $pagina - $max_link; $pag_anterior <= $pagina - 1; $pag_anterior ++){
                        if($pag_anterior >= 1){
                            echo "<a href='#' onclick='categoria($pag_anterior, $qnt_resultado_pg)'><button>$pag_anterior</button></a>";
                        }
                    }
                
                echo "<a href='#' ><button>$pagina</button></a>";/*Primeira pagina*/
        
                /*Exibe 2 pagina depois da que a exibir*/
                for($pag_depois = $pagina + 1; $pag_depois <= $pagina + $max_link; $pag_depois ++){
                    if($pag_depois <= $quantidade_pg){
                        echo "<a herf='#' onclick='categoria($pag_depois, $qnt_resultado_pg)'><button>$pag_depois</button></a>";
                    }
                }
                
                /*Exibe a Ultima pagina*/
                echo "<a href='#' onclick='categoria($quantidade_pg, $qnt_resultado_pg)'><button>Última</button></a>"; 
                ?>
        </div>
    <?php 
}
else
{
    echo "Não existem mensagens";
}
