    <title>Teste</title>
    <div class="login-box">
        <div class="login-logo">
            <span class="logo-mini">
                <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>" height="50%" width="50%">
            </span>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Informe sua senha.</p>
            <?php echo(form_open('acesso/redefinir'));?>
            <?php
                if (isset($retorno)) {
                    if ($retorno) {
                        echo('<div class="alert alert-danger alert-dismissible">');
                        echo('<i class="icon fa fa-check"></i>');
                        echo('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
                        echo($retorno);
                        echo('</div>');
                    }
                }
            ?>

            <div class="form-group has-feedback">
                <input type="hidden" class="form-control" placeholder="Chave" id="form_chave" name="form_chave" value="<?php echo($form_chave);?>">
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Informe sua senha" id="form_senha" name="form_senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Confirme sua senha" id="form_senha" name="form_senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Confirmar senha</button>
            </div>
            <a href="<?php echo(base_url() . index_page() . '/acesso');?>" id="link_acesso" class="text-center">Retornar para a tela de login</a>
            <?php echo(form_close());?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
