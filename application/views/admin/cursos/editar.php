<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

if ($curso==NULL) {
    echo('Não há registros para exibir.');
} else {
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Cursos
                <small>Utilize esta tela para gerenciar os cursos criados pelos professores.</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Administra&ccedil;&atilde;o</a></li>
                <li class="active">Cursos</li>
                <li class="active">Editar</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar</h3>
                        </div>
                        <!-- /.box-header -->
						<!-- form start -->
                        <?php echo(form_open('admin/cursos/editar/'.$curso['id']));?>
                        <!--<form role="form" method="POST" action="">-->
                            <div class="box-body">
                                <input type="hidden" id="form_id" name="form_id" value="<?php echo($curso['id']); ?>">
                                <div class="form-group">
                                    <label for="form_curso">Curso</label>
                                    <input type="text" class="form-control" id="form_curso" name="form_curso" placeholder="Informe o nome" value="<?php echo($curso['curso']);?>">
                                </div>
                                <div class="form-group">
                                    <label for="form_descricao">Descri&ccedil;&atilde;o</label>
                                    <textarea class="form-control" id="form_descricao" name="form_descricao" rows="3" placeholder="Descreva o curso"><?php echo($curso['descricao']);?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_id_usuario">Professor</label>
                                    <select id="form_id_usuario" name="form_id_usuario" class="form-control">
                                        <?php
                                            foreach($lista_usuarios as $usuario) { 
                                                $usuario_id 	= $usuario['id'];
                                                $usuario_nome   = $usuario['nome'];
                                                //echo(' usuario_id: '. $usuario_id);
                                                //echo(' id_usuario: '. $curso['id_usuario']);
                                                if ($usuario_id == $curso['id_usuario']) { 
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo('<option value=' . $usuario_id . ' ' . $selected . '>' . $usuario_nome . '</option>');
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagem</label>
                                    <input id="exampleInputFile" type="file">
                                    <p class="help-block">Ilustra&ccedil;&atilde;o para o curso</p>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                                <button type="button" class="btn btn-default" id="button_voltar">Voltar</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                        <script type="text/javascript">
                            document.getElementById("button_voltar").onclick = function(){
                                location.href="<?php echo(base_url() . index_page() . '/admin/cursos');?>";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php } ?>