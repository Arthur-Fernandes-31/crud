<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
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
            <tr>
              <td>1</td>
              <td>Dado A</td>
              <td>1</td>
              <td>Verde</td>
              <td>
                <a href="#" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dado B</td>
              <td>1</td>
              <td>Verde</td>
              <td>
                <a href="#" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>

  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>