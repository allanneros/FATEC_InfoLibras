    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-xs-12">
                <?php 
                    if (isset($retorno)) {
                        if ($retorno) {
                            echo('<div class="alert alert-success alert-dismissible">');
                            echo('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
                            echo('<h4><i class="icon fa fa-check"></i> Aviso</h4>');
                            echo('sucesso.');
                            echo('</div>');
                        }
                    }
                ?>
                <div class="box box-success">
                    <!--box-header-->
                    <div class="box-header">
                        <h3 class="box-title">Cursos concluídos</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive no-padding">
                        <?php
                            if ($lista_cursos_concluidos==NULL) {
                                echo('Não há registros para exibir.');
                            } else {
                        ?>
                        <table class="table">
                            <tr>
                                <th style="width:20px;">ID</th>
                                <th>Curso</th>
                                <th style="width:20px;"></th>
                            </tr>
                            <!--loop nos registros-->
                            <?php
                                foreach($lista_cursos_concluidos as $curso) { 
                                    //info do curso
                                    $id 		= $curso['id'];
                                    $curso_nome = $curso['curso'];
                                    $descricao	= $curso['descricao'];
                                    $professor	= $curso['nome'];

                                    //links
                                    $link_visualizar	= base_url() . index_page() . '/professor/cursos/visualizar/' . $id;
                                    $link_editar 		= base_url() . index_page() . '/professor/cursos/editar/' . $id;
                                    $link_ativar 		= base_url() . index_page() . '/professor/cursos/ativar/' . $id . '/';
                                    $link_excluir 		= base_url() . index_page() . '/professor/cursos/excluir/' . $id;

                                    echo('<tr>');
                                    echo('<td>' . $id . '</td>');
                                    echo('<td>');
                                        echo('<b><a href="' . $link_visualizar . '">' . $curso_nome . '</a></b>');
                                        echo('<br>' . nl2br($professor)	. '<br>');
                                        echo('<p>' . nl2br($descricao)	. '</p>');
                                    echo('</td>');
                                    echo('<td>');
                                        echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_editar . '\'">Editar</button>');
                                    echo('</td>');
                                    echo('</tr>');
                                }
                            ?>
                        </table>
                        <?php } ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
<!--</div>-->

<script type="text/javascript">
    document.getElementById("button_incluir").onclick = function(){
        location.href="<?php echo(base_url() . index_page() . '/professor/cursos/criar')?>";
    }
</script>