<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';



$sql = "SELECT * FROM produtos";
$result5 = mysqli_query($conn, $sql);
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_assoc($result5)) {
              echo "<tr>";
              echo "<td>" . $row["ProdutoID"] . "</td>";
              echo "<td>" . $row["Nome"] . "</td>";
              echo "<td>" . $row["CategoriaID"] . "</td>";
              echo "<td>" . $row["Preco"] . "</td>";
              echo "<td>
                      <a href='salvar-produtos.php?id=" . $row["CategoriaID"] . "' class='btn btn-edit'>Editar</a>
                      <a href='excluir-produtos.php?id=" . $row["CategoriaID"] . "' class='btn btn-delete'>Excluir</a>
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