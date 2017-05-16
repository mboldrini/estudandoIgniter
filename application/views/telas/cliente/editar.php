<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">
<div class="row">
  
  
<?php 
  echo form_open();
?>

<?php 
  $id = $this->uri->segment(3);
  $cliente = $this->funcoes->pegaFichaCliente($id)->row();
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
    <label for="exampleInputEmail1">Código do Cliente:</label>
    <?php echo form_input(
      'id', 
      $cliente->id ,
      array( 'autofocus '=> 'autofocus',
             'class'=>'form-control col-md-3',
             'required'=>'required',
             'readonly'=>'readonly' ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nome Completo:</label>
    <?php echo form_input(
      'nome', 
      $cliente->nome ,
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
      $cliente->cpf ,
      array( 'class'=>'form-control col-md-3',
          ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data de Nascimento:</label>
    <?php echo form_input(
      'dataNascimento', 
      $cliente->dataNascimento ,
      array( 'class'=>'form-control col-md-3',
          ) 
            ); 
    ?>
  </div>

    <div class="form-group">
      <label for="exampleInputEmail1">E-mail:</label>
      <?php echo form_input(
        'email', 
        $cliente->email ,
        array( 'class'=>'form-control col-md-3',
            ) 
        ); 
      ?>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Telefone:</label>
      <?php echo form_input(
        'telefone', 
        $cliente->telefone ,
        array( 'class'=>'form-control col-md-3',
            ) 
        ); 
      ?>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Celular:</label>
      <?php echo form_input(
        'celular', 
        $cliente->celular ,
        array( 'class'=>'form-control col-md-3',
          ) 
        ); 
      ?>
    </div>

    
    <br><br>
  
  <button type="submit" class="btn btn-primary">Editar</button>
</div><!--col-md-4-->

<?php form_close(); ?>
<!--</form>-->  
  

</div><!--row-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
