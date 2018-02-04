<?php
include_once 'conectar_banco.php';

$query = mysql_query("UPDATE tblProdutos SET views = views + 1 WHERE idProduto=". $_GET['idProduto']);
echo mysql_error();
header('location:view_produto.php?idProduto='.$_GET['idProduto']);


?>