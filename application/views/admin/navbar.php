    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">I<b>L</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <img src="<?php echo(base_url() . 'uploads/img/logo_branco.png');?>">
            </span>
        </a>

        <?php 
            $base_link = base_url() . index_page();
        ?>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <!--
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <ul class="dropdown-menu">
                </ul>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php echo(base_url() . 'uploads/img/logo_neros_systems_box_icon_96x96.png'); ?>" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo($usuario_nome);?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="<?php echo(base_url() . 'uploads/img/logo_neros_systems_box_icon_96x96.png'); ?>" class="img-circle" alt="Avatar">
                            <p><?php echo($usuario_nome);?><br><small><?php echo($usuario_login);?></small></p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                            <a href="#" id="button_sair" class="btn btn-default btn-flat">Sair</a>
                            <!--
                            <a href="#" id="button_sair" class="btn btn-default btn-flat" onClick="window.redirect('<?php echo(base_url() . index_page() . '/acesso/encerrarsessao'); ?>')">Sair</a>
                            -->
                        </div>
                        </li>
                    </ul>
                </li>

                <script type="text/javascript">
                    document.getElementById("button_sair").onclick = function(){
                        location.href="<?php echo(base_url() . index_page() . '/acesso/encerrarsessao'); ?>";
                    }
                </script>

            </ul>
            </div>
        </nav>
    </header>
