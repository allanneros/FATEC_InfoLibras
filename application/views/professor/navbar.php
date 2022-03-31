    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
            <div class="navbar-header">
                <span class="logo-lg">
                    <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>" width="20%" height="20%">
                </span>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo(base_url() . index_page() . '/professor/inicio');?>">In&iacute;cio <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo(base_url() . index_page() . '/professor/cursos');?>">Meus cursos</a></li>
                    <!--
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    -->
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Pesquisar curso">
                    </div>
                </form>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo(base_url() . 'uploads/img/logo_neros_systems_box_icon_96x96.png'); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo($usuario_nome);?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo(base_url() . 'uploads/img/logo_neros_systems_box_icon_96x96.png'); ?>" class="img-circle" alt="User Image">
                                    <p style="color:#000;"><?php echo($usuario_nome);?><small><?php echo($usuario_login);?></small></p>
                                </li>
                                <!-- Menu Body -->
                                <!--
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" id="button_sair" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!--/.user account -->
                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>

    <script type="text/javascript">
        document.getElementById("button_sair").onclick = function(){
            location.href="<?php echo(base_url() . index_page() . '/acesso/encerrarsessao'); ?>";
        }
    </script>
