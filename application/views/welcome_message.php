<!DOCTYPE html>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<?php $bootstrap_path_css 				= base_url() . 'includes/bootstrap/css/bootstrap.min.css'; ?>
	<?php $bootstrap_path_css_fontawesome 	= base_url() . 'includes/bootstrap/css/font-awesome.min.css'; ?>
	<?php $bootstrap_path_css_ionicons		= base_url() . 'includes/bootstrap/css/ionicons.min.css'; ?>

	<?php $admin_lte_path = base_url() . 'includes/admin-lte/css/AdminLTE.min.css'; ?> 
	<?php $admin_lte_path_skin = base_url() . 'includes/admin-lte/css/skins/skin-blue.min.css'; ?> 

	<link rel="stylesheet" href="<?php echo($bootstrap_path_css); ?>">
	<link rel="stylesheet" href="<?php echo($bootstrap_path_css_fontawesome); ?>">
	<link rel="stylesheet" href="<?php echo($bootstrap_path_css_ionicons); ?>">
	<link rel="stylesheet" href="<?php echo($admin_lte_path); ?>">
	<link rel="stylesheet" href="<?php echo($admin_lte_path_skin); ?>">

    <!-- REQUIRED JS SCRIPTS -->
	<?php $bootstrap_path_js = base_url() . 'includes/bootstrap/js/bootstrap.min.js'; ?>
	<?php $bootstrap_path_jquery = base_url() . 'includes/bootstrap/js/jquery-3.3.1.min.js'; ?>
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

	<title><?php echo('Projeto Curso em Libras');?></title>

</head>
<body style="height:100%; background-repeat: no-repeat; background-size: cover; background-image: url(https://assetsnffrgf-a.akamaihd.net/assets/m/502018510/univ/art/502018510_univ_lsr_lg.jpg);">
    <!--<div class="jumbotron" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
    -->
    <div class="jumbotron" style="background-color: transparent;">
        <div class="container" style="color:#ffffff;">
            <img src="<?php echo(base_url() . 'uploads/img/logo.png');?>" width="10%" height="10%">
            <h1 class="display-4">Curso em Libras</h1>
            <p class="lead">Projeto de conclusão do curso de Análise e Desenvolvimento de Sistemas da FATEC Ipiranga</p>
            <p>São Paulo/SP, Brasil, 2018-2019</p>
            <p class="lead">
                <button type="button" class="btn btn-primary" id="button_acesso">Acessar o sistema</button>
                <button type="button" class="btn bg-navy" id="button_registro">Registrar</button>
            </p>
            <strong>Projeto desenvolvido pela <a href="http://labs.neros.com.br">Neros Labs</a>.</strong>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById("button_acesso").onclick = function(){
            location.href="<?php echo(base_url() . index_page() . '/acesso')?>";
        }
        document.getElementById("button_registro").onclick = function(){
            location.href="<?php echo(base_url() . index_page() . '/acesso/registrar')?>";
        }
    </script>

</body>
</html>
