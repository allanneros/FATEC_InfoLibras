<!DOCTYPE html>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title><?php echo(APP_NAME . " - " . $pageTitle); ?></title>

    <link rel="icon" href="<?php echo(base_url() . 'favicon.ico'); ?>" type="image/x-icon" />

	<link rel="stylesheet" href="<?php echo(base_url() . BOOTSTRAP_CSS); ?>">
	<link rel="stylesheet" href="<?php echo(base_url() . ADMIN_LTE_CSS); ?>">
	<link rel="stylesheet" href="<?php echo(base_url() . ADMIN_LTE_SKIN); ?>">

	<link rel="stylesheet" href="<?php echo(base_url() . 'includes/admin-lte/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo(base_url() . BOOTSTRAP_FONT); ?>">
	<link rel="stylesheet" href="<?php echo(base_url() . BOOTSTRAP_ICON); ?>">
    -->

    <script src="<?php echo(base_url() . BOOTSTRAP_JQUERY); ?>"></script>
    <script src="<?php echo(base_url() . BOOTSTRAP_JS); ?>"></script>
    <script src="<?php echo(base_url() . ADMIN_LTE_JS); ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	

</head>
<body class="hold-transition skin-black-light layout-top-nav">
    <div class="wrapper">
