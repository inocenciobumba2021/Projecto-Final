
$(function () {

    /*---------------------------------------------------- select com input ------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------*/
// 	$(document).ready(function () {
// 	$('#text_box').hide();

// 	$('#select').change(function() {
// 		if ($(this).val() === 'outro') {
// 			$('#text_box').show();
// 			$('#select').hide();
// 		}
// 	});

// 	$('#cancel').click(function () {
// 		$('#select').show();
// 		$('#select').val('');
// 		$('#text_box').hide();
// 	});
// });

$(document).ready(function () {
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    
    /*MENU LATERAL*/

    menuBtn.addEventListener('click', ()=>{
    sideMenu.style.display = 'block';
    });

    closeBtn.addEventListener('click', ()=>{
        sideMenu.style.display = 'none';
    });
});

/*---------------------------------------------------Depois de exibir ao clicar no icone detalhes ele abre modal e exibe os detalhes da respectiva venda ---------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------*/
	$('body').on('click', '.listar', function () {		
		$('.modal-ver').show();
		$('.fechar-modal-ver').click(function () {
			$('.modal-ver').hide();
		});

		var idPedido = $(this).attr('id');
		var listDados = idPedido.split(':');;
		
		// alert(idPedido);
		
		$.ajax({
			method: 'POST',
			url: 'controller/detalhes.php',
			data: { mostrar: idPedido, list: listDados[0]},//estamos passando o id no indice 0
			success: function(retorno) {
				$('tbody#listaDados').html(retorno);
			}
		});
	});

	/*---------------------------------------------------ao clicar no icone elimina um pedido ---------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------*/
	$('body').on('click', '.confirmar_eliminar', function (e) {		
		
		var idPedido_eliminar = $(this).attr('data-id');
		var splitDados_eliminar = idPedido_eliminar.split(':');

		$.ajax({
			method: 'POST',
			url: 'controller/eliminar.php',
			data: { eliminar_pedido: idPedido_eliminar, pedido: splitDados_eliminar[0]},//estamos passando o id no indice 0
			success: function(retorno) {
				window.location = 'pedidos.php';
			}
		});
	});



	/*---------------------------------------------------ao clicar no icone elimina uma venda e seus itens ---------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------*/
	$('body').on('click', '.eliminar-categoria', function (e) {		
		
		var idCategoria_eliminar = $(this).attr('data-id');
		var splitDados_categoria = idCategoria_eliminar.split(':');

		$.ajax({
			method: 'POST',
			url: 'controller/eliminar.php',
			data: { eliminar_categoria: idCategoria_eliminar, categoria: splitDados_categoria[0]},//estamos passando o id no indice 0
			success: function(retorno) {
				window.location = 'categorias.php';
			}
		});
	});

	/*---------------------------------------------------Depois de exibir ao clicar no icone detalhes ele abre modal e exibe os detalhes do respectivo pedido ---------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------*/
	$('body').on('click', '.listar-mensagem', function () {		
		$('.modal-ver').show();
		$('.fechar-modal-ver').click(function () {
			$('.modal-ver').hide();
		});

		var idMensagem = $(this).attr('id');
		var listDados = idMensagem.split(':');;
		
		// alert(idMensagem);
		
		$.ajax({
			method: 'POST',
			url: 'controller/detalhes_mensagem.php',
			data: { mostrar: idMensagem, list: listDados[0]},//estamos passando o id no indice 0
			success: function(retorno) {
				$('tbody#listaDados').html(retorno);
			}
		});
	});

	

	/*---------------------------------------------------ao clicar no icone elimina mensagem---------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------*/
	$('body').on('click', '.eliminar-mensagem', function (e) {		
		
		var idMensagem_eliminar = $(this).attr('data-id');
		var splitDados_eliminar = idMensagem_eliminar.split(':');

		$.ajax({
			method: 'POST',
			url: 'controller/eliminar.php',
			data: { eliminar_mensagem: idMensagem_eliminar, mensagem: splitDados_eliminar[0]},//estamos passando o id no indice 0
			success: function(retorno) {
				window.location = 'mensagem.php';
			}
		});
	});

	/*---------------------------------------------------ao clicar elimina um produto ---------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------*/
	$('body').on('click', '.eliminar-produto', function (e) {		
		
		var idProduto_eliminar = $(this).attr('data-id');
		var splitDados_eliminar = idProduto_eliminar.split(':');

		$.ajax({
			method: 'POST',
			url: 'controller/eliminar.php',
			data: { eliminar_produto: idProduto_eliminar, mensagem: splitDados_eliminar[0]},//estamos passando o id no indice 0
			success: function(retorno) {
				window.location = 'produtos.php';
			}
		});
	});

})