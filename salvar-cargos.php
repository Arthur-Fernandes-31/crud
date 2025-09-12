<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$cargo = null;

if ($id > 0) {
    $stmt = mysqli_prepare($conn, "SELECT CargoID, Nome, TetoSalarial FROM cargos WHERE CargoID = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $cargo = mysqli_fetch_assoc($res) ?: null;
    mysqli_stmt_close($stmt);
}
?>
<main>
  <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>

      <input type="hidden" name="CargoID" value="<?= $cargo ? (int)$cargo['CargoID'] : 0 ?>">

      <input type="text" name="Nome" placeholder="Nome do Cargo"
             value="<?= $cargo ? htmlspecialchars($cargo['Nome'], ENT_QUOTES) : '' ?>">

      <input type="number" name="TetoSalarial" placeholder="Teto Salarial"
             value="<?= $cargo ? htmlspecialchars($cargo['TetoSalarial'], ENT_QUOTES) : '' ?>">

      <button type="submit"><?= $cargo ? 'Atualizar' : 'Salvar' ?></button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
