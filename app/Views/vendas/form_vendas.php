<?php
if (isset($_SESSION['dados'])) {
    $dados = $_SESSION['dados'];
    unset($_SESSION['dados']);
}

if (isset($dados['id_venda'])) {
    $rota = "/vendas/" . $dados['id_venda'] . "/atualizar";
} else {
    $rota = "/vendas/salvar";
}
?>

<!-- Mensagens de Erro -->
<?php if(isset($_SESSION['erros'])): ?>
    <div class="alert alert-danger row py-5" role="alert">
        <h4 class="alert-heading">Erro no registro!</h4>
        <ul>
            <?php foreach($_SESSION['erros'] as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['erros']); ?>
<?php endif; ?>

<!-- Conteúdo Principal -->
<div class="content-titulo">
    <header class="text-center">
        <h1 class="display-3 fw-bold">Registro de Venda</h1>
    </header>
</div>

<!-- Formulário de Venda -->
<form action="<?= $rota ?>" method="POST">
    <div class="container mt-2 box">
        <div class="section-header bg-white text-dark p-2 mb-3 fw-bold border-bottom">
            DADOS DA VENDA
        </div>

        <div class="row d-flex justify-content-evenly">
            <!-- Cliente -->
            <div class="col-md-5 mb-3">
                <label for="id_usuario" class="form-label">Cliente</label>
                <select class="form-select" id="id_usuario" name="id_usuario" required>
                    <option value="">Selecione o cliente</option>
                    <option value="1" <?= isset($dados['id_usuario']) && $dados['id_usuario'] == 1 ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= isset($dados['id_usuario']) && $dados['id_usuario'] == 2 ? 'selected' : '' ?>>2</option>
                    <option value="3" <?= isset($dados['id_usuario']) && $dados['id_usuario'] == 3 ? 'selected' : '' ?>>3</option>
                    <option value="4" <?= isset($dados['id_usuario']) && $dados['id_usuario'] == 4 ? 'selected' : '' ?>>4</option>
                </select>
            </div>

            <!-- Produto -->
            <div class="col-md-5 mb-3">
                <label for="id_produto" class="form-label">Produto</label>
                <select class="form-select" id="id_produto" name="id_produto" required>
                    <option value="">Selecione o produto</option>
                    <option value="1" <?= isset($dados['id_produto']) && $dados['id_produto'] == 1 ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= isset($dados['id_produto']) && $dados['id_produto'] == 2 ? 'selected' : '' ?>>2</option>
                    <option value="3" <?= isset($dados['id_produto']) && $dados['id_produto'] == 3 ? 'selected' : '' ?>>3</option>
                    <option value="4" <?= isset($dados['id_produto']) && $dados['id_produto'] == 4 ? 'selected' : '' ?>>4</option>
                </select>
            </div>
        </div>

        <div class="row d-flex justify-content-evenly">
            <!-- Quantidade -->
            <div class="col-md-5 mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" 
                    value="<?= isset($dados['quantidade']) ? $dados['quantidade'] : 1 ?>" 
                    min="1" required>
            </div>

            <!-- Forma de Pagamento -->
            <div class="col-md-5 mb-3">
                <label for="forma_pagamento_id" class="form-label">Forma de Pagamento</label>
                <select class="form-select" id="forma_pagamento" name="forma_pagamento_id" required>
                    <option value="1" <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == 1 ? 'selected' : '' ?>>Dinheiro</option>
                    <option value="2" <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == 2 ? 'selected' : '' ?>>Cartão de Crédito</option>
                    <option value="3" <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == 3 ? 'selected' : '' ?>>Cartão de Débito</option>
                    <option value="4" <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == 4 ? 'selected' : '' ?>>PIX</option>
                </select>
            </div>
        </div>

        <!-- Data da Venda -->
        <div class="row d-flex justify-content-evenly">
            <div class="col-md-5 mb-3">
                <label for="data_venda" class="form-label">Data da Venda</label>
                <input type="date" class="form-control" value="<?= isset($dados['data_venda']) ? $dados['data_pagamento'] : null ?>"
                 id="data_venda" name="data_venda" required>
            </div>
        </div>

        <!-- Botão de Submeter -->
        <div class="d-flex justify-content-center mt-3">       
            <button type="submit" class="btn btn-primary">
                <?= isset($dados['id_venda']) ? 'Atualizar Venda' : 'Registrar Venda' ?>
            </button>
        </div>
    </div>
</form>