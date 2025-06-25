<?php
if (isset($_SESSION['dados'])) {
    $dados = $_SESSION['dados'];
    unset($_SESSION['dados']);
}

if (isset($dados['id_produto'])) {
    $rota = "/produtos/" . $dados['id_produto'] . "/atualizar";
} else {
    $rota = "/produtos/salvar";
}

// Exibe erros APENAS UMA VEZ, no topo
if (isset($_SESSION['erros'])):
    $erros = $_SESSION['erros'];
    unset($_SESSION['erros']); // LIMPA OS ERROS IMEDIATAMENTE
?>
    <div class="alert alert-danger row py-5" role="alert">
        <h4 class="alert-heading">Erro no formulário!</h4>
        <p>Verifique os itens abaixo antes de tentar novamente:</p>
        <ul>
            <?php foreach ($erros as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<!-- Conteúdo Principal -->
<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Cadastro do Produto</h1>
        </div>
    </header>
</div>

<!-- Formulário -->
<form action="<?= $rota ?>" method="POST">
    <div class="container mt-2 box">
        <div class="section-header bg-white text-dark p-2 mb-3 fw-bold border-bottom">
            PREENCHA OS DADOS DO PRODUTO
        </div>

        <div class="row d-flex justify-content-evenly">
            <!-- Nome do Produto -->
            <div class="col-md-5 mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome"
                    value="<?= isset($dados['nome']) ? $dados['nome'] : '' ?>"
                    placeholder="Digite o nome do produto" required>
            </div>

            <!-- Preço do Produto -->
            <div class="col-md-5 mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                    value="<?= isset($dados['preco']) ? $dados['preco'] : '' ?>"
                    placeholder="Digite o preço do produto" required>
            </div>
        </div>

        <div class="row d-flex justify-content-evenly">
            <!-- Tipo de Produto -->
            <div class="col-md-5 mb-3">
                <label for="tipo" class="form-label">Tipo de Produto</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option <?= isset($dados['tipo']) && $dados['tipo'] == "Café da Manhã" ? "selected" : "" ?> value="Café da Manhã">Café da Manhã</option>
                    <option <?= isset($dados['tipo']) && $dados['tipo'] == "Almoço" ? "selected" : "" ?> value="Almoço">Almoço</option>
                    <option <?= isset($dados['tipo']) && $dados['tipo'] == "Janta" ? "selected" : "" ?> value="Janta">Janta</option>
                    <option <?= isset($dados['tipo']) && $dados['tipo'] == "Bebida" ? "selected" : "" ?> value="Bebida">Bebida</option>
                    <option <?= isset($dados['tipo']) && $dados['tipo'] == "Sobremesa" ? "selected" : "" ?> value="Sobremesa">Sobremesa</option>
                    <option <?= isset($dados['tipo']) && $dados['tipo'] == "Salgados" ? "selected" : "" ?> value="Salgados">Salgados</option>
                </select>
            </div>

            <!-- Estoque -->
            <div class="col-md-5 mb-3">
                <label for="estoque" class="form-label">Quantidade em Estoque</label>
                <input type="number" class="form-control" id="estoque" name="estoque"
                    value="<?= isset($dados['estoque']) ? $dados['estoque'] : '' ?>"
                    placeholder="Digite a quantidade em estoque" required>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
        <!-- Botão de Submeter -->
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">Cadastrar o Produto</button>
        </div>
    </div>
</form>