<?php

/**
 * Classe dos Produtos
 */
class Produtos extends Conexao {

    protected function __construct() {
        parent:: __construct();
    }

    protected function __destruct() {
        parent:: __destruct();
    }

}

/**
 * Classe para Exibir Produtos
 */
class ExibeProdutos extends ListarProdutos {

    public function __construct() {
        parent:: __construct();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    public function produtosCard() {
        $allCat = new categoriasProdutos();
        $allProdutos = $this->allProdutos();
        $qtd = count($allProdutos);
        if ($qtd > 0) {
            foreach ($allProdutos as $produto) {
                $listCat = $allCat->categoriaProduto($produto['id']);
                $smallCat = '';
                foreach ($listCat as $cat) {
                    if (!empty($smallCat)) {
                        $smallCat .= "";
                    }
                    $smallCat .= "<small class='badge small badge-dark'>{$cat['nome_categoria']}</small>";
                }
                if (empty($produto['imagem'])) {
                    $imagem = 'assets/images/sistema/image-default.png';
                } else {
                    $imagem = $produto['imagem'];
                }
                echo'  
                    <div class="rounded bg-light col-xl-2 col-lg-3 col-md-4 col-sm-6 mt-1 p-1">
                        <div class="container border rounded p-1">
                            <div class="form-row imgBoxProd">
                                <div class="col-12">
                                    <img id="icoImg" class="img-thumbnail w-100" src="' . $imagem . '"></img>
                                </div>
                            </div>
                            <div class="form-row nomeBoxProd">
                                <div class="col-12 text-justify pt-1">
                                    <h6>' . substr($produto['nome'], 0, 30) . '</h6>
                                </div>
                            </div>
                            <div class="form-row descBoxProd">
                                <div class="col-12 text-justify">
                                    <h6 class="small">' . substr($produto['descricao'], 0, 30) . '...</h6>
                                </div>
                            </div>
                            <div class="form-row valBoxProd">
                                <div class="col-12 text-right compToggle">
                                    <h5 class="text-danger">R$:' . number_format($produto['valorVenda'], 2, ",", ".") . '</h5>
                                </div>
                            </div>
                            <div class="form-row compraBoxProd">
                                <div class="col-12 text-center">
                                    <button class="btn btn-success item3 w-75">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        } else {
            echo'  
                <div class="col-12 text-left m-3">
                    <h6>Sem registro!</h6>
                </div>
            ';
        }
    }

    public function produtosList() {
        $allCat = new categoriasProdutos();
        $allProdutos = $this->allProdutos();
        $qtd = count($allProdutos);
        if ($qtd > 0) {
            foreach ($allProdutos as $produto) {
                $listCat = $allCat->categoriaProduto($produto['id']);
                $smallCat = '';
                foreach ($listCat as $cat) {
                    if (!empty($smallCat)) {
                        $smallCat .= " | ";
                    }
                    $smallCat .= "{$cat['nome_categoria']}";
                }
                echo'
                    <tr>
                        <td>' . substr($produto['nome'], 0, 30) . '...</td>
                        <td class="text-center">' . $smallCat . '</td>
                        <td class="text-center">' . $produto['qtdAtual'] . '</td>
                        <td class="text-center d-sm-table-cell d-none">
                            R$: ' . number_format($produto['valorCompra'], 2, ",", ".") . '
                        </td>
                        <td class="text-center">
                            R$: ' . number_format($produto['valorVenda'], 2, ",", ".") . '
                        </td>
                        <td class="text-center d-md-table-cell d-none">
                            <a href="?pg=cadPro&edtPro=' . $produto['id'] . '">
                                <i class="fa fa-pen text-success"></i>
                            </a>
                        </td>
                        <td class="text-center d-md-table-cell d-none">
                            <a href="?pg=cadPro&delPro=' . $produto['id'] . '">
                                <i class="fa fa-times-circle text-danger"></i>
                            </a>
                        </td>
                    </tr>
                ';
            }
        } else {
            echo'
                <tr>
                    <td colspan="11" class="text-left">
                        <h6>Sem registro</h6>
                    </td>
                </tr>
            ';
        }
    }

    public function produtoEdt($id, $categorias) {
        $allProdutoCat = $this->allProdutosCategora($id);
        foreach ($allProdutoCat as $produto) {
            echo'
            <form method="post" class="row" enctype="multipart/form-data">
                <div class="col-lg-4 mt-4">
                    <div class="form-row">
                        <div class="col-sm-12 text-center">
                            <fieldset>
                                <img id="Tela" class="img-thumbnail w-100 h-50 shadow" src="' . $produto['imagem'] . '" />
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
                                ';
                                    $categorias->categoriasOpt();
                                echo'
                            </select>
                            <div class="row pt-2">
                                <div class="col-6 pl-4">
                                    <h6>'. $produto['nome_categoria'] .'</h6>
                                </div>
                                <div class="col-6">
                                    <a href="?pg=cadPro&edtPro='.$id.'&delCat='.$produto['nome_categoria'].'">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
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
                                <input class="form-control" type="text" name="nomeProd" value="' . $produto['nome'] . '" placeholder="Produto"/>
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
                                <input class="form-control" type="number" name="vendaProd" value="' . number_format($produto['valorVenda'], 2, ".", ".") . '" placeholder="99,99" min="0" step="0.01"/>
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
                                <input class="form-control" type="number" name="compraProd" value="' . number_format($produto['valorCompra'], 2, ".", ".") . '" placeholder="99,99" min="0" step="0.01"/>
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
                                <input class="form-control" type="number" name="atualProd" value="' . $produto['qtdAtual'] . '" placeholder="10" min="0" max="100" />
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
                                <input class="form-control" type="number" name="minProd" value="' . $produto['qtdMinima'] . '" placeholder="2" min="0"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <label>
                                <h6>Descrição do Produto</h6>
                            </label>
                            <textarea rows="10" class="form-control" name="descricao">
                                ' . $produto['descricao'] . '
                            </textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 text-right pt-3">
                            <button class="btn btn-success" name="edtProd" type="submit">
                                Atualizar
                            </button>
                            <button class="btn btn-danger" type="button">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        ';
        }
        
    }

}

/**
 * Classe para Listar Produtos
 */
class ListarProdutos extends Produtos {

    public function __construct() {
        parent:: __construct();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    protected function allProdutos() {
        $query = "SELECT * FROM produto";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    protected function oneProdutos($id) {
        $query = "SELECT * FROM produto WHERE id='$id'";
        $resultado = $this->getOne($query);
        return $resultado;
    }

    protected function allProdutosCategora($id) {
        $query = "SELECT p.*, c.* FROM produto p, categoria c, categoriaproduto cp WHERE p.id='$id' and cp.idProduto=p.id and c.id=cp.idCategoria";
        $resultado = $this->getAll($query);
        return $resultado;
    }

}

/**
 * Classe para Cadastrar Produtos
 */
class GravarProdutos extends Conexao {

    public function __construct() {
        parent:: __construct();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    public function gravarProduto($nome, $desc, $valorVenda, $valorCompra, $atual, $minimo, $arquivo, $categoria) {
        $upload = new UploadImagem();
        $imagem = $upload->upload($arquivo);

        $query = "INSERT INTO produto (nome, descricao, imagem, valorCompra, valorVenda, qtdAtual, qtdMinima) VALUES ('$nome', '$desc', '$imagem', '$valorCompra', '$valorVenda', '$atual', '$minimo')";
        $addProd = $this->execute($query);
        //var_dump($addProd);

        foreach ($categoria as $c) {
            echo $c;
            $prodCat = new CadastroProdCat();
            $resultado = $prodCat->gravarProdCat($addProd, $c);
            var_dump($resultado);
        }
    }

}

?>