<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Painel<small>Acesso de professor</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> In&iacute;cio</a></li>
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
                        <!--box-header-->
                        <div class="box-header">
							<h3 class="box-title">Lista de cursos</h3>&nbsp;  
							<button class="btn btn-success" id="button_incluir">Incluir curso</button>
                        </div>
                        <!-- /.box-header -->

						<?php
							if ($lista_cursos==NULL) {
								echo('Não há registros para exibir.');
							} else {
						?>
						<div class="box-body table-responsive no-padding">
							<table class="table">
								<tr>
									<th style="width:20px;">ID</th>
									<th style="width:40px;">Status</th>
									<th>Curso</th>
									<th style="width:200px;"></th>
								</tr>
								<!--loop nos registros-->
								<?php
									foreach($lista_cursos as $curso) { 
										//info do curso
										$id 		= $curso['id'];
										$curso_nome = $curso['curso'];
										$descricao	= $curso['descricao'];
										$ativo		= $curso['ativo']; 
										//$professor	= $curso['professor'];

										//links
										$link_visualizar	= base_url() . index_page() . '/professor/cursos/visualizar/' . $id;
										$link_editar 		= base_url() . index_page() . '/professor/cursos/editar/' . $id;
										$link_ativar 		= base_url() . index_page() . '/professor/cursos/ativar/' . $id . '/';
										$link_excluir 		= base_url() . index_page() . '/professor/cursos/excluir/' . $id;

										echo('<tr>');
                                        echo('<td>' . $id . '</td>');
                                        echo('<td>');
                                            if ($ativo==-1) {
                                                echo('<span class="label label-success">Ativo</span>');
                                            } else {
                                                echo('<span class="label label-danger">Inativo</span>');
                                            }
                                        echo('</td>');
                                        echo('<td>');
                                            echo('<b><a href="' . $link_visualizar . '">' . $curso_nome . '</a></b>');
                                            echo('<p>' . nl2br($descricao)	. '</p>');
                                        echo('</td>');
										echo('<td>');
                                            if ($ativo==-1) {
                                                echo('<button class="btn btn-sm btn-warning"');
                                                echo('onclick="window.location=\'' . $link_ativar . 0 . '\'"');
                                                echo('>Desativar</button>');
                                            } else {
                                                echo('<button class="btn btn-sm btn-success"');
                                                echo('onclick="window.location=\'' . $link_ativar . -1 . '\'"');
                                                echo('>Ativar</button>');
                                            }
										//echo('<button class="btn btn-sm btn-info" onclick="window.location=\'' . $link_visualizar . '\'">Visualizar</button>');
										echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_editar . '\'">Editar</button>');
										echo('<button class="btn btn-sm btn-danger"" onclick="window.location=\'' . $link_excluir . '\'">Excluir</button>');
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
    </div>

<script type="text/javascript">
    document.getElementById("button_incluir").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/cursos/criar')?>";
    }
</script>
