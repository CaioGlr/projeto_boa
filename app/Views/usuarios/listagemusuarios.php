<pre>
    <?php print_r($usuarios)?>
</pre>    
<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Usuários</h1>
        </div>
<div class="container mt-4 box">
    <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar usuário...">
    <button class="btn btn-primary mb-3">Adicionar Novo Usuário</button>


    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <tr>
                <td>João Silva</td>
                <td>joao.silva@email.com</td>
                <td>(11) 91234-5678</td>
                <td>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </td>
            </tr>
            <tr>
                <td>Maria Souza</td>
                <td>maria.souza@email.com</td>
                <td>(21) 98765-4321</td>
                <td>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </td>
            </tr>
            <tr>
                <td>Carlos Pereira</td>
                <td>carlos.pereira@email.com</td>
                <td>(31) 99876-5432</td>
                <td>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </td>
            </tr>
            <tr>
                <td>Fernanda Lima</td>
                <td>fernanda.lima@email.com</td>
                <td>(41) 98765-1234</td>
                <td>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </td>
            </tr>
            <tr>
                <td>Bruno Almeida</td>
                <td>bruno.almeida@email.com</td>
                <td>(51) 91234-9876</td>
                <td>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="d-flex justify-content-between">
        <a href="index.html" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </div>
    </div>
    </header>
</div>
