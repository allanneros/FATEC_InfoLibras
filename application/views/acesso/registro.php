<!DOCTYPE html>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title><?php echo('Registro');?></title>

	<?php $bootstrap_path_css = base_url() . 'includes/bootstrap/css/bootstrap.min.css'; ?>
	<?php $admin_lte_path = base_url() . 'includes/admin-lte/css/AdminLTE.min.css'; ?> 
	<?php $admin_lte_path_skin = base_url() . 'includes/admin-lte/css/skins/skin-blue.min.css'; ?> 

	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo($bootstrap_path_css); ?>">
	<link rel="stylesheet" href="<?php echo($admin_lte_path); ?>">
	<link rel="stylesheet" href="<?php echo($admin_lte_path_skin); ?>">

    <!-- REQUIRED JS SCRIPTS -->
	<?php $bootstrap_path_jquery = base_url() . 'includes/bootstrap/js/jquery-3.3.1.min.js'; ?>
	<?php $bootstrap_path_js = base_url() . 'includes/bootstrap/js/bootstrap.min.js'; ?>
	<?php $admin_lte_path_js = base_url() . 'includes/admin-lte/js/app.min.js'; ?> 
    
    <script src="<?php echo($bootstrap_path_jquery); ?>"></script>
    <script src="<?php echo($bootstrap_path_js); ?>"></script>
    <script src="<?php echo($admin_lte_path_js); ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <span class="logo-lg">
                <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>">
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
</body>
</html>
