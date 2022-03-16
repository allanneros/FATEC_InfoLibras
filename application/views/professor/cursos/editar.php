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
                <h3 class="box-title">Editar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <?php echo(form_open('professor/cursos/editar/'.$curso['id']));?>
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
                      location.href="<?php echo(base_url() . index_page() . '/professor/cursos');?>";
                  }
              </script>
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