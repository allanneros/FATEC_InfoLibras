
<!-- .login-box -->
<div class="login-box">
  <!-- .login-logo -->
  <div class="login-logo">
    <span class="logo-mini">
      <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>" height="50%" width="50%">
    </span>
  </div>
  <!-- /.login-logo -->

  <!-- .login-box-body -->
  <div class="login-box-body">
    <p class="login-box-msg">Acesso</p>

    <?php echo(form_open('acesso/'));?>
      <?php
        if (isset($retorno)) {
          if ($retorno) {
            echo('<div class="alert alert-danger alert-dismissible">');
            echo('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
                    echo('<h4><i class="icon fa fa-check"></i> Aviso</h4>');
                    echo($retorno);
                    echo('</div>');
          }
        }
      ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Informe seu e-mail" id="form_login" name="form_login">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Informe sua senha" id="form_senha" name="form_senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <button type="submit" class="btn btn-primary btn-block">Acessar o sistema</button>
        <button type="button" id="button_registrar" class="btn btn-default btn-block">Registrar</button>
      </div>
    <?php echo(form_close());?>

    <a href="<?php echo(base_url() . index_page() . '/acesso/recuperar'); ?>">Esqueci minha senha</a><br>
    
  </div>
  <!-- /.login-box-body -->

  <script type="text/javascript">
      document.getElementById("button_registrar").onclick = function(){
          location.href="<?php echo(base_url() . index_page() . '/acesso/registrar')?>";
      }
  </script>
</div>
<!-- /.login-box -->