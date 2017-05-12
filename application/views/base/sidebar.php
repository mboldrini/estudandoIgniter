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
          <a href="<?= base_url(); ?>painel/cliente">
            <i class="fa fa-group "></i> <span>Cliente</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>painel/tipoServicoCadastrado">
            <i class="fa fa-cubes "></i> <span>Tipo de Serviço</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>painel/valorservico">
            <i class="fa fa-money"></i> <span>Valor do Serviço</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>painel/servico">
            <i class="fa fa-cogs "></i> <span>Serviços</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
