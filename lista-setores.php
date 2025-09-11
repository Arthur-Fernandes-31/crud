<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


$sql = "SELECT * FROM setor";
$result2 = mysqli_query($conn, $sql);

?>

  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
        
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
           <?php
          while($row = mysqli_fetch_assoc($result2)) {
              echo "<tr>";
              echo "<td>" . $row["SetorID"] . "</td>";
              echo "<td>" . $row["Nome"] . "</td>";
              echo "<td>" . $row["Andar"] . "</td>";
              echo "<td>" . $row["Cor"] . "</td>";
              echo "<td>
                      <a href='salvar-setores.php?id=" . $row["SetorID"] . "' class='btn btn-edit'>Editar</a>
                      <a href='./action/setores.php?id=" . $row["SetorID"] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
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