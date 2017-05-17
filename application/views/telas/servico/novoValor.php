<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>

  </h1>
</section>
<section class="content">
<div class="container-fluid">
<div class="row col-md-5">


<?php echo form_open(); ?>


<?php 
  if( $mensagem ){
    echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$mensagem[0].'</div>';
  }
?>


  <div class="form-group">
    <label for="exampleInputEmail1">Serviço:</label>
    <select class="form-control" name="tipo">
      <?php foreach($servicos as $key => $value){ ?>
        <option value="<?php echo $value->id; ?>"><?php echo $value->descricao; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data de Início:</label>
    <?php echo form_input('inicioValor', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Valor:</label>
    <div class="input-group">
      <div class="input-group-addon">R$</div>
      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Valor" name="valor" required>
      <div class="input-group-addon">.00</div>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data Final:</label>
    <?php echo form_input('fimValor', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data de Cadastro:</label>
    <?php date_default_timezone_set('America/Sao_Paulo'); $date = date('d-m-Y'); ?>
    <?php echo form_input('dataCadastro', $date ,array( 'class'=>'form-control col-md-3', 'required'=>'required', 'readonly'=>'readonly' ) ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Usuário:</label>
    <?php 
      $opcoes = array(
        $infos[0]->id => $infos[0]->nome,
      );
    ?>
    <?php  echo form_dropdown('usuarioCadastro', $opcoes, '', array('class'=>'form-control', 'readonly'=>'readonly')  ); ?>
  </div>

 
  <button type="submit" class="btn btn-primary">Cadastrar</button>

<?php form_close(); ?>



    </div><!--row-->
  </div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
