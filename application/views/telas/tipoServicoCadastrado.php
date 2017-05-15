<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  <a class="btn btn-primary pull-right" href="<?= base_url(); ?>painel/cadastrarTipoServico" role="button">Cadastrar</a>

  </h1>
</section>
<section class="content">


<div class="table-responsive">
    <table class="table table-striped">
      	<thead>
        	<tr>
          		<th>ID</th>
          		<th>Serviço</th>
          		<th>Contábil</th>
          		<th>Duração</th>
          		<th>Data de Cadastro</th>
          		<th>Opções</th>

        	</tr>
      	</thead>
      	<tbody>
          <?php foreach ($servicos as $servico): ?>
              <tr>
                <td><?php echo $servico->id; ?></td>
                <td><?php echo $servico->descricao; ?></td>
                <td>
                  <?php if( $servico->contabil == 1){ ?> 
                    <span class="label label-default">Não</span>
                  <?php }else{ ?>    
                    <span class="label label-success">Sim</span>    
                  <?php } ?>           
                </td>
                <td><?php echo $servico->duracao; ?></td>
                <td><?php echo $servico->dataCadastro; ?></td>
                <td>
                  <a class="btn btn-primary" href="#" role="button">Editar</a>
                  <a class="btn btn-danger" href="#" role="button">Excluir</a>
                </td>
              </tr>
          <?php endforeach; ?>
      	</tbody>
    </table>
</div>




</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
