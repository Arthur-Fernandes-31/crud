<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';



$sql = "
  SELECT 
    p.ProdutoID,
    p.Nome AS NomeProduto,
    c.Nome AS NomeCategoria,
    p.Preco
  FROM produtos p
  JOIN categorias c ON p.CategoriaID = c.CategoriaID
";
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
              echo "<td>" . $row["NomeProduto"] . "</td>";
              echo "<td>" . $row["NomeCategoria"] . "</td>";
              echo "<td>" . $row["Preco"] . "</td>";
              echo "<td>
                      <a href='salvar-produtos.php?id=" . $row["ProdutoID"] . "' class='btn btn-edit'>Editar</a>
                      <a href='./action/produtos.php?id=" . $row["ProdutoID"] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
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