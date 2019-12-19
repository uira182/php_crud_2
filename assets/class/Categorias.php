<?php

/**
 * Classe das Categorias
 */
class Categorias extends Conexao {

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

}

/**
 * Classe para Exibir as Categorias
 */
class ExibeCategorias extends ListarCategorias {

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    public function categoriasOpt() {
        $allCategorias = $this->allCategorias();
        $num = count($allCategorias);
        if ($num > 0) {
            $optionCat = "<option value='0'>Selecione uma categoria</option>";
        } else {
            $optionCat = "<option>Nenhuma Categoria</option>";
        }
        foreach ($allCategorias as $categoria) {
            $optionCat .= '<option value="' . $categoria['id'] . '">' . $categoria['nome_categoria'] . '</option>';
        }
        echo $optionCat;
    }

    public function categoriasCard($categoria) {
        $oneCategoria = $this->oneCategorias($categoria);
        $resultado = '<small class="badge small badge-dark">' . $oneCategoria['nome_categoria'] . '</small>';
        return $resultado;
    }

    public function categoriasList() {
        $allCategoria = $this->allCategorias();
        $qtd = count($allCategoria);
        if ($qtd > 0) {
            foreach ($allCategoria as $categoria) {
                echo'
                    <tr>
                        <td>' . $categoria['nome_categoria'] . '</td>
                        <td class="text-center d-md-table-cell d-none">
                            <a href="?pg=cadCat&edtCat=' . $categoria['id'] . '">
                                <i class="fa fa-pen text-success"></i>
                            </a>
                        </td>
                        <td class="text-center d-md-table-cell d-none">
                            <a href="?pg=cadCat&delCat=' . $categoria['id'] . '">
                                <i class="fa fa-times-circle text-danger"></i>
                            </a>
                        </td>
                    </tr>
                ';
            }
        } else {
            echo'
                <tr>
                    <td>
                        <h6>Sem registro</h6>
                    </td>
                </tr>
            ';
        }
    }

    public function categoriaEdt($id) {
        $categoria = $this->oneCategorias($id);
        echo'
            <label>Nome</label>
            <div class="input-group mb-3">
                    <input type="text" name="nome" class="form-control" value="' . $categoria['nome_categoria'] . '" placeholder="Categoria">
                    <div class="input-group-append">
                        <button class="btn btn-success" name="edtCat" value="' . $categoria['id'] . '" type="submit">Atualizar</button>
                        <button class="btn btn-danger" type="button">Cancelar</button>
                    </div>
            </div>
        ';
    }

}

/**
 * Classe para Listar as Categorias
 */
class ListarCategorias extends Categorias {

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    protected function allCategorias() {
        $query = "SELECT * FROM categoria";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    protected function oneCategorias($id) {
        $query = "SELECT * FROM categoria WHERE id='$id'";
        $resultado = $this->getOne($query);
        return $resultado;
    }

}

class GravarCategorias extends Conexao {

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    public function gravarCategoria($nome) {
        $query = "INSERT INTO categoria (nome_categoria) VALUES ('$nome')";
        $resultado = $this->execute($query);
        if (!resultado) {
            var_dump($resultado);
        } else {
            header("Location: ?pg=cadCat");
        }
    }

}

class EditarCategorias extends Conexao {

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    public function editarCategoria($id, $nome) {
        $query = "UPDATE categoria SET nome_categoria='$nome' WHERE id='$id'";
        $resultado = $this->execute($query);
        if (!resultado) {
            var_dump($resultado);
        } else {
            header("Location: ?pg=cadCat");
        }
    }

}

class DeletarCategorias extends Conexao {

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    public function deletarCategoria($id) {
        $query = "DELETE FROM categoria WHERE id='$id'";
        $resultado = $this->execute($query);
        if (!resultado) {
            var_dump($resultado);
        } else {
            header("Location: ?pg=cadCat");
        }
    }

}

?>