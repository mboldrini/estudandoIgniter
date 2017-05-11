<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">

<div class="col-md-4">
  <?php 

    echo form_open();



  ?>


  <div class="form-group">
    <?php echo form_label('Serviço:', 'servico'); ?>
    <?php echo form_input(
      'servico', 
      '' ,
      array( 'autofocus '=> 'autofocus',
             'class'=>'form-control col-md-3',
             'required'=>'required' ) 
            ); 
    ?>
  </div>

  <div class="form-group">
      <?php echo form_label('Contabil:', 'contabil'); ?>
      <?php 
        $opcoes = array(
          '1'         => 'Não',
          '2'           => 'Sim',
        );
      ?>
      <?php  echo form_dropdown('contabil', $opcoes, '', array('class'=>'form-control')  ); ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Data de Cadastro:', 'date'); ?>
    <?php date_default_timezone_set('America/Sao_Paulo'); $date = date('d-m-Y'); ?>
    <?php echo form_input('data', $date ,array( 'class'=>'form-control col-md-3', 'required'=>'required' ) ); ?>
  </div>

  <div class="form-group">
      <?php echo form_label('ID do Usuário:', 'usuario'); ?>
      <?php 
        $opcoes = array(
          $infos[0]->id => $infos[0]->nome,
        );
      ?>
      <?php  echo form_dropdown('usuario', $opcoes, '', array('class'=>'form-control')  ); ?>
  </div>
  

  <div class="form-group">
    <?php echo form_submit('envia', 'Cadastrar', array('class'=>'btn btn-primary')); ?>
  </div>

<?php form_close(); ?>

</div>
  

</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
