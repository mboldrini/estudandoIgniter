<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">

<div class="col-md-4">
  <?php echo form_open(); ?>

<?php 
  $id = $this->uri->segment(3);
  $servico = $this->funcoes->pegaTipoServico($id)->row();
?>


<?php 
  if( $mensagem ){
    echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$mensagem[0].'</div>';
  }
?>

  <div class="form-group">
    <?php echo form_label('ID:', 'id'); ?>
    <?php echo form_input(
      'id', 
      $servico->id ,
      array( 'autofocus '=> 'autofocus',
             'class'=>'form-control col-md-3',
             'required'=>'required',
             'readonly'=>'readonly', ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Serviço:', 'servico'); ?>
    <?php echo form_input(
      'servico', 
      $servico->descricao ,
      array( 'autofocus '=> 'autofocus',
             'class'=>'form-control col-md-3',
             'required'=>'required' ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Contabil:', 'contabil'); ?>
    <select class="form-control" id="contabil" name="contabil">
      <?php if( $servico->contabil == 1){ ?>
        <option value="1" selected>Não</option>
        <option value="2">Sim</option>
      <?php }else{ ?>
        <option value="1" >Não</option>
        <option value="2" selected>Sim</option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <?php echo form_label('Duração:', 'duracao'); ?>
    <?php echo form_input('duracao',  $servico->duracao,
      array( 'class'=>'form-control col-md-3',
             'required'=>'required' ) 
            ); 
    ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Data de Cadastro:', 'date'); ?>
    <?php echo form_input('data', $servico->dataCadastro ,array( 'class'=>'form-control col-md-3', 'required'=>'required' ) ); ?>
  </div>

  <div class="form-group">
      <?php echo form_label('ID do Usuário:', 'usuario'); ?>
      <?php 
        $opcoes = array(
          $infos[0]->id => $infos[0]->nome,
        );
      ?>
      <?php  echo form_dropdown('usuario', $opcoes, '', array('class'=>'form-control', 'readonly'=>'readonly')  ); ?>
  </div>
  

  <div class="form-group">
    <?php echo form_submit('envia', 'Cadastrar', array('class'=>'btn btn-primary')); ?>
  </div>

<?php form_close(); ?>

</div>


<br><br>


  

</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
