<?php
//session
//session_start();
//header
include_once "./header.php";
?>
    <link rel="stylesheet" href="../assets/css/main.css">
  <!--Manter o formato do layout de cadastro-->
   <style>
    #pForm {
      border-radius: 20px;
    background-color: #4169E1;
    margin-left: 20%;
    margin-right: 20%;
    margin-top: 30px;
}
#inputROW {
  width: 200px;
}
   </style>
<div class="row" id="pForm">
  <form action="../model/create.php" class="container" method="POST">
    <h2>Formulário de cadastro</h2>

    <!--div de nome e sobrenome-->
    <h4 class="pt-3">Cadastre seus dados
  
    </h4>
    <center>
    <?php
  if(isset($_SESSION['msg'])){ 
    echo $_SESSION['msg'];
    session_destroy();
  }

  ?>
    </center>
    <div class="row">
        <!--Local onde a imagem vai ser inserida-->        
        <p>Sua foto</p>       
        <!--Dados(nome e sobrenome)-->
        <div class="col" id="inputROW">   
            <label>Nome</label>
          <input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="nome" require>
        </div>
        <div class="col" id="inputROW">
            <label>Sobrenome</label>
          <input type="text" class="form-control" placeholder="Sobrenome" aria-label="Sobrenome" name="sobrenome">
        </div>
      </div>
      <!---div dos generos-->
      <div class="row">
        <div class="form-check col-3  align-self-center" style="margin-left:45px; width: 100px;">
          <input class="form-check-input" type="radio" name="sexo" value="F">
          <label class="form-check-label" for="flexRadioDefault1">
            Feminino
          </label>
        </div>
        <div class="form-check col-3 align-self-center" style="margin-left: 10px;">
          <input class="form-check-input" type="radio" name="sexo" value="M">
          <label class="form-check-label" for="flexRadioDefault2">
            Masculino
          </label>
        </div>
        <div class="col-6" style="margin-left: 45px;">
          <label>Data de nascimento</label>
          <input type="date" name="data_nasc" class="form-control">
        </div>
      
    </div>
    <div class="row">
      <div class="col">
    <label>Endereço</label>
    <input type="text" class="form-control" name="endereco">
  </div>
  <div class="col">
    <label>Telefone</label>
    <input type="tel" name="telefone" id="teleF" class="form-control">
  </div>
  </div>
    <!--Botão de cadastro-->
    
      <!--div de email e senha-->
      <div class="row row-cols">
      <div class="col pt-4">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
        </div>
        <div class="col pt-4">
        <label>Senha</label>
        <input type="password" name="senha"  class="form-control">
      </div>
    </div>

    <div class="col pt-4">
      <label>E-mail de contato</label>
      <input type="email" name="emailCTT" class="form-control">
      </div>
    <div class="col pt-4">
      <label class="form-label">Descrição sobre você</label>
      <input type="text" class="form-control" name="descricao">
    </div>
    <div class="col pt-4">
      <label>Experiência</label>
      <input type="text" name="experiencia" class="form-control">
      </div>
  <div>
    <div class="col pt-4">
      <label>Formação</label>
      <input type="text" name="formacao" class="form-control">
      </div>
      <div class="row">
      <div class="form-check col-3  align-self-center" style="margin-left:45px; width: 100px;">
          <input class="form-check-input" type="radio" name="estadoEmp" value="Empregado">
          <label class="form-check-label" for="flexRadioDefault1">
           Empregado
          </label>
        </div>
        <div class="form-check col-3 align-self-center" style="margin-left: 10px;">
          <input class="form-check-input" type="radio" name="estadoEmp" value="Desempregado">
          <label class="form-check-label" for="flexRadioDefault2">
            Desempregado
          </label>
        </div>
        </div>
  <div class="col pt-4">
      <label>Nacionalidade</label>
      <input type="text" name="nacionalidade" class="form-control">
      </div>
      <button 
      class="btn btn-success"
      name="btn-cadastrar" 
      type="submit" 
      >Cadastrar</button>
  </form>
  <div class="text-muted">
    <a href="./log-curri.php">Fazer login?</a>
  </div>
</div>
