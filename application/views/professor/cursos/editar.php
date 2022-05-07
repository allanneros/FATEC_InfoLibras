<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="content-wrapper" style="min-height: 960.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Painel <small>Acesso de professor</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> In&iacute;cio</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-edit"></i> Editar</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- image -->
                    <img src="<?php echo(base_url() . '/uploads/curso/' . $curso['id'] . '.jpg');?>" style="max-width:200px; max-height:100px;">
                    <!-- /.image -->
                    <!-- form start -->
                    <?php echo(form_open_multipart('professor/cursos/editar/'.$curso['id']));?>
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
                            <label for="form_arquivo">Imagem</label>
                            <input id="form_arquivo" type="file" name="form_arquivo">
                            <p class="help-block">Ilustra&ccedil;&atilde;o para o curso</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" value="ok">Atualizar</button>
                        <button type="button" class="btn btn-default" id="button_voltar">Voltar</button>
                    </div>
                    <?php echo(form_close());?>
                    <!--</form> -->
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div>

<script type="text/javascript">
    document.getElementById("button_voltar").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/cursos');?>";
    }
</script>
