<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Painel <small>Acesso de professor</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Administra&ccedil;&atilde;o</a></li>
                <li class="active">Cursos</li>
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
                        <?php echo(form_open('professor/cursos/criar'));?>
                        <!--<form role="form" method="POST" action="">-->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="form_curso">Curso</label>
                                    <input type="text" class="form-control" id="form_curso" name="form_curso" placeholder="Informe o nome">
                                </div>
                                <div class="form-group">
                                    <label for="form_descricao">Descri&ccedil;&atilde;o</label>
                                    <textarea class="form-control" id="form_descricao" name="form_descricao" rows="3" placeholder="Descreva o curso"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="form_id_usuario" name="form_id_usuario" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagem</label>
                                    <input id="exampleInputFile" type="file">
                                    <p class="help-block">Ilustra&ccedil;&atilde;o para o curso</p>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Incluir</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                    </div>
				</div>
			</div>
        </section><!-- /.content -->
    </div>

<script type="text/javascript">
    //document.getElementById("button_incluir").onclick = function(){
    //    location.href="<?php //echo(base_url() . index_page() . '/professor/cursos/criar')?>";
    //}
</script>                    