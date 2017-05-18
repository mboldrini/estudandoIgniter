<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
    <a class="btn btn-primary pull-right" href="<?php echo base_url() ?>user/novo" role="button">Cadastrar Usuário</a>

  </h1>
</section>
<section class="content">
<div class="container-fluid">
  <div class="row">
  



<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
          <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Nome</th>
              <th>Sobrenome</th>
              <th>descricao</th>
              <td>Opções</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $usuarios as $usuario ): ?>

            <?php if( $usuario->id == $infos[0]->id ){ ?>
              <tr>
                <td><?php echo $usuario->id; ?></td>
                <td>
                  <span class="label label-primary">
                    <?php echo $usuario->username; ?>                    
                  </span>
                </td>
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->sobrenome; ?></td>
                <td><?php echo $usuario->descricao; ?></td>
                <td>
                  <p>Você não pode editar a sí mesmo</p>          
                </td>
              </tr>
            <?php }else{ ?>
              <tr>
                <td><?php echo $usuario->id; ?></td>
                <td>
                  <span class="label label-primary">
                    <?php echo $usuario->username; ?>                    
                  </span>
                </td>
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->sobrenome; ?></td>
                <td><?php echo $usuario->descricao; ?></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('user/editar/' . $usuario->id) ?>" role="button">Editar</a>
                  <a class="btn btn-danger" href="<?= base_url('user/excluir/' . $usuario->id) ?>" role="button" onclick="return confirm('Tem certeza que deseja excluir esse registro?');">Excluir</a>
                </td>
              </tr>
            <?php } ?>

            
          <?php endforeach; ?>
        </tbody>
    </table>
</div>



</div>
</div>
</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
