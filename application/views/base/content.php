<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">


<?php print_r($infos); ?>

<br><br><br>


<?php foreach( $infos as $info): ?>  

	<h1><?php print $info->nome; ?></h1>

<?php endforeach; ?>

<h1><?php echo $infos[0]->descricao; ?></h1>



</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
