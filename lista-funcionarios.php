<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = "
SELECT
  f.FuncionarioID,
  f.Nome AS NomeFuncionario,
  f.DataNascimento,
  f.Email,
  f.Ramal,
  f.Salario,
  f.CargoID,
  cg.Nome AS NomeCargo,
  f.SetorID,
  s.Nome  AS NomeSetor
FROM funcionarios AS f
LEFT JOIN cargos   AS cg ON cg.CargoID  = f.CargoID
LEFT JOIN setor    AS s  ON s.SetorID   = f.SetorID
ORDER BY f.FuncionarioID
";
$result3 = mysqli_query($conn, $sql);
?>

<main>

  <div class="container">
    <h1>Lista de Funcionários</h1>
    <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Cargo</th>
          <th>Setor</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_assoc($result3)) {
              echo "<tr>";
              echo "<td>" . $row["FuncionarioID"] . "</td>";
              echo "<td>" . $row["NomeFuncionario"] . "</td>";
              echo "<td>" . $row["NomeCargo"] . "</td>";
              echo "<td>" . $row["NomeSetor"] . "</td>";
              echo "<td>
                      <a href='salvar-funcionarios.php?id=" . $row["FuncionarioID"] . "' class='btn btn-edit'>Editar</a>
                      <a href='./action/funcionarios.php?id=" . $row["FuncionarioID"] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
                    </td>";
              echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>