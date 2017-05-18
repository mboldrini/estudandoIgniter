 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

   
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <!--<li class="active"><a href="#"><i class="fa fa-link"></i> <span>Painel</span></a></li>-->

        <li>
          <a href="<?= base_url(); ?>">
            <i class="fa fa-tachometer "></i> <span>Painel</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>cliente/clientes">
            <i class="fa fa-group "></i> <span>Cliente</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>servico/tipo">
            <i class="fa fa-cubes "></i> <span>Tipo de Serviço</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>servico/valor">
            <i class="fa fa-money"></i> <span>Valor do Serviço</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>servico/servicos">
            <i class="fa fa-cogs "></i> <span>Serviços</span>
          </a>
        </li>


        <li class="header">Administrativo</li>

        <li>
          <a href="<?= base_url(); ?>user/listar">
            <i class="fa fa-user-plus "></i> <span>Usuários</span>
          </a>
        </li>
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
