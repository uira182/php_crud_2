<?php
if (isset($_POST['cadProd'])) {
    $cadastroProduto = new GravarProdutos();
    $resultado = $cadastroProduto->gravarProduto($_POST['nomeProd'], $_POST['descricao'], $_POST['vendaProd'], $_POST['compraProd'], $_POST['atualProd'], $_POST['minProd'], $_FILES['imgProd'], $_POST['categorias']);
}elseif(isset($_POST['edtProd'])){
    var_dump($_POST);
    var_dump($_FILES);
}
?>
<article id="cadastroProdutoFundo" class="container-fluid p-0 m-0">
    <article id="cadastroProduto" class="container">
        <?php
        if (isset($_GET['edtPro'])) {
            $produtos->produtoEdt($_GET['edtPro'], $categorias);
        } else {
            ?>
            <form method="post" class="row" enctype="multipart/form-data">
                <div class="col-lg-4 mt-4">
                    <div class="form-row">
                        <div class="col-sm-12 text-center">
                            <fieldset>
                                <img id="prodImg" class="img-thumbnail w-100 shadow" src="assets/images/sistema/image-default.png" />
                                <input id="Arquivo" type="file" class="form-control-file w-100 mx-auto mt-3" name="imgProd" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-row pt-2">
                        <div class="col-sm-12">
                            <div class="form-row">
                                <div class="col-6">
                                    <h5 for="sel2">Categorias</h5>
                                </div>
                                <!--div class="col-6 text-right">
                                    <a href="">
                                        <i class="fa fa-plus-circle text-success"></i>
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </div-->
                            </div>

                            <select class="form-control" id="sel2" name="categorias[]">
                                <?php $categorias->categoriasOpt(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-4">
                    <div class="form-row">
                        <div class="col-12">
                            <h6>Nome</h6>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left">
                                        <i class="fa fa-archive text-success"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" name="nomeProd" placeholder="Produto"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <h6>Valor de Venda</h6>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left">
                                        <i class="fa fa-money-bill text-success"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="vendaProd" placeholder="99,99" min="0" step="0.01"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Valor de Compra</h6>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left">
                                        <i class="fa fa-money-bill text-danger"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="compraProd" placeholder="99,99" min="0" step="0.01"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <h6>Quantidade Atual</h6>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text text-success rounded-left">
                                        <i class="fa fa-chart-line"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="atualProd" placeholder="10" min="0" max="100" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Quantidade Minima</h6>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left">
                                        <i class="fa fa-chart-line text-danger"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="minProd" placeholder="2" min="0"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <label>
                                <h6>Descrição do Produto</h6>
                            </label>
                            <textarea rows="10" class="form-control" name="descricao"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 text-right pt-3">
                            <button class="btn btn-success" name="cadProd" type="submit">Gravar</button>
                            <button class="btn btn-danger" type="button">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
        <div class="form-row">
            <div class="col-12 pt-3">
                <table class="table table-hover m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Qtd</th>
                            <th class="text-center d-sm-table-cell d-none">Valor<br />Compra</th>
                            <th class="text-center">Valor <br />Venda</th>
                            <th class="text-center d-md-table-cell d-none">
                                <i class="fa fa-edit"></i>
                            </th>
                            <th class="text-center d-md-table-cell d-none">
                                <i class="fa fa-trash"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $produtos->produtosList(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</article>