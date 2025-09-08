<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = "SELECT * FROM cargos";
$result1 = mysqli_query($conn, $sql);

?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Teto Salárial</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
           <?php
          while($row = mysqli_fetch_assoc($result1)) {
              echo "<tr>";
              echo "<td>" . $row["CargoID"] . "</td>";
              echo "<td>" . $row["Nome"] . "</td>";
              echo "<td>" . $row["TetoSalarial"] . "</td>";
              echo "<td>
                      <a href='salvar-cargos.php?id=" . $row["CargoID"] . "' class='btn btn-edit'>Editar</a>
                      <a href='excluir-cargos.php?id=" . $row["CargoID"] . "' class='btn btn-delete'>Excluir</a>
                    </td>";
              echo "</tr>";
          }
        ?>
          </tbody>
        </table>
      </div> 
  </main>
  
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>