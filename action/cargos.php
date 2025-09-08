<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];
// validacao
switch ($acao) {
    case 'value':
        $sql = "DELETE FROM cargos WHERE CargoID = $id";

        mysqli_query($conn, $sql);
        header("Location: ../lista-cargos.php");
        break;
    
    default:
        # code...
        break;
}
?>