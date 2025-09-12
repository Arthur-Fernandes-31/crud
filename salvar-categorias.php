<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$categoria = null;

// Pega dados da categoria se estiver editando
if ($id > 0) {
    $stmt = mysqli_prepare($conn, "SELECT CategoriaID, Nome, Descricao FROM categorias WHERE CategoriaID = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $categoria = mysqli_fetch_assoc($res) ?: null;
    mysqli_stmt_close($stmt);
}
?>

<main>
    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/categorias.php">
          <h2>Cadastro de Categorias</h2>

          <!-- hidden para ID da categoria -->
          <input type="hidden" name="CategoriaID" value="<?= $categoria ? (int)$categoria['CategoriaID'] : 0 ?>">

          <input type="text" name="Nome" placeholder="Nome da Categoria"
                 value="<?= $categoria ? htmlspecialchars($categoria['Nome'], ENT_QUOTES) : '' ?>">

          <textarea name="Descricao" placeholder="Descrição"><?= $categoria ? htmlspecialchars($categoria['Descricao'], ENT_QUOTES) : '' ?></textarea>

          <button type="submit"><?= $categoria ? 'Atualizar' : 'Salvar' ?></button>
        </form>
    </div>
</main>

<?php include_once './include/footer.php'; ?>
