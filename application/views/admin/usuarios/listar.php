<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Usu&aacute;rios
            <small>Utilize esta tela para gerenciar os usu&aacute;rios do sistema.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administra&ccedil;&atilde;o</a></li>
            <li class="active">Usu&aacute;rios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
			<div class="row">
				<div class="col-xs-12">
					<?php 
						if (isset($retorno)) {
							if ($retorno) {
								echo('<div class="alert alert-success alert-dismissible">');
								echo('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
                				echo('<h4><i class="icon fa fa-check"></i> Aviso</h4>');
                				echo('sucesso.');
              					echo('</div>');
							}
						}
					?>
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Lista de usu&aacute;rios</h3>&nbsp;  
							<button class="btn btn-success" id="button_incluir">Incluir usu&aacute;rio</button>
							<!--
							<div class="box-tools pull-right">
								<div class="input-group" style="width: 150px;">
									<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
									<div class="input-group-btn">
										<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
							-->
						</div><!-- /.box-header -->

						<?php
							if ($lista_usuarios==NULL) {
								echo('Não há registros para exibir.');
							} else {
						?>
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover">
								<tr>
									<th style="width:20px;">ID</th>
									<th style="width:40px;">Status</th>
									<th>Nome</th>
									<th>e-Mail</th>
									<th style="width:40px;"></th>
									<th style="width:200px;"></th>
								</tr>
								<!--loop nos registros-->
								<?php
									//$qtd_usuarios = count($lista_usuarios);
									//echo('qtd usuarios: ' . $qtd_usuarios);
									//echo('</br>');
									//echo('lista usuarios: '); 
									//var_dump($lista_usuarios);
									//echo('</br>');
									//echo('</br>');
									foreach($lista_usuarios as $usuario) { 
										$id 		= $usuario['id'];
										$nome 		= $usuario['nome'];
										$login		= $usuario['login'];
										$ativo		= $usuario['ativo']; 
										$admin		= $usuario['admin'];
										$professor	= $usuario['professor'];

										echo('<tr>');
										echo('<td>' . $id 	. '</td>');
										echo('<td>');
										if ($ativo==-1) {
											echo('<span class="label label-success">Ativo</span>');
										} else {
											echo('<span class="label label-danger">Inativo</span>');
										}
										echo('</td>');
										echo('<td>' . $nome	. '</td>');
										echo('<td>' . $login . '</td>');
										echo('<td>');
										if ($admin) {echo('<span class="label label-warning">Administrador</span>');}										
										if ($professor) {echo('<span class="label label-info">Professor</span>');}										
										echo('</td>');
										echo('<td>');
										$link_editar 	= base_url() . index_page() . '/admin/usuarios/editar/' . $id;
										$link_ativar 	= base_url() . index_page() . '/admin/usuarios/ativar/' . $id . '/';
										$link_excluir 	= base_url() . index_page() . '/admin/usuarios/excluir/' . $id . '/';
										if ($ativo==-1) {
											echo('<button class="btn btn-sm btn-warning"');
											echo('onclick="window.location=\'' . $link_ativar . 0 . '\'"');
											echo('>Desativar</button>');
										} else {
											echo('<button class="btn btn-sm btn-success"');
											echo('onclick="window.location=\'' . $link_ativar . -1 . '\'"');
											echo('>Ativar</button>');
										}
										echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_editar . '\'">Editar</button>');
										echo('<button class="btn btn-sm btn-danger" onclick="window.location=\'' . $link_excluir . '\'">Excluir</button>');
										echo('</td>');
										echo('</tr>');
									}
								?>
							</table>
						</div><!-- /.box-body -->
						<?php } ?>
              		</div><!-- /.box -->
				</div>
			</div>

        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

<script type="text/javascript">
    document.getElementById("button_incluir").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/admin/usuarios/criar')?>";
    }
</script>