<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$producao = null;

// Pega dados da produção se estiver editando
if ($id > 0) {
    $stmt = mysqli_prepare($conn, "
        SELECT ProducaoID, FuncionarioID, ClienteID, ProdutoID, DataEntrega
        FROM producao
        WHERE ProducaoID = ?
    ");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $producao = mysqli_fetch_assoc($res) ?: null;
    mysqli_stmt_close($stmt);
}

// Pega lista de funcionários, clientes e produtos
$funcionarios = mysqli_query($conn, "SELECT FuncionarioID, Nome FROM funcionarios ORDER BY Nome");
$clientes = mysqli_query($conn, "SELECT ClienteID, Nome FROM clientes ORDER BY Nome");
$produtos = mysqli_query($conn, "SELECT ProdutoID, Nome FROM produtos ORDER BY Nome");
?>

<main>
    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/producao.php">
          <h2>Cadastro de Produção de Produtos</h2>

          <!-- hidden para ProducaoID -->
          <input type="hidden" name="ProducaoID" value="<?= $producao ? (int)$producao['ProducaoID'] : 0 ?>">

          <select name="FuncionarioID">
            <option value="">Funcionário</option>
            <?php while($row = mysqli_fetch_assoc($funcionarios)): ?>
                <option value="<?= $row['FuncionarioID'] ?>"
                    <?= $producao && $producao['FuncionarioID'] == $row['FuncionarioID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['Nome'], ENT_QUOTES) ?>
                </option>
            <?php endwhile; ?>
          </select>

          <select name="ClienteID">
            <option value="">Cliente</option>
            <?php while($row = mysqli_fetch_assoc($clientes)): ?>
                <option value="<?= $row['ClienteID'] ?>"
                    <?= $producao && $producao['ClienteID'] == $row['ClienteID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['Nome'], ENT_QUOTES) ?>
                </option>
            <?php endwhile; ?>
          </select>

          <select name="ProdutoID">
            <option value="">Produto</option>
            <?php while($row = mysqli_fetch_assoc($produtos)): ?>
                <option value="<?= $row['ProdutoID'] ?>"
                    <?= $producao && $producao['ProdutoID'] == $row['ProdutoID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['Nome'], ENT_QUOTES) ?>
                </option>
            <?php endwhile; ?>
          </select>

          <label for="">Data da entrega</label>
          <input type="date" name="DataEntrega" placeholder="Data da Entrega"
                 value="<?= $producao ? $producao['DataEntrega'] : '' ?>">

          <button type="submit"><?= $producao ? 'Atualizar' : 'Salvar' ?></button>
        </form>
    </div>
</main>

<?php include_once './include/footer.php'; ?>
