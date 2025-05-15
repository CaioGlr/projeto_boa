<?php 
 if(isset($_SESSION['erros'])){
    echo "<pre>";
    print_r($_SESSION['erros']);
    echo "</pre>";
 }
?>
    <!-- Conteúdo Principal -->
 <div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Cadastro</h1>
        </div>
    </header>
<form action="/usuarios/salvar" method="POST">    
</div>
 <div class="row d-flex justify-content-evenly">
    <!-- Nome Completo -->
    <div class="col-md-5 mb-3">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
    </div>

    <!-- CPF -->
    <div class="col-md-5 mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Data de Nascimento -->
    <div class="col-md-5 mb-3">
        <label for="data-nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="data-nascimento" name="data_nascimento" required>
    </div>

    <!-- Celular -->
    <div class="col-md-5 mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="tel" class="form-control" id="celular" name="celular" placeholder="Digite seu celular" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Rua -->
    <div class="col-md-5 mb-3">
        <label for="rua" class="form-label">Rua</label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite sua rua" required>
    </div>
    
    <!-- Bairro -->
    <div class="col-md-5 mb-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite seu bairro" required>
    </div>
</div>
<div class="row d-flex justify-content-evenly">
 <!-- Número -->
    <div class="col-md-5 mb-3">
        <label for="complemento" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite seu numero" required>
    </div>

    
        <div class="col-md-5 mb-3">
        <label for="complemento" class="form-label">Complemento</label>
        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite seu complemento" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Cidade -->
    <div class="col-md-5 mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite sua cidade" required>
    </div>

    <!-- Estado -->
    <div class="col-md-5 mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado" required>
            <option value="">Selecione o Estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- CEP -->
    <div class="col-md-5 mb-3">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" required>
    </div>

    <!-- E-mail -->
    <div class="col-md-5 mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
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
        <select class="form-select" id="tipo-usuario" name="tipo-usuario" required>
            <option value="Cliente">Cliente</option>
            <option value="Administrador">Administrador</option>
            <option value="Funcionario">Funcionário</option>
        </select>
    </div>
    <div class="cold-md-4 gap-2 mt-2 text-center ">
        <button type="submit" class="btn btn-danger">Submeter</button>
    </div>

</div>
</div>
</form>
