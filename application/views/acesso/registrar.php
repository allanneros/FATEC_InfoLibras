    <div class="login-box">
        <div class="login-logo">
            <span class="logo-mini">
                <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>" height="50%" width="50%">
            </span>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Informe seus dados para criar sua conta no site</p>
            
            <?php echo(form_open('acesso/registrar'));?>
                <?php if (isset($retorno) && $retorno != NULL) {
                    echo($retorno);
                }
                ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Seu nome" id="form_nome" name="form_nome">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Seu e-Mail" id="form_login" name="form_login">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Sua senha" id="form_senha" name="form_senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="confirme a senha" id="form_senha_confirmacao" name="form_senha_confirmacao">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </div>
            <?php echo(form_close());?>
            <br>
            <a href="<?php echo(base_url() . index_page() . '/acesso');?>" id="link_acesso" class="text-center">J&aacute; &eacute; cadastrado? Clique aqui</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
