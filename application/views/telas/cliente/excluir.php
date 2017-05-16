<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  <a class="btn btn-primary pull-right" href="<?php base_url() ?>novo" role="button">Cadastrar Cliente</a>

  </h1>
</section>
<section class="content">
<div class="row">
  
<?php 
  $id = $this->uri->segment(3);
  $cond = array('id'=> $id);
  $tabela = 'clientes';
  $cliente = $this->funcoes->do_delete($cond, $tabela);
?>



  
</div><!-- row -->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
