<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$setor = null;

if ($id > 0) {
    $stmt = mysqli_prepare($conn, "SELECT SetorID, Nome, Andar, Cor FROM setor WHERE SetorID = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $setor = mysqli_fetch_assoc($res) ?: null;
    mysqli_stmt_close($stmt);
}
?>
<main>
    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/setores.php">
          <h2>Cadastro de Setores</h2>

          <!-- hidden para ID do setor -->
          <input type="hidden" name="SetorID" value="<?= $setor ? (int)$setor['SetorID'] : 0 ?>">

          <input type="text" name="Nome" placeholder="Nome do Setor"
                 value="<?= $setor ? htmlspecialchars($setor['Nome'], ENT_QUOTES) : '' ?>">

          <input type="text" name="Andar" placeholder="Andar"
                 value="<?= $setor ? htmlspecialchars($setor['Andar'], ENT_QUOTES) : '' ?>">

          <input type="text" name="Cor" placeholder="Cor"
                 value="<?= $setor ? htmlspecialchars($setor['Cor'], ENT_QUOTES) : '' ?>">

          <button type="submit"><?= $setor ? 'Atualizar' : 'Salvar' ?></button>
        </form>
    </div>
</main>

<?php include_once './include/footer.php'; ?>
