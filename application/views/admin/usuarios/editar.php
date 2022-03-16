<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ($usuario==NULL) {
    echo('Não há registros para exibir.');
} else {
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Usu&aacute;rios
                <small>Utilize esta tela para gerenciar os usu&aacute;rios do sistema.</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Administra&ccedil;&atilde;o</a></li>
                <li class="active">Usu&aacute;rios</li>
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
                        <?php echo(form_open('admin/usuarios/editar/'.$usuario['id']));?>
                        <!--<form role="form" method="POST" action="">-->
                            <div class="box-body">
                                <input type="hidden" id="form_id" name="form_id" value="<?php echo($usuario['id']); ?>">
                                <div class="form-group">
                                    <label for="form_nome">Nome</label>
                                    <input type="text" class="form-control" id="form_nome" name="form_nome" placeholder="Informe o nome" value="<?php echo($usuario['nome']);?>">
                                </div>
                                <div class="form-group">
                                    <label for="form_login">e-Mail</label>
                                    <input type="email" class="form-control" id="form_login" name="form_login" placeholder="Password" value="<?php echo($usuario['login']);?>">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="form_ativo" name="form_ativo" value="-1" <?php echo($usuario['ativo'] == -1?'checked':''); ?>> Ativo
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="form_admin" name="form_admin" value="-1" <?php echo($usuario['admin'] == -1?'checked':''); ?>> Administrador
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="form_professor" name="form_professor" value="-1" <?php echo($usuario['professor'] == -1?'checked':''); ?>> Professor
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->
<?php } ?>