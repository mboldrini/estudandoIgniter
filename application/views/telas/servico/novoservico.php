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

<?php 

  $id = $this->uri->segment(3);
  $tabela = 'clientes';

  $cliente = $this->funcoes->do_get($id, $tabela);

  $tipoServico = $this->funcoes->do_getAll('tiposervico');

?>

<h1>id do link =><?php echo $id; ?></h1>
<h3>id do cliente => <?php echo $cliente->id; ?></h3>


<div class="col-md-5">
  <?php echo form_open(); ?>

  <div class="form-group">
    <label for="exampleInputEmail1">Usuário Cadastro:</label>
    <?php 
      $opcoes = array(
        $cliente->id => $cliente->nome,
      );
    ?>
    <?php  echo form_dropdown('codigoCliente', $opcoes, '', array('class'=>'form-control', 'readonly'=>'readonly')  ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data do Serviço:</label>
    <?php echo form_input('dataServico', '' ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Hora do Serviço:</label>
    <?php echo form_input(
        'horaServico', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Tipo de Serviço:</label>
    <select name="tipoServico" class="form-control"> 
      <?php foreach($tipoServico as $key => $value){ ?>
        <option value="<?php echo $value->id; ?>"><?php echo $value->descricao; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Solicitação:</label>
    <?php echo form_textarea(
        'soliticado', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Detectado:</label>
    <?php echo form_textarea(
        'detectado', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Solução:</label>
    <?php echo form_textarea(
        'solucao', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Previsão de Conclusão:</label>
    <?php echo form_input(
        'pervisaoConclusao', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data da Conclusão:</label>
    <?php echo form_input(
        'dataConclusao', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Status do Serviço:</label>
    <?php echo form_input(
        'status', 
        '' ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nome do Técnico:</label>
    <?php echo form_input(
        'nomeTecnico', 
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




<?php form_close(); ?>
    </div><!--col-md-5-->
  </div><!--row-->
</div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
