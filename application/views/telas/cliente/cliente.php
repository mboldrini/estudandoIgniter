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
          		<th>Opções</th>

        	</tr>
      	</thead>
      	<tbody>
            <?php foreach ($clientes as $cliente): ?>
              <tr>
                <td><?php echo $cliente->id; ?></td>
                <td><?php echo $cliente->nome; ?></td>
                <td><?php echo $cliente->cpf; ?></td>
                <td><?php echo $cliente->celular; ?></td>
                <td><?php echo $cliente->email; ?></td>
                <td>Botões de Edição Aqui</td>
              </tr>
            <?php endforeach; ?>
      	</tbody>
    </table>
</div>





</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
