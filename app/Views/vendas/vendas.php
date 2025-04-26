<head>
 <link href="/css/style.css" rel="stylesheet">
 </head>
   <div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Registro de Vendas</h1>
        </div>
    </header>
    </div>

    <div class="container mt-5 text-white box">
        <form>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="cliente" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" required>
            </div>
            <div class="mb-3">
                <label for="produto" class="form-label">Produto</label>
                <select class="form-control" id="produto" required>
                    <option value="">Selecione um produto</option>
                    <option value="produto1">Produto 1</option>
                    <option value="produto2">Produto 2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" required>
            </div>
            <div class="mb-3">
                <label for="dataVenda" class="form-label">Data da Venda</label>
                <input type="date" class="form-control" id="dataVenda" required>
            </div>
            <div class="mb-3">
                <label for="formaPagamento" class="form-label">Forma de Pagamento</label>
                <select class="form-control" id="formaPagamento" required>
                    <option value="">Selecione a forma de pagamento</option>
                    <option value="dinheiro">Dinheiro</option>
                    <option value="cartao">Cartão</option>
                    <option value="pix">Pix</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.html" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Limpar</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
            </div>
        </form>
    </div>