<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">


<!--<form class="col-md-5" method="POST">

	<div class="form-group">
    	<label for="servico">Serviço: </label>
    	<input type="text" class="form-control" id="servico" placeholder="Serviço">
  	</div>

  	<div class="form-group">
    	<label for="servico">Contábil: </label>
    	<select class="form-control">
  			<option value="1">Não</option>
  			<option value="2">Sim</option>
		</select>
  	</div>
  
  	<div class="form-group">
    	<label for="duracao">Data de Cadastro: </label>
    	<input type="date" class="form-control" id="data" placeholder="Data">
  	</div>

	<div class="form-group">
    	<label for="servico">Usuário Cadastro: </label>
    	<input type="text" class="form-control" id="usuario" placeholder="Cadastro do Usuário" value="1">
 	</div>

 
  <button type="submit" class="btn btn-primary">Enviar</button>

</form> -->
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
      <?php  echo form_dropdown('servico', $opcoes, '', array('class'=>'form-control')  ); ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Data de Cadastro:', 'date'); ?>
    <?php date_default_timezone_set('America/Sao_Paulo'); $date = date('d-m-Y'); ?>
    <?php echo form_input('00/00/2017', $date ,array( 'class'=>'form-control col-md-3', 'required'=>'required' ) ); ?>
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
