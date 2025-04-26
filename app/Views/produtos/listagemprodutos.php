
  
 <div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Produtos</h1>
        </div>
    </header>
</div>

    <div class="container mt-4 box">
        <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar produto...">
        <button class="btn btn-primary mb-3">Adicionar Novo Produto</button>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <tr>
                    <td>Pizza Margherita</td>
                    <td>R$ 40,00</td>
                    <td>15</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <td>Hambúrguer Artesanal</td>
                    <td>R$ 25,00</td>
                    <td>20</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <td>Salada Caesar</td>
                    <td>R$ 18,00</td>
                    <td>10</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <td>Pão de Alho</td>
                    <td>R$ 12,00</td>
                    <td>30</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <td>Sorvete de Chocolate</td>
                    <td>R$ 10,00</td>
                    <td>25</td>
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

