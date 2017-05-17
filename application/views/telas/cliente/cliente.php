<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  <a class="btn btn-primary pull-right" href="<?php base_url() ?>novo" role="button">Cadastrar Cliente</a>

  </h1>
</section>
<section class="content">


<div class="table-responsive">
    <table class="table table-striped">
      	<thead>
        	<tr>
          		<th>ID</th>
          		<th>Nome</th>
          		<th>CPF</th>
          		<th>Celular</th>
          		<th>Email</th>
              <th>Serviços</th>
          		<th>Opções</th>

        	</tr>
      	</thead>
      	<tbody>
            <?php foreach ($clientes as $cliente): ?>
              <tr>
                <td><?php echo $cliente->id; ?></td>
                <td><a href="<?= base_url('cliente/ficha/' . $cliente->id) ?>"><?php echo $cliente->nome; ?></a></td>
                <td><?php echo $cliente->cpf; ?></td>
                <td><?php echo $cliente->celular; ?></td>
                <td><?php echo $cliente->email; ?></td>
                <td>
                  <a href="<?= base_url('servico/novoservico/' . $cliente->id) ?>" data-original-title="Novo Serviço" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>  Novo Serviço</a>
                </td>
                <td>
                  <a href="<?= base_url('cliente/editar/' . $cliente->id) ?>" data-original-title="Editar Usuário" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i>Editar</a>

                 
                  <a class="btn btn-danger" href="<?= base_url('cliente/excluir/' . $cliente->id) ?>" role="button" onclick="return confirm('Tem certeza que deseja excluir esse registro?');">Excluir</a>


                </td>
              </tr>
            <?php endforeach; ?>
      	</tbody>
    </table>
</div>





</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
