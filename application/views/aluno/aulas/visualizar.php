<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Aulas 
                <small>Assistir.</small>
                <button id="button_voltar" class="btn btn-default">Voltar para o curso</button>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
                <li class="active">Cursos</li>
                <li class="active">Aulas</li>
                <li class="active">Visualizar</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Video</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php if ($aula['arquivo_video'] != NULL) { ?>

                                <?php echo($aula['arquivo_video']); ?>
                                <br>
                                <?php echo(str_replace('mp4','vtt',$aula['arquivo_video'])); ?>

                                <video 
                                    data-ht-src-type="webm"
                                    data-ht-src="<?php echo($aula['arquivo_video']); ?>"
                                    data-ht-subtitle-type="vtt"
                                    data-ht-subtitle="<?php echo(str_replace('mp4','vtt',$aula['arquivo_video'])); ?>">
                                </video>

                            <?php } else { echo('<p>Esta aula não tem vídeo.</p>');} ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informações desta aula</h3>
                        </div>
                        <div class="box-body">
                            <b><?php echo($aula['tema']); ?></b>
                            <p><?php echo($aula['resumo']); ?></p>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

<script type="text/javascript">
    document.getElementById("button_voltar").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/aluno/cursos/visualizar/' . $aula['id_curso'])?>";
    }
</script>

<script src="https://plugin.handtalk.me/web/latest/handtalk.min.js"></script>
<script src="<?php echo(base_url() . HAND_TALK_JS); ?>"></script>
<script>
    var ht = new HT({
        token: "<?php echo(HAND_TALK_API_TOKEN); ?>",
        videoEnabled: true
    });
</script>
