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

    <?php 
      $id = $this->uri->segment(3);
      $usuario = $this->funcoes->do_get($id, 'users')
    ?>
      
      <?php echo form_open(); ?>

      <?php 
        if( $mensagem ){
          echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$mensagem[0].'</div>';
        }
      ?>

        <div class="form-group">
          <label for="exampleInputEmail1">ID:</label>
          <?php echo form_input('id', $usuario->id ,array( 'class'=>'form-control col-md-3', 'required'=>'required', 'readonly'=>'readonly') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Nome:</label>
          <?php echo form_input('nome', $usuario->nome ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Sobrenome:</label>
          <?php echo form_input('sobrenome', $usuario->sobrenome ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Descrição (cargo):</label>
          <?php echo form_input('descricao', $usuario->descricao ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Usuário:</label>
          <?php echo form_input('username', $usuario->username ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
        </div>

        <br><br>

        <button type="submit" class="btn btn-primary">Editar Usuário</button>

      <?php form_close(); ?>

    </div>
  </div><!--row-->
</div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
