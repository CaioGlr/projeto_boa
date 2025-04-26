  
 <head>
 <link href="/css/style.css" rel="stylesheet">
 </head>
 <div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Cadastro de Produtos</h1>
        </div>
    </header>
</div>
    <div class="container mt-5 text-white box">
        <form>
            <div class="mb-3">
                <label for="nomeProduto" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nomeProduto" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade em Estoque</label>
                <input type="number" class="form-control" id="quantidade" disabled>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.html" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                <button type="reset" class="btn btn-warning">Limpar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
