    <div class="login-box">
        <div class="login-logo">
            <span class="logo-mini">
                <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>" height="50%" width="50%">
            </span>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Informe seu e-mail para receber instru&ccedil;&otilde;es para recuperar seu acesso.</p>
            <?php echo(form_open('acesso/recuperar'));?>
            <?php
                if (isset($retorno)) {
                    if ($retorno) {
                        echo('<div class="alert alert-danger alert-dismissible">');
                        echo('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
                        echo('<h4><i class="icon fa fa-check"></i> Aviso</h4>');
                        echo($retorno);
                        echo('</div>');

                    }

                } else {
                    ?>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Informe seu e-mail" id="form_login" name="form_login">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Recuperar acesso</button>
                    </div>
                    <?php 

                }
            ?>
            <a href="<?php echo(base_url() . index_page() . '/acesso');?>" id="link_acesso" class="text-center">Retornar para a tela de login</a>
            <?php echo(form_close());?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
