<?php 
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = "
  SELECT 
    p.ProducaoID,
    p.ProdutoID,
    f.Nome AS NomeFuncionario,
    c.Nome AS NomeCliente,
    pr.Nome AS NomeProduto
  FROM producao p
  JOIN funcionarios f ON p.FuncionarioID = f.FuncionarioID
  JOIN clientes c ON p.ClienteID = c.ClienteID
  JOIN produtos pr ON p.ProdutoID = pr.ProdutoID
";

$result6 = mysqli_query($conn, $sql);
?>
<main>
  <div class="container">
    <h1>Lista de Produções</h1>
    <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Produto</th>
          <th>Cliente</th>
          <th>Funcionário</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result6)) {
            echo "<tr>";
            echo "<td>" . $row["ProducaoID"] . "</td>";
            echo "<td>" . $row["NomeProduto"] . "</td>";
            echo "<td>" . $row["NomeCliente"] . "</td>";
            echo "<td>" . $row["NomeFuncionario"] . "</td>";
            echo "<td>
                    <a href='salvar-producao.php?id=" . $row["ProducaoID"] . "' class='btn btn-edit'>Editar</a>
                    <a href='./action/producao.php?id=" . $row["ProducaoID"] . "&acao=excluir' class='btn btn-delete' onclick=\"return confirm('Confirma exclusão?');\">Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<?php 
include_once './include/footer.php';
?>
