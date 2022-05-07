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
                    <li><a href="<?php echo(base_url() . index_page() . '/inicio');?>"><i class="fa fa-home"></i> In&iacute;cio <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo(base_url() . index_page() . '/aluno/cursos');?>"><i class="fa fa-book"></i> Cursos</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <form id="form_curso_pesquisar" name="form_curso_pesquisar">
                            <input type="text" class="form-control" id="form_curso_navbar_pesquisa" placeholder="Pesquisar curso">
                        </form>
                    </div>
                </form>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo(base_url() . 'uploads/img/icon.png'); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo($usuario_nome);?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo(base_url() . 'uploads/img/icon.png'); ?>" class="img-circle" alt="User Image">
                                    <p style="color:#000;"><?php echo($usuario_nome);?><small><?php echo($usuario_login);?></small></p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!--
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    -->
                                    <div class="pull-right">
                                        <a href="#" id="button_sair" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li><!--/.user account -->
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>

    <script type="text/javascript">
        document.getElementById("button_sair").onclick = function(){
            location.href="<?php echo(base_url() . index_page() . '/acesso/encerrarsessao'); ?>";
        }

        $('#form_curso_navbar_pesquisa').keyup(function(event){
            if(event.which == 13){
                var termo_pesquisa = document.getElementById("form_curso_navbar_pesquisa").value;
                location.href="<?php echo(base_url() . index_page() . '/aluno/cursos/pesquisar/');?>" + termo_pesquisa;
            }
        });
        $('#form_curso_navbar_pesquisa').keypress(function(event){
            if(event.which == 13){
                var termo_pesquisa = document.getElementById("form_curso_navbar_pesquisa").value;
                location.href="<?php echo(base_url() . index_page() . '/aluno/cursos/pesquisar/');?>" + termo_pesquisa;
            }
        });
</script>
