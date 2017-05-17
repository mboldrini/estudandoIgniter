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
  // pega o valor que veio na url, no caso o terceiro valor
  $id = $this->uri->segment(3);
  // condicao a ser passada pra tabela de exclusao
  $cond = array('id'=> $id);
  // qual tabela vai ser excluido o id
  $tabela = 'valorservico';
  // vai redirecionar pra onde
  $redireciona = 'servico/valor';
  
  $cliente = $this->funcoes->do_delete($cond, $tabela, $redireciona);
?>



  
</div><!-- row -->
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
