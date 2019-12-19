<?php
if (isset($_POST['addCat'])) {
    $gravarCategoria = new GravarCategorias();
    $gravarCategoria->gravarCategoria($_POST['nome']);
}if (isset($_POST['edtCat'])) {
    $editarCategoria = new EditarCategorias($_POST['edtCat'], $_POST['nome']);
    $editarCategoria->editarCategoria($_POST['edtCat'], $_POST['nome']);
} elseif (isset($_GET['delCat'])) {
    $deletarCategoria = new DeletarCategorias();
    $deletarCategoria->deletarCategoria($_GET['delCat']);
}
?>
<article id="cadastroProdutoFundo" class="container-fluid p-0 m-0">
    <article id="cadastroProduto" class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <form method="POST">
                    <?php
                    if (isset($_GET['edtCat'])) {
                        $categorias->categoriaEdt($_GET['edtCat']);
                    } else {
                        echo'
                                <label>Nome</label>
                                <div class="input-group mb-3">
                                        <input type="text" name="nome" class="form-control" placeholder="Categoria">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" name="addCat" type="submit">Gravar</button>
                                            <button class="btn btn-danger" type="button">Cancelar</button>
                                        </div>
                                </div>
                        ';
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 pt-3">
                <table class="table table-hover m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th class="text-center d-md-table-cell d-none">
                                <i class="fa fa-edit"></i>
                            </th>
                            <th class="text-center d-md-table-cell d-none">
                                <i class="fa fa-trash"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $categorias->categoriasList(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</article>