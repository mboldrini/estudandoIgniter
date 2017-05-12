<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
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
          		<th>Usuário</th>
        	</tr>
      	</thead>
      	<tbody>
        	<tr>
	          	<td>lorem</td>
	          	<td>sodales</td>
	          	<td>ligula</td>
	          	<td>in</td>
	          	<td>libero</td>
	          	<td>libero</td>
        	</tr>
      	</tbody>
    </table>
</div>

<?php print_r($servicos); ?>

	<h1>
		<?php foreach $servicos as $row ?>
		<?php echo "afsasf"; ?>
	<?php endforeach; ?>
	</h1>

</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
