
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

$subscricao = array();
$cmd = $pdo->prepare("SELECT  * FROM subscricao ORDER BY id_sub DESC LIMIT $inicio, $qnt_resultado_pg");
$cmd->execute();
$subscricao = $cmd->fetchAll(PDO::FETCH_ASSOC);

if($subscricao != 0)
{
    ?>
    <table class="tabela">
        <thead>
            <!-- <th>#</th> -->
            <th>Email</th>
            <th>Data</th>
        </thead>
        <tbody id="mostrarVendas">
        <?php
            foreach ($subscricao as  $value) 
            {
                extract($subscricao);
                // echo '<td><input type="checkbox" name=""></td>';
                // echo'</tr><td>'.$value['idMensagem'].'</td>';
                //echo'<td>'.$value['idMensagem'].'</td>';
                echo '<td>'.$value['email'].'</td>';
                
                echo'<td>'.date('d/m/Y', strtotime($value['dataSubscricao'])).'</td>';
                
                echo'</td></tr>';
            }
            ?>
        </tbody>
    </table>
            
        <!-- <div class="fundo-eliminar">
            <div class="janela-modal-eliminar">
            <p class="header-modal-eliminar">Eliminar este registro?</p>
                <div class="btns-modal-eliminar">
                    <button class="confirmar_eliminar" name="eliminar_venda" data-id="<?php echo $value['id_sub'];?>">
                        Sim
                    </button>
                    <p class="fechar-modal-eliminar" title="Fechar">Não</p>
                </div>  
            </div>
        </div> -->

    <?php
        /* paginacao - somar a quqantidade de venda*/ 
        $resultado_pg = $pdo->prepare("SELECT COUNT(id_sub) AS numero_resultado FROM subscricao");
        $resultado_pg->execute();
        $linha_pg = $resultado_pg->fetch(PDO::FETCH_ASSOC);
        
        //quantiadade de pagina
        $quantidade_pg = ceil($linha_pg['numero_resultado'] / $qnt_resultado_pg);
    
        //Limitar link antes e depois
        $max_link = 2;

        ?>
        <div class="btn_paginacao">
            <?php
                echo "<a href='#' onclick='mensagem(1, $qnt_resultado_pg)'><button>Primeira</button></a>";
                    
                /*So exibe as anterior da que esta visulizar quando for maior ou igual a 1*/
                    for($pag_anterior = $pagina - $max_link; $pag_anterior <= $pagina - 1; $pag_anterior ++){
                        if($pag_anterior >= 1){
                            echo "<a href='#' onclick='mensagem($pag_anterior, $qnt_resultado_pg)'><button>$pag_anterior</button></a>";
                        }
                    }
                
                echo "<a href='#' ><button>$pagina</button></a>";/*Primeira pagina*/
        
                /*Exibe 2 pagina depois da que a exibir*/
                for($pag_depois = $pagina + 1; $pag_depois <= $pagina + $max_link; $pag_depois ++){
                    if($pag_depois <= $quantidade_pg){
                        echo "<a herf='#' onclick='mensagem($pag_depois, $qnt_resultado_pg)'><button>$pag_depois</button></a>";
                    }
                }
                
                /*Exibe a Ultima pagina*/
                echo "<a href='#' onclick='mensagem($quantidade_pg, $qnt_resultado_pg)'><button>Última</button></a>"; 
                ?>
        </div>
    <?php 
}
else
{
    echo "Não existem mensagens";
}
