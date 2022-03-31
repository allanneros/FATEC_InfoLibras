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
                                </video> 
                            <?php } else { echo('<p>Você ainda não incluiu vídeo dessa aula.</p>');} ?>

                            <?php //echo(form_open_multipart('professor/aulas/carregarVideo/' . $aula['id'] . '/' . $aula['id_curso']));?>
                            <form id="form_aula_video" name="form_aula_video" role="form" method="POST" action="<?php echo(base_url() . index_page() . '/professor/aulas/carregarVideo/' . $aula['id'] . '/' . $aula['id_curso']);?>">
                                <div class="form-group">
                                    <!--<label for="form_arquivo_video">Video</label>-->
                                    <input type="hidden" class="form-control" id="form_arquivo_video" name="form_arquivo_video" value="<?php echo($aula['arquivo_video']); ?>">
                                    <button type="button" class="btn btn-default" id="button_upload_video">Carregar video</button>
                                    <button type="button" class="btn btn-danger" id="button_delete_video">Excluir video</button>
                                    <!--   
                                    <button type="submit" class="btn btn-primary" id="button_upload" value="Upload">Upload</button> 
                                    -->
                                </div>
                            <?php echo(form_close());?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar</h3>
                        </div>
                        <!-- /.box-header -->
						<!-- form start -->
                        <?php //echo(form_open_multipart('professor/aulas/editar/' . $aula['id'] . '/' . $aula['id_curso']));?>
                        <form name="form_aula" role="form" method="POST" action="<?php echo('professor/aulas/editar/' . $aula['id'] . '/' . $aula['id_curso']);?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="form_tema">Tema</label>
                                    <input type="text" class="form-control" id="form_tema" name="form_tema" placeholder="Informe o tema da aula" value="<?php echo($aula['tema']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="form_descricao">Resumo</label>
                                    <textarea class="form-control" id="form_resumo" name="form_resumo" rows="3" placeholder="Descreva o resumo da aula"><?php echo($aula['resumo']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="form_id_curso" name="form_id_curso" value="<?php echo($aula['id_curso']); ?>">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="button_atualizar">Atualizar</button>
                                <button type="button" class="btn btn-default" id="button_voltar">Voltar para o curso</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

<script type="text/javascript">
    document.getElementById("button_voltar").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/cursos/visualizar/' . $aula['id_curso'])?>";
    }
    document.getElementById("button_delete_video").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/aulas/excluirVideo/' . $aula['id'] . '/' . $aula['id_curso'])?>";
    }

</script>

<script src="https://unpkg.com/cloudinary-core/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.min.js" type="text/javascript"></script>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  

<script type="text/javascript">
    document.getElementById("button_upload_video").addEventListener("click", function(){
        myWidget.open();
        }, false);


</script>

<script type="text/javascript">  
    var myWidget = cloudinary.createUploadWidget({
                    cloudName: 'neros', 
                    uploadPreset: 'libras_video', 
                    sources: [
                        "local",
                        "url"
                    ],
                    showAdvancedOptions: false,
                    cropping: false,
                    multiple: false,
                    defaultSource: "local"
                },
                    (error, result) => { 
                        if (!error && result && result.event === "success") { 
                            console.log('Done! Here is the image info: ', result.info); 
                            //document.getElementById("form_arquivo_video").value = JSON.stringify(result, null, 4);
                            document.getElementById("form_arquivo_video").value = result.info.url;
                            //se tem video, atualiza a referencia na aula
                            if (result.info.url)  {
                                window.alert('submit do form');
                                window.alert(String(result.info.url));
                                window.alert("<?php echo(base_url() . index_page() . '/professor/aulas/carregarVideo/' . $aula['id'] . '/' . $aula['id_curso'] . '/')?>" + '"' + String(result.info.url) + '"');
                                document.getElementById("form_aula_video").submit();
                                //document.form_aula_video.submit();
                                //document.forms["form_aula_video"].submit();
                            }
                        }
                    }
    );

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

