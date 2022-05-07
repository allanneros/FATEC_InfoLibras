<?php defined('BASEPATH') OR exit('No direct script access allowed');
  require(APPPATH . '/controllers/misc/Mensagens.php');
?>

<!--<div class="content-wrapper" style="min-height: 960.3px;">-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Painel<small>Acesso de aluno</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> In&iacute;cio</a></li>
    </ol>
  </section>
  <?php 
    echo(Mensagens::lerMensagem());
  ?>

<!--
</div>
-->

