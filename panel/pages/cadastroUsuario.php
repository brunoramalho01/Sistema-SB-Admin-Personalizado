<!-- Botão para abrir a modal de cadastro -->
<?php
include_once ('./verificar-permissao.php');
?>
   

<div class="margin-top:10px;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">
        <i class="bi bi-person-add"></i> Cadastrar Pessoas
    </button>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalhes do Usuário</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="user-details">
            <!-- Os detalhes do usuário serão exibidos aqui -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  

<!-- Modal de cadastro -->
<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Pessoa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro -->
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome">
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" placeholder="CPF">
                    </div>
                    <div class="mb-3">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" id="rg" placeholder="RG">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" placeholder="Telefone">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <textarea class="form-control" id="endereco" placeholder="Endereço"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="selfie" class="form-label">Foto de Selfie</label>
                        <input type="file" class="form-control" id="selfie">
                    </div>
                    <div class="mb-3">
                        <label for="documento" class="form-label">Foto do Documento</label>
                        <input type="file" class="form-control" id="documento">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Usuários</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Cadastros Usuários
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>TELEFONE</th>
                            <th>SELFIE</th>
                            <th>DOCUMENTO</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>
                                <img src="./assets/img-user/avatar.png" alt="Selfie" style="width:50%; margin-left: 25%;">
                            </td>
                            <td>
                                <img src="./assets/img-user/rg.png" alt="Doc" style="width:50%; margin-left: 25%;" data-toggle="modal" data-target="#myModal" data-user-id="1"></td>
                            <td>
                                <a href=""><i class="bi bi-eye-fill fa-2x text-success"></i></a>
                                | 
                                <a href=""><i class="bi bi-pencil-square fa-2x text-danger"></i></a> 
                                | 
                                <a href=""><i class="bi bi-trash fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            <td>Editar | Excluir</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            <td>Editar | Excluir</td>
                        </tr>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 
      
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../vendor/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
 <script src="../vendor/assets/demo/chart-area-demo.js"></script>
<script src="../vendor/assets/demo/chart-bar-demo.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="../../vendor/js/datatables-simple-demo.js"></script> -->
