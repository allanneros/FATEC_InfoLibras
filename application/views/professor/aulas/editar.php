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
                <?php 
                    echo(Mensagens::lerMensagem());
                ?>
                <div class="col-sm-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class='fa fa-youtube-play'></i> Video</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php if ($aula['arquivo_video'] != NULL) { ?>
                                <?php 
                                    $video_url      = $aula['arquivo_video'];
                                    $video_url      = str_replace('http://','https://',$video_url);  

                                    $video_subtitle = $aula['arquivo_legenda']; 
                                    if ($video_subtitle)  {
                                        $video_subtitle = base_url() . index_page() . $video_subtitle;
                                        $video_subtitle = str_replace('http://','https://',$video_subtitle);  
                                    } else {
                                        $video_subtitle = str_replace('/video/upload','/raw/upload',$video_url);  
                                    }

                                    $video_subtitle = str_replace('.mp4','.srt',$video_subtitle);  
                                    $video_subtitle = str_replace('.webm','.srt',$video_subtitle);  
                                ?>
                                <video id="doc-player" width="100%" height="100%" controls>
                                    <source src="<?php echo($aula['arquivo_video']); ?>" type="video/mp4">
                                    <track label="Portuguese" kind="subtitles" 
                                            srclang="en" src="<?php echo($video_subtitle); ?>" default >
                                    <p>This browser does not support the video element.</p>
                                </video> 
                            <?php } else { echo('<p>Você ainda não incluiu vídeo dessa aula.</p>');} ?>

                            <?php //echo(form_open_multipart('professor/aulas/carregarVideo/' . $aula['id'] . '/' . $aula['id_curso']));?>
                            <form id="form_aula_video" name="form_aula_video" enctype="multipart/form-data" role="form" method="POST" action="<?php echo(base_url() . index_page() . '/professor/aulas/carregarVideo/' . $aula['id'] . '/' . $aula['id_curso']);?>">
                                <div class="form-group">
                                </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default" id="button_upload_video">Carregar video</button>
                            <button type="button" class="btn btn-danger" id="button_delete_video">Excluir video</button>
                        </div>
                        <?php echo(form_close());?>

                        <div id="overlay_video" class="overlay" style="display:none">
                            <i class="fa fa-refresh"></i>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class='fa fa-edit'></i> Editar</h3>
                        </div>
                        <!-- /.box-header -->
						<!-- form start -->
                        <!--<form id="form_aula" name="form_aula" enctype="multipart/form-data" role="form" method="POST" action="<?php echo(base_url() . index_page() . '/professor/aulas/editar/' . $aula['id'] . '/' . $aula['id_curso']);?>">-->
                        <form id="form_aula" name="form_aula" enctype="multipart/form-data" role="form" method="POST" action="">
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
                                    <label for="form_arquivo_legenda">Legenda</label>
                                    <input id="form_arquivo_legenda" type="file" name="form_arquivo_legenda">
                                    <p class="help-block">Legenda do vídeo</p>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="form_id_curso" name="form_id_curso" value="<?php echo($aula['id_curso']); ?>">
                                    <input type="hidden" class="form-control" id="form_arquivo_video" name="form_arquivo_video" value="<?php echo($aula['arquivo_video']); ?>">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="button_atualizar"><i class="fa fa-disk"></i> Gravar alterações</button>
                                <button type="button" class="btn btn-default" id="button_voltar"><i class="fa fa-arrow-left"></i> Voltar para o curso</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                        <div id="overlay_edit" class="overlay" style="display:none">
                            <i class="fa fa-refresh"></i>
                        </div>
                    </div><!-- /.box -->

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class='fa fa-file'></i> Material de apoio</h3>
                        </div>
                        <!-- /.box-header -->
						<!-- form start -->
                        <form id="form_material" name="form_material" enctype="multipart/form-data" role="form" method="POST" action="<?php echo(base_url() . index_page() . '/professor/aulas/carregarMaterial/' . $aula['id']);?>">
                            <div class="box-body">
                                <?php
                                    if ($aula_arquivos) {
                                        echo('<table class="table">');
                                        echo('<tr>');
                                        echo('<th>Descrição</th>');
                                        echo('<th wisth="25px"></th>');
                                        echo('</tr>');

                                        foreach($aula_arquivos as $arquivo) {
                                            if (isset($arquivo['nome'])) {
                                                echo('<tr>');
                                                echo('<td>');
                                                echo('<a href="' . base_url() . $arquivo['arquivo'] . '">');
                                                echo($arquivo['nome']);
                                                echo('</a>');
                                                echo('</td>');
                                                echo('<td>');
                                                echo('<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>');
                                                echo('</td>');
                                                echo('</tr>');
                                            }
                                        }

                                        echo('</table>');
                                    }
                                ?>
                                <hr>
                                <h4>Incluir material de apoio</h4>
                                <div class="form-group">
                                    <input type="hidden" id="form_id_aula" name="form_id_aula" value="<?php echo($aula['id']); ?>">

                                    <label for="form_arquivo_descricao">Descrição do arquivo</label>
                                    <input type="text" class="form-control" id="form_arquivo_descricao" name="form_arquivo_descricao">

                                    <label for="form_arquivo_material">Arquivo</label>
                                    <input id="form_arquivo_material" type="file" name="form_arquivo_material">
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="button_upload_material"><i class="fa fa-upload"></i> Incluir material de apoio</button>
                            </div>
                        <?php echo(form_close());?>
                        <!--</form> -->
                        <div id="overlay_material" class="overlay" style="display:none">
                            <i class="fa fa-refresh"></i>
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
                    ],
                    showAdvancedOptions: false,
                    cropping: false,
                    multiple: false,
                    defaultSource: "local"
                },
                    (error, result) => { 
                        if (!error && result && result.event === "success") { 
                            console.log('Done! Here is the image info: ', result.info); 
                            document.getElementById("form_arquivo_video").value = result.info.url;
                            //se tem video, atualiza a referencia na aula
                            if (result.info.url)  {
                                document.getElementById("form_aula").submit();
                            }
                        }
                    }
    );

</script>

