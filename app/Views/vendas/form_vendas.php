<?php
if(isset($_SESSION['dados'])) {
    $dados = $_SESSION['dados'];
    unset($_SESSION['dados']);
}

if(isset($dados['id_venda'])) {
    $rota = "/vendas/" . $dados['id_venda'] . "/atualizar";
} else {
    $rota = "/vendas/salvar";
}

// Exibe erros APENAS UMA VEZ, no topo
if(isset($_SESSION['erros'])): 
    $erros = $_SESSION['erros'];
    unset($_SESSION['erros']); // LIMPA OS ERROS IMEDIATAMENTE
?>
    <div class="alert alert-danger row py-5" role="alert">
        <h4 class="alert-heading">Erro no registro!</h4>
        <p>Verifique os itens abaixo antes de tentar novamente:</p>
        <ul>
            <?php foreach($erros as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
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
            <!-- Usuário -->
            <div class="col-md-5 mb-3">
                <label for="usuario_id" class="form-label">Usuário</label>
                <select class="form-select" id="usuario_id" name="usuario_id" required>
                    <option value="">Selecione o usuário</option>
                    <?php foreach ($usuarios as $usuario): ?>

                        <option value="<?= $usuario['id_usuario'] ?>"
                            <?= isset($dados['usuario_id']) && $dados['usuario_id'] == $usuario['id_usuario'] ? 'selected' : '' ?>>
                            <!-- Exibe o nome do usuário -->
                            <?= $usuario['nome'] ?>
                        </option>
                        
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Produto -->
            <div class="col-md-5 mb-3">
                <label for="produto_id" class="form-label">Produto</label>
                <select class="form-select" id="produto_id" name="produto_id" required>
                    <option value="">Selecione o produto</option>
                    <?php foreach ($produtos as $produto): ?>
                        <?= isset($dados['produto_id']) ?>
                        <!-- Exibe o ID do produto, nome e preço formatado -->
                         
                        <option value="<?= $produto['id_produto'] ?>"
                            <?= isset($dados['produto_id']) && $dados['produto_id'] == $produto['id_produto'] ? 'selected' : null ?>    
                            <?= $produto['nome'] ?>> - (R$ <?= $produto['preco'] ?>)
                        </option>

                    <?php endforeach; ?>
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
                <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                <select class="form-select" id="forma_pagamento" name="forma_pagamento" required>
                    <option value="">Selecione a forma de pagamento</option>
                    <?php $formas_pagamento = ['Dinheiro', 'Crédito', 'Débito', 'Pix', 'Transferência']; ?>
                    <?php foreach ($formas_pagamento as $forma): ?>
                        <option value="<?= $forma ?>"
                            <?= isset($dados['forma_pagamento']) && $dados['forma_pagamento'] === $forma ? 'selected' : '' ?>>
                            <?= $forma ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Data da Venda -->
        <div class="row d-flex justify-content-evenly">
            <div class="col-md-5 mb-3">
                <label for="data_venda" class="form-label">Data da Venda</label>
                <input type="date" class="form-control" id="data_venda" name="data_venda"
                    value="<?= isset($dados['data_venda']) ? $dados['data_venda'] : date('Y-m-d') ?>" required>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>                
        <!-- Botão de Submeter -->
        <div class="d-flex justify-content-center">       
            <button type="submit" class="btn btn-primary">
                <?= isset($dados['id_venda']) ? 'Atualizar Venda' : 'Registrar Venda' ?>
            </button>
        </div>
    </div>
</form>
