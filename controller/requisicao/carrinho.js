

$(function () {

    

    $(".add-carrinho").click(function(event){
        var $idProduto = $(event.target).attr("id");
        var $td = $(event.target);
        var	$nome = $td.data("nome");
        // var $descricao = $td.data("descricao");
        var	$preco = $td.data("preco");
        // var $qtd = $td.data("quantidade");
        // var $imagem = $td.data("foto");
        // alert("Produto adcionado ao carrinho");
        

        var pagina ="controller/app/carrinho.php";//refencia do botao adcionar ao carrinho

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: pagina,
            beforeSend: function (){
                $("#msg").html('Carregando...');
            },
            data: {
                idProduto: $idProduto, 
                nome: $nome, 
                // descricao: $descricao, 
                preco: $preco,
                // quantidade: $qtd, 
                // foto: $imagem
            },
            success: function (){
                alert("Produto adcionado ao carrinho");
                window.location= 'carrinho.php';			
            }
        });
        // setTimeout('atualizar_carrinho()', 100)
    });

    //add
    $(".add_qtd").click(function(event){
        var $idProduto = $(event.target).attr("id");
        var $td = $(event.target);
        var	$nome = $td.data("nome");
        // var $descricao = $td.data("descricao");
        var	$preco = $td.data("preco");
        // var $qtd = $td.data("quantidade");
        // var $imagem = $td.data("foto");

        var pagina ="controller/app/add_qtd.php";//refencia do botao adcionar ao carrinho

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: pagina,
            beforeSend: function (){
                $("#msg").html('Carregando...');
            },
            data: {
                idProduto: $idProduto, 
                nome: $nome, 
                // descricao: $descricao, 
                preco: $preco,
                // quantidade: $qtd, 
                // foto: $imagem
            },
            success: function (msg){
                $("#msg").html(msg);
                window.location= 'carrinho.php';			
            }
        });
        // setTimeout('atualizar_carrinho()', 100)
    });

    //diminuuir
    $(".dimuir_qtd").click(function(event){
        var $idProduto = $(event.target).attr("id");
        var $td = $(event.target);
        var	$nome = $td.data("nome");
        // var $descricao = $td.data("descricao");
        var	$preco = $td.data("preco");
        // var $qtd = $td.data("quantidade");
        // var $imagem = $td.data("foto");

        var pagina ="controller/app/diminui_qtd.php";//refencia do botao adcionar ao carrinho

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: pagina,
            beforeSend: function (){
                $("#msg").html('Carregando...');
            },
            data: {
                idProduto: $idProduto, 
                nome: $nome, 
                // descricao: $descricao, 
                preco: $preco,
                // quantidade: $qtd, 
                // foto: $imagem
            },
            success: function (msg){
                $("#msg").html(msg);
                window.location= 'carrinho.php';			
            }
        });
        // setTimeout('atualizar_carrinho()', 100)
    });

    //Eliminar produto
$(".eliminar-produto").click(function(event){
    var $idProduto = $(event.target).attr("id");
    var $td = $(event.target);
    var	$nome = $td.data("nome");
    // var $descricao = $td.data("descricao");
    var	$preco = $td.data("preco");
    // var $qtd = $td.data("quantidade");
    // var $imagem = $td.data("foto");

	var pagina ="controller/app/eliminar_produto.php";//refencia do botao adcionar ao carrinho

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: pagina,
		beforeSend: function (){
			$("#msg").html('Carregando...');
		},
		data: {
            idProduto: $idProduto, 
            nome: $nome, 
            // descricao: $descricao, 
            preco: $preco,
            // quantidade: $qtd, 
            // foto: $imagem
        },
		success: function (){
            alert('Deseja eliminar este produto?');
            window.location= 'carrinho.php';			
		}
    });
    // setTimeout('atualizar_carrinho()', 100)
    })
})