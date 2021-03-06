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
      
      <?php echo form_open(); ?>

      <?php 
        if( $mensagem ){
          echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$mensagem[0].'</div>';
        }
      ?>


        <div class="form-group">
          <label for="exampleInputEmail1">Nome:</label>
          <?php echo form_input('nome', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Sobrenome:</label>
          <?php echo form_input('sobrenome', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Descrição (cargo):</label>
          <?php echo form_input('descricao', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Usuário:</label>
          <?php echo form_input('user', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Senha:</label>
          <?php echo form_input('password', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

    <!--    <div class="form-group">
          <label for="exampleInputEmail1">Confirmação de Senha:</label>
          <?php echo form_input('passwordconfirm', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div> -->
        
        <br><br>

        <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>

      <?php form_close(); ?>

    </div>
  </div><!--row-->
</div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
