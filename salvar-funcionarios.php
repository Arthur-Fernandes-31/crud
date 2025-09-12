<?php
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$funcionario = null;

// Pega os dados do funcionário se estiver editando
if ($id > 0) {
    $stmt = mysqli_prepare($conn, "
        SELECT FuncionarioID, Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID
        FROM funcionarios
        WHERE FuncionarioID = ?
    ");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $funcionario = mysqli_fetch_assoc($res) ?: null;
    mysqli_stmt_close($stmt);
}

// Pega lista de cargos e setores para os selects
$cargos = mysqli_query($conn, "SELECT CargoID, Nome FROM cargos ORDER BY Nome");
$setores = mysqli_query($conn, "SELECT SetorID, Nome FROM setor ORDER BY Nome");
?>

<main>
    <div id="funcionarios" class="tela">
        <form class="crud-form" method="post" action="./action/funcionarios.php">
          <h2>Cadastro de Funcionários</h2>

          <!-- Campo oculto para ID do funcionário -->
          <input type="hidden" name="FuncionarioID" value="<?= $funcionario ? (int)$funcionario['FuncionarioID'] : 0 ?>">

          <input type="text" name="Nome" placeholder="Nome" 
                 value="<?= $funcionario ? htmlspecialchars($funcionario['Nome'], ENT_QUOTES) : '' ?>">

          <input type="date" name="DataNascimento" placeholder="Data de Nascimento" 
                 value="<?= $funcionario ? $funcionario['DataNascimento'] : '' ?>">

          <input type="email" name="Email" placeholder="Email" 
                 value="<?= $funcionario ? htmlspecialchars($funcionario['Email'], ENT_QUOTES) : '' ?>">

          <input type="number" name="Salario" placeholder="Salário" 
                 value="<?= $funcionario ? htmlspecialchars($funcionario['Salario'], ENT_QUOTES) : '' ?>">

          <select name="Sexo">
            <option value="">Sexo</option>
            <option value="M" <?= $funcionario && $funcionario['Sexo']=='M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $funcionario && $funcionario['Sexo']=='F' ? 'selected' : '' ?>>Feminino</option>
          </select>

          <input type="text" name="CPF" placeholder="CPF" 
                 value="<?= $funcionario ? htmlspecialchars($funcionario['CPF'], ENT_QUOTES) : '' ?>">

          <input type="text" name="RG" placeholder="RG" 
                 value="<?= $funcionario ? htmlspecialchars($funcionario['RG'], ENT_QUOTES) : '' ?>">

          <select name="CargoID">
            <option value="">Cargo</option>
            <?php while($row = mysqli_fetch_assoc($cargos)): ?>
                <option value="<?= $row['CargoID'] ?>" 
                  <?= $funcionario && $funcionario['CargoID'] == $row['CargoID'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($row['Nome'], ENT_QUOTES) ?>
                </option>
            <?php endwhile; ?>
          </select>

          <select name="SetorID">
            <option value="">Setor</option>
            <?php while($row = mysqli_fetch_assoc($setores)): ?>
                <option value="<?= $row['SetorID'] ?>" 
                  <?= $funcionario && $funcionario['SetorID'] == $row['SetorID'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($row['Nome'], ENT_QUOTES) ?>
                </option>
            <?php endwhile; ?>
          </select>

          <button type="submit"><?= $funcionario ? 'Atualizar' : 'Salvar' ?></button>
        </form>
    </div>
</main>

<?php include_once './include/footer.php'; ?>
