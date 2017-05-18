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

  $servico = $this->funcoes->do_get($id, 'servicos');

  $idCli = $servico->codigoCliente;

  $cliente = $this->funcoes->do_get( $idCli, 'clientes');

?>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $cliente->nome; ?></h3>
      </div>
      <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?= base_url(); ?>assets/dist/img/user.png" class="img-circle img-responsive"> </div>
              
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Nome:</td>
                    <td><?php echo $cliente->nome; ?></td>
                  </tr>
                  <tr>
                    <td>Telefone:</td>
                    <td><?php echo $cliente->telefone; ?></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><?php echo $cliente->cpf; ?></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><?php echo $cliente->email; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>            
    </div>
</div>





<div class="col-md-5">
  <?php echo form_open(); ?>

<?php 
  if( $mensagem ){
    echo '<div class="alert '.$mensagem[1].' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$mensagem[0].'</div>';
  }
?>

  <div class="form-group">
    <label for="exampleInputEmail1">ID do Serviço:</label>
    <?php echo form_input('codigoServico', $servico->id ,array( 'class'=>'form-control col-md-3', 'required'=>'required', 'readonly'=>'readonly') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data do Serviço:</label>
    <?php echo form_input('dataServico', $servico->dataServico ,array( 'class'=>'form-control col-md-3', 'required'=>'required') ); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Hora do Serviço:</label>
    <?php echo form_input(
        'horaServico', 
        $servico->horaServico ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Tipo de Serviço:</label>
    <select name="tipoServico" class="form-control"> 
      <?php foreach( $tipoServico as $serv): ?>
        <?php if( $serv->id == $servico->tipo ){ ?>
          <option value="<?php echo $serv->id; ?>" selected><?php echo $serv->descricao; ?></option>
        <?php }else{ ?>
          <option value="<?php echo $serv->id; ?>"><?php echo $serv->descricao; ?></option>
        <?php } ?>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Solicitação:</label>
    <?php echo form_textarea(
        'solicitacao', 
        $servico->solicitacao ,
        array( 'class'=>'form-control col-md-3',
                'required'=>'required',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Detectado:</label>
    <?php echo form_textarea(
        'detectado', 
        $servico->detectado ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Solução:</label>
    <?php echo form_textarea(
        'solucao', 
        $servico->solucao ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Previsão de Conclusão:</label>
    <?php echo form_input(
        'pervisaoConclusao', 
        $servico->previsaoConclusao ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Data da Conclusão:</label>
    <?php echo form_input(
        'dataConclusao', 
        $servico->dataConclusao ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Status do Serviço:</label>
    <?php echo form_input(
        'status', 
        $servico->status ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nome do Técnico:</label>
    <?php echo form_input(
        'nomeTecnico', 
        $infos[0]->nome ,
        array( 'class'=>'form-control col-md-3',
          ) 
      ); 
    ?>
  </div>


  <br><br>

  <button type="submit" class="btn btn-primary">Cadastrar</button>




<?php form_close(); ?>
    </div><!--col-md-5-->
  </div><!--row-->
</div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
