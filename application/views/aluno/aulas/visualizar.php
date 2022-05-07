<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?php echo(base_url() . HAND_TALK_JS); ?>"></script>
<script src="<?php echo(base_url() . 'includes/handtalk/ht-video-player.min.js'); ?>"></script>

    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Assista a aula 
                <small></small>
                <button id="button_voltar" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar para o curso</button>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-house"></i> Início</a></li>
                <li class="active">Cursos</li>
                <li class="active">Aulas</li>
                <li class="active"><?php echo($aula['tema']); ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<!-- Your Page Content Here -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo($aula['tema']); ?></h3>
                        </div>

                        <div class="box-body">
                            <?php 
                                if ($aula['arquivo_video'] != NULL) { 
                                $video_url      = $aula['arquivo_video'];
                                $video_url      = str_replace('http://','https://',$video_url);  

                                $video_subtitle = $aula['arquivo_legenda']; 
                                if ($video_subtitle)  {
                                    $video_subtitle = str_replace('http://','https://',$video_subtitle);  
                                } else {
                                    $video_subtitle = str_replace('/video/upload','/raw/upload',$video_url);  
                                }

                                $video_subtitle = str_replace('.mp4','.srt',$video_subtitle);  
                                $video_subtitle = str_replace('.webm','.srt',$video_subtitle);  

                                echo('<video ');
                                echo('data-ht-src-type="webm" ');
                                echo('data-ht-src="' . $video_url . '" ');
                                echo('data-ht-subtitle-type="srt"');
                                echo('data-ht-subtitle="' . $video_subtitle . '">');
                                echo('</video>');

                                } else { 
                                    echo('<p>Esta aula não tem vídeo.</p>');
                                } 
                            ?>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <?php echo($aula['resumo']); ?>
                        </div>

                    </div><!-- /.box -->

                </div><!-- /.col -->
                <div class="col-sm-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-file"></i> Material de apoio</h3>
                        </div>
                        <div class="box-body">
                        <?php
                            if ($aula_arquivos) {
                                echo('<table class="table">');
                                echo('<tr>');
                                echo('<th>Arquivo</th>');
                                echo('</tr>');

                                foreach($aula_arquivos as $arquivo) {
                                    if (isset($arquivo['nome'])) {
                                        echo('<tr>');
                                        echo('<td>');
                                        echo('<a href="' . base_url() . $arquivo['arquivo'] . '">');
                                        echo($arquivo['nome']);
                                        echo('</a>');
                                        echo('</td>');
                                        echo('</tr>');
                                    }
                                }

                                echo('</table>');
                            }
                        ?>

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

<!--
<script src="https://plugin.handtalk.me/web/latest/handtalk.min.js"></script>
<script src="<?php echo(base_url() . HAND_TALK_JS); ?>"></script>
<script src="<?php echo(base_url() . 'includes/handtalk/ht-video-player.min.js'); ?>"></script>
-->
<script>
    var ht = new HT({
        token: "<?php echo(HAND_TALK_API_TOKEN); ?>",
        videoEnabled: true
    });
</script>
