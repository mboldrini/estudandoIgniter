<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      
      <form>

        <div class="form-group">
          <label for="exampleInputEmail1">Nome:</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Sobrenome:</label>
          <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Descrição (cargo):</label>
          <input type="text" class="form-control" id="descricao" placeholder="Descrição">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Usuário:</label>
          <input type="text" class="form-control" id="username" placeholder="Usuário">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Senha:</label>
          <input type="text" class="form-control" id="password" placeholder="Senha">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Confirmação de Senha:</label>
          <input type="text" class="form-control" id="passwordconfirm" placeholder="Usuário">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>

      </form>

    </div>
  </div><!--row-->
</div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
