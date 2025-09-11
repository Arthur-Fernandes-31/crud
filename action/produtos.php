<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];
// validacao
switch ($acao) {
    case 'excluir':
        $sql = 'DELETE FROM produtos WHERE ProdutoID ='.$id;
        
        mysqli_query($conn, $sql);
        header("Location: ../lista-produtos.php");
        break;
    
    default:
        # code...
        break;
}
?>