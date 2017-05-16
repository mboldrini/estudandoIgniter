<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>

  </h1>
</section>
<section class="content">
<div class="row">
	
<!--<form class="col-md-4">-->
<?php 
  echo form_open();
?>
<div class="col-md-4">

<?php 
  if( $mensagem ){
    echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$mensagem[0].'</div>';
  }
?>

  <div class="form-group">
    <label for="exampleInputEmail1">Nome Completo:</label>
    <?php echo form_input(
      'nome', 
      '' ,
      array( 'autofocus '=> 'autofocus',
             'class'=>'form-control col-md-3',
             'required'=>'required' ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">CPF:</label>
    <?php echo form_input(
      'cpf', 
      '' ,
      array( 'class'=>'form-control col-md-3',
          ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data de Nascimento:</label>
    <?php echo form_input(
      'dataNascimento', 
      '' ,
      array( 'class'=>'form-control col-md-3',
          ) 
            ); 
    ?>
  </div>

    <div class="form-group">
      <label for="exampleInputEmail1">E-mail:</label>
      <?php echo form_input(
        'email', 
        '' ,
        array( 'class'=>'form-control col-md-3',
            ) 
        ); 
      ?>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Telefone:</label>
      <?php echo form_input(
        'telefone', 
        '' ,
        array( 'class'=>'form-control col-md-3',
            ) 
        ); 
      ?>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Celular:</label>
      <?php echo form_input(
        'celular', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
        ); 
      ?>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Data de Cadastro:</label>
      <?php date_default_timezone_set('America/Sao_Paulo'); $date = date('d-m-Y'); ?>
      <?php echo form_input('dataCadastro', $date ,array( 'class'=>'form-control col-md-3', 'required'=>'required', 'readonly'=>'readonly' ) ); ?>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Usuário Cadastro:</label>
      <?php 
        $opcoes = array(
          $infos[0]->id => $infos[0]->nome,
        );
      ?>
      <?php  echo form_dropdown('usuarioCadastro', $opcoes, '', array('class'=>'form-control', 'readonly'=>'readonly')  ); ?>
    </div>
  

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</div><!--col-md-4-->

<?php form_close(); ?>
<!--</form>-->


</div><!-- row da porra toda -->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
