<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$produto = null;

// Pega dados do produto se estiver editando
if ($id > 0) {
    $stmt = mysqli_prepare($conn, "
        SELECT ProdutoID, Nome, Preco, Peso, Descricao, CategoriaID
        FROM produtos
        WHERE ProdutoID = ?
    ");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $produto = mysqli_fetch_assoc($res) ?: null;
    mysqli_stmt_close($stmt);
}

// Pega lista de categorias para o select
$categorias = mysqli_query($conn, "SELECT CategoriaID, Nome FROM categorias ORDER BY Nome");
?>

<main>
    <div id="produtos" class="tela">
        <form class="crud-form" action="./action/produtos.php" method="post">
          <h2>Cadastro de Produtos</h2>

          <!-- hidden para ID do produto -->
          <input type="hidden" name="ProdutoID" value="<?= $produto ? (int)$produto['ProdutoID'] : 0 ?>">

          <input type="text" name="Nome" placeholder="Nome do Produto"
                 value="<?= $produto ? htmlspecialchars($produto['Nome'], ENT_QUOTES) : '' ?>">

          <input type="number" name="Preco" placeholder="Preço"
                 value="<?= $produto ? htmlspecialchars($produto['Preco'], ENT_QUOTES) : '' ?>">

          <input type="number" name="Peso" placeholder="Peso (g)"
                 value="<?= $produto ? htmlspecialchars($produto['Peso'], ENT_QUOTES) : '' ?>">

          <textarea name="Descricao" placeholder="Descrição"><?= $produto ? htmlspecialchars($produto['Descricao'], ENT_QUOTES) : '' ?></textarea>

          <select name="CategoriaID">
            <option value="">Categoria</option>
            <?php while($row = mysqli_fetch_assoc($categorias)): ?>
                <option value="<?= $row['CategoriaID'] ?>" 
                  <?= $produto && $produto['CategoriaID'] == $row['CategoriaID'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($row['Nome'], ENT_QUOTES) ?>
                </option>
            <?php endwhile; ?>
          </select>

          <button type="submit"><?= $produto ? 'Atualizar' : 'Salvar' ?></button>
        </form>
    </div>
</main>

<?php include_once './include/footer.php'; ?>
