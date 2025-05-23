<?php
if($_SESSION['dados']){
    $dados = $_SESSION['dados'];
}

 if(isset($_SESSION['erros'])):
    $erros = $_SESSION['erros'];
?>  
<div class="alert alert-danger row py-5" role="alert">
  <h4 class="alert-heading">Erro ao cadastrar!</h4>
  <p>Verifique os itens abaixo em seu formulário antes de tentar novamente!</p>
  <ul>
    <?php foreach($erros as $e):?>
    <li><?=$e ?></li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>


    <!-- Conteúdo Principal -->
 <div class="content-titulo" >
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Cadastro</h1>
        </div>
    </header>
 </div> 
<!-- Formulário -->
<form action="/usuarios/salvar" method="POST">    

<div class="container mt-4 box">
    <div class="row d-flex justify-content-evenly">
        <!-- Nome Completo -->
        <div class="col-md-5 mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" value="<?= isset($dados['nome']) ? $dados['nome'] : null ?>"
             id="nome" name="nome" placeholder="Digite seu nome completo" required>
        </div>

        <!-- CPF -->
        <div class="col-md-5 mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" value="<?= isset($dados['cpf']) ? $dados['cpf'] : null ?>"
            id="cpf" name="cpf" placeholder="Digite seu CPF" required>
        </div>
    </div>

    <div class="row d-flex justify-content-evenly">
        <!-- Data de Nascimento -->
        <div class="col-md-5 mb-3">
            <label for="data-nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" value="<?= isset($dados['data_nascimento']) ? $dados['data_nascimento'] : null ?>"
             id="data-nascimento" name="data_nascimento" required>
        </div>

        <!-- Celular -->
        <div class="col-md-5 mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="tel" class="form-control" value="<?= isset($dados['celular']) ? $dados['celular'] : null ?>"
             id="celular" name="celular" placeholder="Digite seu celular" required>
        </div>
    </div>
</div>
<div class="container mt-4 box">
    <div class="row d-flex justify-content-evenly">
        <!-- Rua -->
        <div class="col-md-5 mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" class="form-control" value="<?= isset($dados['rua']) ? $dados['rua'] : null ?>"
             id="rua" name="rua" placeholder="Digite sua rua" required>
        </div>
        
        <!-- Bairro -->
        <div class="col-md-5 mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" value="<?= isset($dados['bairro']) ? $dados['bairro'] : null ?>"
             id="bairro" name="bairro" placeholder="Digite seu bairro" required>
        </div>
    </div>
    <div class="row d-flex justify-content-evenly">
    <!-- Número -->
        <div class="col-md-5 mb-3">
            <label for="complemento" class="form-label">Número</label>
            <input type="text" class="form-control" value="<?= isset($dados['numero']) ? $dados['numero'] : null ?>"
             id="numero" name="numero" placeholder="Digite seu numero" required>
        </div>

        
            <div class="col-md-5 mb-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" value="<?= isset($dados['complemento']) ? $dados['complemento'] : null ?>"
             id="complemento" name="complemento" placeholder="Digite seu complemento" required>
        </div>
    </div>


    <div class="row d-flex justify-content-evenly">
        <!-- Cidade -->
        <div class="col-md-5 mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" value="<?= isset($dados['cidade']) ? $dados['cidade'] : null ?>"
             id="cidade" name="cidade" placeholder="Digite sua cidade" required>
        </div>

        <!-- Estado -->
        <div class="col-md-5 mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
    <option <?= isset($dados['estado']) && $dados['estado'] == "AC" ? "selected" : "" ?> value="AC">Acre</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "AL" ? "selected" : "" ?> value="AL">Alagoas</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "AP" ? "selected" : "" ?> value="AP">Amapá</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "AM" ? "selected" : "" ?> value="AM">Amazonas</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "BA" ? "selected" : "" ?> value="BA">Bahia</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "CE" ? "selected" : "" ?> value="CE">Ceará</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "DF" ? "selected" : "" ?> value="DF">Distrito Federal</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "ES" ? "selected" : "" ?> value="ES">Espírito Santo</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "GO" ? "selected" : "" ?> value="GO">Goiás</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "MA" ? "selected" : "" ?> value="MA">Maranhão</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "MT" ? "selected" : "" ?> value="MT">Mato Grosso</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "MS" ? "selected" : "" ?> value="MS">Mato Grosso do Sul</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "MG" ? "selected" : "" ?> value="MG">Minas Gerais</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "PA" ? "selected" : "" ?> value="PA">Pará</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "PB" ? "selected" : "" ?> value="PB">Paraíba</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "PR" ? "selected" : "" ?> value="PR">Paraná</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "PE" ? "selected" : "" ?> value="PE">Pernambuco</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "PI" ? "selected" : "" ?> value="PI">Piauí</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "RJ" ? "selected" : "" ?> value="RJ">Rio de Janeiro</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "RN" ? "selected" : "" ?> value="RN">Rio Grande do Norte</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "RS" ? "selected" : "" ?> value="RS">Rio Grande do Sul</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "RO" ? "selected" : "" ?> value="RO">Rondônia</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "RR" ? "selected" : "" ?> value="RR">Roraima</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "SC" ? "selected" : "" ?> value="SC">Santa Catarina</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "SP" ? "selected" : "" ?> value="SP">São Paulo</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "SE" ? "selected" : "" ?> value="SE">Sergipe</option>
    <option <?= isset($dados['estado']) && $dados['estado'] == "TO" ? "selected" : "" ?> value="TO">Tocantins</option>
            </select>   
        </div>
    </div>
</div>
<div class="container mt-4 box">
    <div class="row d-flex justify-content-evenly">
        <!-- CEP -->
        <div class="col-md-5 mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" value="<?= isset($dados['cep']) ? $dados['cep'] : null ?>"
             id="cep" name="cep" placeholder="Digite seu CEP" required>
        </div>
    
        <!-- E-mail -->
        <div class="col-md-5 mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" value="<?= isset($dados['email']) ? $dados['email'] : null ?>"
            id="email" name="email" placeholder="Digite seu e-mail" required>
        </div>
    </div>

    <div class="row d-flex justify-content-evenly">
        <!-- Senha -->
        <div class="col-md-5 mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>

        <!-- Confirmar Senha -->
        <div class="col-md-5 mb-3">
            <label for="confirmar-senha" class="form-label">Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmar-senha" name="confirmar_senha" placeholder="Confirme sua senha" required>
        </div>
    </div>

    <div class="row d-flex justify-content-evenly">
        <!-- Tipo de Usuário -->
        <div class="col-md-5 mb-3">
            <label for="tipo-usuario" class="form-label">Tipo de Usuário</label>
            <select class="form-select" id="tipo-usuario" required name="tipo">
<option <?= isset($dados['tipo']) && $dados['tipo'] == "Cliente" ? "selected" : "" ?> value="Cliente">Cliente</option>
<option <?= isset($dados['tipo']) && $dados['tipo'] == "Administrador" ? "selected" : "" ?> value="Administrador">Administrador</option>
<option <?= isset($dados['tipo']) && $dados['tipo'] == "Funcionario" ? "selected" : "" ?> value="Funcionario">Funcionário</option>
            </select>
        </div>
    </div>
        <!-- Botões -->

    <div class="d-flex justify-content-center">       
        <!-- Botão de Submeter -->
        <button type="submit" class="btn btn-primary">Cadastrar o Usuário</button>
    </div>
</div>
</form>