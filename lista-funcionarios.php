<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
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
          <tr>
            <td>1</td>
            <td>Funcionário A</td>
            <td>Cargo A</td>
            <td>Setor A</td>
            <td>
              <a href="#" class="btn btn-edit">Editar</a>
              <a href="#" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Funcionário B</td>
            <td>Cargo B</td>
            <td>Setor B</td>
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