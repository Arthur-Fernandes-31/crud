  <?php 
  // include dos arquivox
  include_once './include/logado.php';
  include_once './include/conexao.php';
  include_once './include/header.php';

  $sql = "SELECT p.ProducaoID, 
                p.ProdutoID, 
                f.Nome AS NomeFuncionario, 
                c.Nome AS NomeCliente
          FROM producao p
          JOIN funcionarios f ON p.FuncionarioID = f.FuncionarioID
          JOIN clientes c ON p.ClienteID = c.ClienteID";
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
                <th>Clientes</th>
                <th>funcionarios</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
            while($row = mysqli_fetch_assoc($result6)) {
                echo "<tr>";
                echo "<td>" . $row["ProducaoID"] . "</td>";
                echo "<td>" . $row["ProdutoID"] . "</td>";
                echo "<td>" . $row["NomeCliente"] . "</td>";
                echo "<td>" . $row["NomeFuncionario"] . "</td>";
                echo "<td>
                        <a href='salvar-producao.php?id=" . $row["ProducaoID"] . "' class='btn btn-edit'>Editar</a>
                        <a href='excluir-producao.php?id=" . $row["ProducaoID"] . "' class='btn btn-delete'>Excluir</a>
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