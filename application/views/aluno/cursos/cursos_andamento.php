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
                <div class="box box-primary">
                    <!--box-header-->
                    <div class="box-header">
                        <h3 class="box-title">Cursos em andamento</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive no-padding">
                        <?php
                            if ($lista_cursos_andamento==NULL) {
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
                                foreach($lista_cursos_andamento as $curso) { 
                                    //info do curso
                                    $id 		= $curso['id'];
                                    $curso_nome = $curso['curso'];
                                    $descricao	= $curso['descricao'];
                                    $professor	= $curso['nome'];

                                    //links
                                    $link_visualizar	= base_url() . index_page() . '/aluno/cursos/visualizar/' . $id;

                                    echo('<tr>');
                                    echo('<td>' . $id . '</td>');
                                    echo('<td>');
                                        echo('<b>' . $curso_nome . '</b>');
                                        echo('<br>' . nl2br($professor)	. '<br>');
                                        echo('<p>' . nl2br($descricao)	. '</p>');
                                    echo('</td>');
                                    echo('<td>');
                                        echo('<button class="btn btn-sm btn-default" onclick="window.location=\'' . $link_visualizar . '\'">Continuar</button>');
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
