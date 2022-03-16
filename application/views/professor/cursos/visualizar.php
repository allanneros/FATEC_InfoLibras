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
				<div class="col-xs-12">
					<?php 
						$id_curso = $curso['id'];
						echo('<h1>'. $curso['curso'] . '</h1>');
						echo('<p>' . nl2br($curso['descricao']) . '</p>');
					?>
					<div class="box box-primary">
                        <!--box-header-->
                        <div class="box-header">
							<h3 class="box-title">Lista de aulas deste curso</h3> &nbsp;
							<button class="btn btn-sm btn-success" id="button_incluir">Incluir aula</button>
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
                                        echo('<td style="width:20px;">' . $aula_id . '</td>');
                                        echo('<td>');
                                            echo('<b>' . $aula_tema . '</b>');
                                            echo('<p>' . nl2br($aula_resumo) . '</p>');
                                        echo('</td>');
										echo('<td style="width:150px;" align="right">');
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
				</div><!--/.col-xs-12 -->
			</div>
        </section><!-- /.content -->
    </div>

<script type="text/javascript">
    document.getElementById("button_incluir").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/aulas/criar/' . $id_curso)?>";
    }
</script>