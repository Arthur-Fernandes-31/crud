<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
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
          <tr>
            <td>1</td>
            <td>Produto A</td>
            <td>Categoria A</td>
            <td>R$ 10,00</td>
            <td>
              <a href="#" class="btn btn-edit">Editar</a>
              <a href="#" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Produto B</td>
            <td>Categoria B</td>
            <td>R$ 20,00</td>
            <td>
              <a href="#" class="btn btn-edit">Editar</a>
              <a href="#" class="btn btn-delete">Excluir</a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>