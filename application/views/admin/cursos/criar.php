<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
                        <?php echo(form_open('admin/cursos/criar'));?>
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
                                    <label for="form_id_usuario">Professor</label>
                                    <select id="form_id_usuario" name="form_id_usuario" class="form-control">
                                        <?php
                                            foreach($lista_usuarios as $usuario) { 
                                                $usuario_id 	= $usuario['id'];
                                                $usuario_nome   = $usuario['nome'];
                                                echo('<option value=\"' . $usuario_id . '\">' . $usuario_nome . '</option>');
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
                                <button type="submit" class="btn btn-primary">Incluir</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->