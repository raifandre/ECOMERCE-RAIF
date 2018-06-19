<?php
    include_once("../controllers/Carrinho_Controller.php");
    $carrinho = new Carrinho_Controller;
    $list = $carrinho->listar();
    $quantia = count($list);

    include_once("../controllers/Produto_Controller.php");
    $produto = new Produto_Controller;
    $listar = $produto->listar();
    $quant = count($listar);
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
    <title>NIKE Store</title>
    <link rel="shortcut icon" href="../../public/img/Nike.png" type="image/x-icon" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../../public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- TOPO -->
        <div class="row">
            <div class="col-md-10">
                <a href="index.php"><img class="img-responsive text-center" id="logo" src="../../public/img/Nike.png" alt="Loja NIKE"></a>
            </div>
            <div class="col-md-2">
                <a href="carrinho.php" style="position: relative;">
                    <img class="img-responsive text-center" id="logoCarrinho" src="../../public/img/carrinho.png" alt="Carrinho de Compra">
                    <div class="contadorCarrinho">
                        <span class="label" style="margin-left: 5px;"><?php echo $quantia ?></span>
                    </div>
                </a>
            </div>
        </div><hr>
        <body>
            <!-- MENU -->
            <div class="container bg-verde-musgo">
                <div class="row">
                    <div class="col-12 row">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php" id="navbarDropdown">Início</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Produto
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="listarProdutos.php">Listar Produtos</a>
                                      <a class="dropdown-item" href="cadastrarProduto.php">Cadastrar Produto</a>
                                    </div>
                                </li><li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Categoria
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="listarCategorias.php">Listar Categorias</a>
                                      <a class="dropdown-item" href="cadastrarCategoria.php">Cadastrar Categoria</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div><br>

            <!-- CONTEUDO -->
            <div class="container">
                <div class="row">
                    <?php for ($i=0; $i < $quant; $i++) { ?>
                        <div class="card" style="width: 18rem; margin-left: 5px;">
                            <form id="cadastrarCarrinho<?php echo $i ?>" enctype="multipart/form-data" method="post" role="cadastrarCarrinho<?php echo $i ?>" onsubmit="return false;" accept-charset="utf-8">
                                <input type="hidden" name="contador" id="contador" value="<?= $i ?>">
                                <input type="hidden" name="cadastrarCarrinho<?php echo $i ?>" id="cadastrarCarrinho<?php echo $i ?>"/>
                                <input type="hidden" name="nome" id="nome" value="<?php echo $listar[$i]->nome ?>"/>
                                <input type="hidden" name="preco" id="preco" value="<?php echo $listar[$i]->preco ?>"/>
                                <a href="visualizarProduto.php?id=<?php echo $listar[$i]->id?>"><img class="card-img-top" src="../../public/img/chuteiras.png" style="margin-top: 5px;" alt="Card image cap"></a>
                                <div class="card-body">
                                <h5 class="card-title"><a href="visualizarProduto.php?id=<?php echo $listar[$i]->id?>"><?php echo $listar[$i]->nome ?></a></h5>
                                <p class="card-text">R$ <?php echo $listar[$i]->preco ?>,00</p>
                                <div class="col-md-10 row">
                                    <div class="form-group">
                                        <b><label>Quantidade <i id="obrigatorio">*</i>:</label></b>
                                        <input class="form-control" type="number" id="quantidade" name="quantidade" placeholder="Quantidade de Produto" value="1" min="1" required>
                                    </div>
                                </div>
                                <button type="submit" onclick="cadastrar(<?php echo $i ?>)" class="btn btn-primary">Adicionar ao Carrinho</a>
                            </form>
                          </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- RODAPE -->
            <div class="text-center">
                <br><b><p><i>2018 - Todos direitos reservados</i></p></b>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../../public/js/jquery.js"></script>
            <script src="../../public/js/jquery.mask.js"></script>

            <script>
                function cadastrar(identificador) {
                    var dados = $('#cadastrarCarrinho'+identificador).serialize();
                    $.ajax({
                        //Envia os valores para action
                        url: '../actions/cadastrarCarrinho.php?contador='+identificador,
                        type: 'post',
                        dataType: 'html',
                        data: dados,
                        success: function(result){
                            if(result == 'Produto adicionado no carrinho.'){
                                alert(result);
                                setTimeout("document.location = './index.php'", 1000);
                            } else {
                                alert("Falha ao inserir no carrinho.");
                            }
                        }
                    });

                }

            </script>
        </body>
    </head>
</html>