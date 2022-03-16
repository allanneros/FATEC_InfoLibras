<?php $base_link = base_url() . index_page();?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo(base_url() . 'uploads/img/logo_neros_systems_box_icon_96x96.png'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Administra&ccedil;&atilde;o</p>
                </div>
            </div>
            <!--sitebar menu -->
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="header">MENU</li>
                <li class="active treeview">
                    <a href="<?php echo(base_url() . index_page() . '/inicio')?>"><i class="fa fa-dashboard"></i> <span>In&iacute;cio</span></a>
                </li>
                <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-users"></i> <span>Usu&aacute;rios</span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo(base_url() . index_page() . '/admin/usuarios')?>"><i class="fa fa-user"></i> Lista de usu&aacute;rios</a></li>
                        <li><a href="<?php echo(base_url() . index_page() . '/admin/usuarios/criar')?>"><i class="fa fa-user-plus"></i> Incluir usu&aacute;rio</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-book"></i> <span>Cursos</span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo(base_url() . index_page() . '/admin/cursos')?>"><i class="fa fa-list"></i> Lista de cursos</a></li>
                        <li><a href="<?php echo(base_url() . index_page() . '/admin/cursos/criar')?>"><i class="fa fa-plus"></i> Incluir curso</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-video-camera"></i> <span>Aulas</span></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-list"></i> Lista de aulas</a></li>
                        <li><a href="#"><i class="fa fa-plus"></i> Incluir aula</a></li>
                    </ul>
                </li>
            </ul>            
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
