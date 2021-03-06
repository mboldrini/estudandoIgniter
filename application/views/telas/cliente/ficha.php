<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  <a class="btn btn-primary pull-right" href="<?= base_url(); ?>cliente/clientes" role="button">Clientes Cadastrados</a>

  </h1>
</section>
<section class="content">
<div class="row">
  
  <div class="container">
      <div class="row">

<?php 
  $id = $this->uri->segment(3);
  $cliente = $this->funcoes->pegaFichaCliente($id)->row();
?>

    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
   
   
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
                        <td>CPF:</td>
                        <td><?php echo $cliente->cpf; ?></td>
                      </tr>
                      <tr>
                        <td>Data de Nascimento:</td>
                        <td><?php echo $cliente->dataNascimento; ?></td>
                      </tr>
                        <td>Email:</td>
                        <td><?php echo $cliente->email; ?></td>
                      </tr>
                      <tr>
                        <td>Data de Cadastro:</td>
                        <td><?php echo $cliente->dataCadastro; ?></td>
                      </tr>
                        <td>Telefones:</td>
                        <td><?php echo $cliente->telefone; ?><br><br><?php echo $cliente->celular; ?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-"></i></a>
                        <span class="pull-right">

                            <a href="<?= base_url('cliente/editar/' . $cliente->id) ?>" data-original-title="Editar Usuário" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i>Editar</a>

                            <a class="btn btn-danger" href="<?= base_url('cliente/excluir/' . $cliente->id) ?>" role="button" onclick="return confirm('Tem certeza que deseja excluir esse registro?');">Excluir</a>

                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>



</div><!--row-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
