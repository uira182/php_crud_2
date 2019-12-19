<?php
/**
 *	
 */
class categoriasProdutos extends Conexao
{

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    public function categoriaProduto($id){
    	$query = "SELECT p.*, c.*, cp.* FROM categoria c, produto p, categoriaproduto cp WHERE p.id='$id' AND cp.idProduto = p.id AND c.id=cp.idCategoria";
    	$resultado = $this->getAll($query);
    	//var_dump($resultado);
    	return $resultado;
    }
}

/**
 * Classe para cadastrar o vinculo entre produtos e suas categorias.
 */
class CadastroProdCat extends Conexao
{

    function __construct() {
        parent:: __construct();
    }

    function __destruct() {
        parent:: __destruct();
    }

    public function gravarProdCat($categoria, $produto){
        $query = "INSERT INTO categoriaproduto (idProduto, idCategoria) VALUES ('$categoria', '$produto')";
        $resultado = $this->execute($query);
        //var_dump($resultado);
        return $resultado;
    }

}

class DelProdCat extends Conexao
{
    function __construct(){
        parent::__construct();
    }

    function __destruct(){
        parent::__destruct();
    }

    public function delCatProd($id){
        $query("DELETE FROM categoriaproduto WHERE id='$id'");
        $resultado = $this->execute($query);
        
    }
}


?>