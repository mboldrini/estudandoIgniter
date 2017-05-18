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
	

<div class="table-responsive">
    <table class="table table-striped">
      	<thead>
        	<tr>
          		<th>ID</th>
          		<th>Cliente</th>
          		<th>Tipo</th>
          		<th>Status</th>
          		<th>Data de Cadastro</th>
          		<th>Técnico Responsável</th>
          		<th>Opções</th>

        	</tr>
      	</thead>
      	<tbody>
          <?php foreach( $servicos as $servico ): ?>
            <tr>
              <td><?php echo $servico->id; ?></td>
              <td>
                <?php foreach( $clientes as $cliente ): ?>
                  <?php if( $cliente->id == $servico->codigoCliente ){ ?>
                    <?php echo $cliente->nome; ?>
                  <?php } ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php foreach( $tipoServico as $tipo ): ?>
                  <?php if( $tipo->id == $servico->tipo ){ ?>
                    <?php echo $tipo->descricao; ?>
                  <?php } ?>
                <?php endforeach; ?>
              </td>
              <td><?php echo $servico->status; ?></td>
              <td><?php echo $servico->dataCadastro; ?></td>
              <td><?php echo $servico->nomeTecnico; ?></td>
              <td>
                <a class="btn btn-primary" href="" role="button">Editar</a>
                <a class="btn btn-danger" href="" role="button" onclick="return confirm('Tem certeza que deseja excluir esse registro?');">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
      	</tbody>
    </table>
</div>



</div><!--row-->
</div><!--container-fluid-->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
