<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Painel<small>Acesso de aluno</small></h1>
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
						echo(Mensagens::lerMensagem());
					?>
					<div class="box box-primary">
                        <!--box-header-->
                        <div class="box-header">
							<h3 class="box-title">Cursos</h3>  
                        </div>
                        <!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<?php
								if ($lista_cursos==NULL) {
									echo('Não há registros para exibir.');
								} else {
							?>
							<table class="table">
								<tr>
									<th style="width:20px;">ID</th>
									<th>Curso</th>
									<th style="width:20px;"></th>
								</tr>
								<!--loop nos registros-->
								<?php
									foreach($lista_cursos as $curso) { 
										//info do curso
										$id 		= $curso['id'];
										$curso_nome = $curso['curso'];
										$descricao	= $curso['descricao'];
										$professor	= $curso['nome'];

										//links
										$link_visualizar	= base_url() . index_page() . '/aluno/cursos/visualizar/' . $id;
										$link_matricular	= base_url() . index_page() . '/aluno/cursos/matricular/' . $id;

										echo('<tr>');
                                        echo('<td>' . $id . '</td>');
                                        echo('<td>');
											echo('<b><a href="' . $link_visualizar . '">' . $curso_nome . '</a></b>');
											echo('<br>');
											echo('<b><i>' . $professor . '</i></b>');
											echo('<p>' . nl2br($descricao)	. '</p>');
                                        echo('</td>');
										echo('<td>');
											echo('<button class="btn btn-sm btn-primary" onclick="window.location=\'' . $link_matricular . '\'">Inscrever</button>');
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
