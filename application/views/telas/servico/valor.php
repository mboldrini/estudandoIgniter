<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
    <a class="btn btn-primary pull-right" href="<?php echo base_url() ?>servico/novoValor" role="button">Cadastrar Valor</a>

  </h1>
</section>
<section class="content">


<div class="table-responsive">
    <table class="table table-striped ">
      	<thead>
        	<tr>
          		<th>ID</th>
              <th>Serviço</th>
          		<th>Início</th>
          		<th>Valor (R$)</th>
          		<th>Fim</th>
          		<th>Data de Cadastro</th>
              <th>Opções</th>
        	</tr>
      	</thead>
      	<tbody>
            <?php foreach( $registros as $registro): ?>
              <tr>
                <td><?php echo $registro->id; ?></td>
                <?php 
                  foreach( $servicos as $servico ){
                    if( $servico->id == $registro->tipo ){
                      print( "<td>".$servico->descricao."</td>" );
                    }//if
                  }//foreach
                ?>
                <td><?php echo $registro->inicioValor; ?></td>
                <td><span class="label label-primary"><?php echo $registro->valor; ?></span></td>
                <td><?php echo $registro->fimValor; ?></td>
                <td><?php echo $registro->dataCadastro; ?></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('servico/editarValor/' . $registro->id) ?>" role="button">Editar</a>
                  <a class="btn btn-danger" href="<?= base_url('servico/excluirValor/' . $registro->id) ?>" role="button" onclick="return confirm('Tem certeza que deseja excluir esse registro?');">Excluir</a>
                </td>
              </tr>
            <?php endforeach; ?>
      	</tbody>
    </table>
</div>



</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
