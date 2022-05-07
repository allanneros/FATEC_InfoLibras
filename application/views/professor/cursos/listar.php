<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo($pageTitle);?> <small>Acesso de professor</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> In&iacute;cio</a></li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
			<div class="row">
				<div class="col-xs-12">
					<?php echo(Mensagens::lerMensagem()); ?>
					<div class="box box-primary">
                        <!--box-header-->
                        <div class="box-header">
							<h3 class="box-title">Seus cursos </h3>&nbsp;  
							<button class="btn btn-success" id="button_incluir"><i class='fa fa-plus'></i> Incluir curso</button>
                        </div>
                        <!-- /.box-header -->

						<?php
							if ($lista_cursos==NULL) {
								echo('<p>Você ainda não incluiu nenhum curso.</p>');
							} else {
						?>
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover">
								<tbody>
								<!--loop nos registros-->
								<?php
									foreach($lista_cursos as $curso) { 
										//info do curso
										$id 		= $curso['id'];
										$curso_nome = $curso['curso'];
										$descricao	= $curso['descricao'];
										$ativo		= $curso['ativo']; 
										$qtd_aulas	= $curso['qtd_aulas'];
										//$professor	= $curso['professor'];

										//links
										$link_visualizar	= base_url() . index_page() . '/professor/cursos/visualizar/' . $id;
										$link_editar 		= base_url() . index_page() . '/professor/cursos/editar/' . $id;
										$link_ativar 		= base_url() . index_page() . '/professor/cursos/ativar/' . $id . '/';
										$link_excluir 		= base_url() . index_page() . '/professor/cursos/excluir/' . $id;

										//sinalizador do status
										$row_border = ($ativo == -1 ? '#00a65a' : '#dd4b39' );

										//verifica se tem imagem e coloca à esquerda
										$arquivo_imagem = base_url() . '/uploads/curso/' . $id . '.jpg';
										if ($fp = curl_init($arquivo_imagem)) {
											$imagem = '<img src="' . $arquivo_imagem . '" style="max-width:200px; max-height:100px;"/>';
										} else {
											$imagem = '';
										}

										echo('<tr style="border-left: 10px solid ' . $row_border . ';">');
                                        echo('<td width="200px">');
										echo($imagem);
										echo('</td>');
										echo('<td>');
                                            echo('<h2>');
												echo('<small>#' . $id . '</small> ' . $curso_nome . ' <small>' . ($ativo != -1 ? '(inativo)' : ''));
												echo('&nbsp;');
											echo('</h2>');
											echo('<button class="btn btn-sm btn-info" onclick="window.location=\'' . $link_visualizar . '\'"><i class="fa fa-magnifying-glass"></i> Minhas aulas</button>');
											echo(' ');
                                            if ($ativo==-1) {
                                                echo('<button class="btn btn-sm btn-warning"');
                                                echo('onclick="window.location=\'' . $link_ativar . 0 . '\'"');
                                                echo('><i class="fa fa-check"></i> Desativar</button>');
                                            } else {
                                                echo('<button class="btn btn-sm btn-success"');
                                                echo('onclick="window.location=\'' . $link_ativar . -1 . '\'"');
                                                echo('><i class="fa fa-check"></i> Ativar</button>');
                                            }
											echo(' ');
											echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_editar . '\'"><i class="fa fa-edit"></i> Editar</button>');
											echo(' ');
											echo('<button class="btn btn-sm btn-danger"" onclick="window.location=\'' . $link_excluir . '\'"><i class="fa fa-trash"></i> Excluir</button>');
											echo('&nbsp;');
                                            echo('<p class="lead">' . nl2br($descricao)	. '</p>');
											echo($qtd_aulas . ' aula(s)');
                                        echo('</td>');
										echo('</tr>');
									}
								?>
								</tbody>
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
