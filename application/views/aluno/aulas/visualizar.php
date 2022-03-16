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
                <li class="active">Editar</li>
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
                                <video width="320" height="240" controls>
                                    <source src="<?php echo($aula['arquivo_video']); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                    <track label="Portugês" kind="subtitles" srclang="pt" src="<?php echo(str_replace('mp4','transcription',$aula['arquivo_video'])); ?>" default>
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
        location.href="<?php echo(base_url() . index_page() . '/professor/cursos/visualizar/' . $aula['id_curso'])?>";
    }
</script>

<script src="https://unpkg.com/cloudinary-core/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.min.js" type="text/javascript"></script>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  

<script type="text/javascript">  
    var cld = cloudinary.Cloudinary.new({ cloud_name: 'neros' });
    var demoplayer = cld.videoPlayer('doc-player', {
                        fontFace: 'Yatra One',
                        source: 'libras/video/tdxr80bjev5qnwskjvhp',
                        playlistWidget: {
                            direction: 'vertical',
                            total:5
                        }
                    }).width(400);
                    //demoplayer.source('libras/video/tdxr80bjev5qnwskjvhp');
                    //demoplayer.source(
                    //    'mymovie', {
                    //        info: { 
                    //            title: 'My Title', 
                    //            subtitle: 'Something about the video', 
                    //            description: 'More detail about the video' 
                    //        } 
                    //    });
</script>

