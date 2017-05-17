<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">
<div class="row">
<div class="col-md-4">


<?php 
  $id = $this->uri->segment(3);
  $valorServico = $this->funcoes->do_get($id, 'valorservico');
?>

<?php echo form_open(); ?>

<!--<?php 
  if( $mensagem ){
    echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$mensagem[0].'</div>';
  }
?>-->

  <div class="form-group">
    <label for="exampleInputEmail1">Serviço:</label>
    <select class="form-control" name="tipo">
      <?php foreach( $servicos as $servico): ?>
        <?php
          if( $servico->id == $valorServico->tipo ){
            print( "<option value=".$valorServico->tipo." selected>".$servico->descricao."</option>") ;
          }else{
            print( "<option value=".$servico->id.">".$servico->descricao."</option>") ;
          }
        ?>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data de Início:</label>
    <?php echo form_input('inicioValor', $valorServico->inicioValor ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Valor:</label>
    <div class="input-group">
      <div class="input-group-addon">R$</div>
      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Valor" name="valor" required value="<?php echo $valorServico->valor; ?>">
      <div class="input-group-addon">.00</div>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data Final:</label>
    <?php echo form_input('fimValor', $valorServico->fimValor ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data de Cadastro:</label>
    <?php echo form_input('dataCadastro', $valorServico->dataCadastro ,array( 'class'=>'form-control col-md-3', 'required'=>'required', 'readonly'=>'readonly' ) ); ?>
  </div>

  <br><br>
 
  <button type="submit" class="btn btn-primary">Editar</button>

<?php form_close(); ?>

  


</div>
</div>
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
