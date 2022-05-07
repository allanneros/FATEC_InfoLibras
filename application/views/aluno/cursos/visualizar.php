<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Painel <small>Acesso de aluno</small></h1>
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
						echo('<h1>'. $curso['curso'] . ' ' . '<button id="button_voltar" class="btn btn-default">Voltar para o curso</button>' . '</h1>');
						echo('<p>' . nl2br($curso['descricao']) . '</p>');
					?>
					<div class="box box-primary">
                        <!--box-header-->
                        <div class="box-header">
							<h3 class="box-title">Lista de aulas deste curso</h3> 
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

										$link_visualizar 	= base_url() . index_page() . '/aluno/aulas/visualizar/' . $aula_id;

										echo('<tr>');
                                        echo('<td style="width:20px;">' . $aula_id . '</td>');
                                        echo('<td>');
                                            echo('<b>' . $aula_tema . '</b>');
                                            echo('<p>' . nl2br($aula_resumo) . '</p>');
                                        echo('</td>');
										echo('<td style="width:150px;" align="right">');
											echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_visualizar . '\'">Acessar</button>');
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
    document.getElementById("button_voltar").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/aluno/cursos')?>";
    }
</script>