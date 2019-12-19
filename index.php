<?php
require_once 'assets/class/Conexao.php';
require_once 'assets/class/Produtos.php';
require_once 'assets/class/Categorias.php';
require_once 'assets/class/CategoriasProdutos.php';
require_once 'assets/class/UploadImagem.php';

$categorias = new ExibeCategorias();
$produtos = new ExibeProdutos();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PHP Zero</title>
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/bootstrap/compiler/bootstrap.css" />
        <script src="assets/js/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
        <script src="assets/fontawesome/js/all.js"></script>
    </head>
    <body class="bg-dark p-sm-0 p-2">
        <header class="container text-center text-light  p-0">
            <h1>PHP Zero</h1>
        </header>
        <nav class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary rounded-top">
                <a class="navbar-brand" href="index.php">Dashboard</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=cadPro">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=cadCat">Categorias</a>
                        </li>
                    </ul>
                    <form class="d-md-inline d-none form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control" type="text" name="nome" placeholder="Procurar..."/>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-right bg-success">
                                    <i class="fa fa-search text-light"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
        <section id="cadastroProdutoFundo" class="container-fluid p-0">
            <?php
            if (isset($_GET['pg'])) {
                switch ($_GET['pg']) {
                    case 'cadPro':
                        include_once 'assets/cadPro.php';
                        break;
                    case 'cadCat':
                        include_once 'assets/cadCat.php';
                        break;
                    default:
                        include_once 'assets/dashboard.php';
                        break;
                }
            } else {
                include_once "assets/dashboard.php";
            }
            ?>
        </section>
        <footer class="container bg-secondary rounded-bottom mb-3">
            <div class="row p-2">
                <div class="col-4">

                </div>
                <div class="col-4 text-center">
                    <h6 class="text-light">
                        <i class="fa fa-copyright"></i> Professor Uirá - 2019 
                    </h6>
                </div>
                <div class="col-4">

                </div>
            </div>
        </footer>

        <!-- Carregando Bootstrap.js e Popper.js -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/popper/dist/umd/popper.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>