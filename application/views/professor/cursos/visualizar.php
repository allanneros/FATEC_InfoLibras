<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Painel <small>Acesso de professor</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> In&iacute;cio</a></li>
      </ol>
    </section>

    <header class="page-heading">
        <div class="container">
        </div>
    </header>
        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
			<div class="row">
                <?php 
                    echo(Mensagens::lerMensagem());
                ?>
				<div class="col-sm-6">
					<?php 
						$id_curso = $curso['id'];

						$arquivo_imagem = base_url() . '/uploads/curso/' . $id_curso . '.jpg';
						if ($fp = curl_init($arquivo_imagem)) {
							$imagem = '<img src="' . $arquivo_imagem . '" style="max-width:200px; max-height:100px;"/>';
						} else {
							$imagem = '';
						}

						//links
						$link_listar		= base_url() . index_page() . '/professor/cursos';
						$link_editar 		= base_url() . index_page() . '/professor/cursos/editar/' . $id_curso;
						$link_ativar 		= base_url() . index_page() . '/professor/cursos/ativar/' . $id_curso . '/';
						$link_excluir 		= base_url() . index_page() . '/professor/cursos/excluir/' . $id_curso;

						echo($imagem);
						echo('<h1>');
						echo('<i class="fa fa-video-camera"></i> ');
						echo($curso['curso'] . ' ');
						echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_listar . '\'"><i class="fa fa-arrow-left"></i> Voltar para a lista de Cursos</button>');
						echo('<button class="btn btn-sm btn-primary" onclick="window.location=\'' . $link_editar . '\'"><i class="fa fa-edit"></i> Editar</button>');
						echo('<button class="btn btn-sm btn-warning" onclick="window.location=\'' . $link_ativar . '\'"><i class="fa fa-check"></i> Ativar/Desativar</button>');
						echo('<button class="btn btn-sm btn-danger" onclick="window.location=\'' . $link_excluir . '\'"><i class="fa fa-trash"></i> Excluir</button>');
						echo('</h1>');

						if (!$curso['ativo']) {
							echo('<div class="alert alert-danger">');
							echo('Este curso está <strong>inativo</strong> e não estará visível aos alunos.');
							echo('</div>');
						}
						echo('<p>' . nl2br($curso['descricao']) . '</p>');
					?>
				</div>
				<div class="col-sm-6">
					<div class="box box-primary">
                        <!--box-header-->
                        <div class="box-header">
							<h3 class="box-title">Lista de aulas deste curso</h3> &nbsp;
							<button class="btn btn-sm btn-success" id="button_incluir"><i class='fa fa-plus'></i> Incluir aula</button>
                        </div>
                        <!-- /.box-header -->
						<?php
							if ($lista_aulas==NULL) {
								echo('Não há registros para exibir.');
							} else {
						?>
						<div class="box-body table-responsive no-padding">
							<table class="table">
                                <!--
								<tr>
									<th style="width:20px;">ID</th>
									<th>Tema</th>
									<th style="width:200px;"></th>
								</tr>
                                -->
								<!--loop nos registros-->
								<?php
									foreach($lista_aulas as $aula) { 
										$aula_id 	 = $aula['id'];
										$aula_tema   = $aula['tema'];
										$aula_resumo = $aula['resumo'];

										$link_editar 	= base_url() . index_page() . '/professor/aulas/editar/' . $aula_id . "/" . $id_curso;
										$link_excluir 	= base_url() . index_page() . '/professor/aulas/excluir/' . $aula_id . "/" . $id_curso;

										echo('<tr>');
                                        //echo('<td style="width:0px;">' . $aula_id . '</td>');
                                        echo('<td>');
                                            echo('<h4>');
                                            echo($aula_tema);
                                            echo(' ');
											echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_editar . '\'"><i class="fa fa-edit"></i> Editar aula</button>');
											echo('<button class="btn btn-sm btn-danger" onclick="window.location=\'' . $link_excluir . '\'"><i class="fa fa-trash"></i> Excluir aula</button>');
                                            echo('</h4>');
                                            echo('<p>' . nl2br($aula_resumo) . '</p>');
                                        echo('</td>');
										echo('<td style="width:150px;" align="right">');
										echo('</td>');
										echo('</tr>');
									}
								?>
							</table>
						</div><!-- /.box-body -->
						<?php } ?>
              		</div><!-- /.box -->
				</div><!--/.col-xs-12 -->
			</div>
        </section><!-- /.content -->
    </div>

<script type="text/javascript">
    document.getElementById("button_incluir").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/aulas/criar/' . $id_curso)?>";
    }
</script>