<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Aulas 
                <small>Utilize esta tela para gerenciar as aulas.</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Administra&ccedil;&atilde;o</a></li>
                <li class="active">Cursos</li>
                <li class="active">Aulas</li>
                <li class="active">Criar</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Criar</h3>
                        </div>
                        <!-- /.box-header -->
						<!-- form start -->
                        <?php echo(form_open_multipart('professor/aulas/criar/' . $id_curso));?>
                        <!--<form role="form" method="POST" action="">-->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="form_tema">Tema</label>
                                    <input type="text" class="form-control" id="form_tema" name="form_tema" placeholder="Informe o tema da aula">
                                </div>
                                <div class="form-group">
                                    <label for="form_descricao">Resumo</label>
                                    <textarea class="form-control" id="form_resumo" name="form_resumo" rows="3" placeholder="Descreva o resumo da aula"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="form_id_curso" name="form_id_curso" value="<?php echo($id_curso);?>">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Incluir</button>
                                <button type="button" class="btn btn-default" id="button_voltar">Voltar para o curso</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

<script type="text/javascript">
    document.getElementById("button_voltar").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/cursos/visualizar/' . $id_curso)?>";
    }
</script>
