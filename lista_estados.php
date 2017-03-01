<?php

function __autoload($class_name) {
    require_once './classes/' . $class_name . '.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        //CABEÇALHO
        include './cabecalho.php';
        ?>
        <?php
        $estado = new Estados();
        ?>
        <div class="row">
            <div class="col-lg-3">   

            </div>
            <div class="col-lg-9">

            </div>
        </div>
        <!--==================CABEÇALHO====================---->
        <div class="container theme-showcase" role="main">
            <div class="sidebar" data-example-id="simple-nav-stacked">
                <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
                    <li role="presentation" class="active"><a href="#">Home</a></li>
                    <li role="presentation"><a href="#">Profile</a></li>
                    <li role="presentation"><a href="#">Messages</a></li>
                </ul>
            </div>  
            <!-- /.container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <?php
                        //FUNÇÃO PARA EXCLUIR
                        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

                            $id = (int) $_GET['id'];
                            if ($estado->delete($id)) {
                                echo "<div class='alert alert-success' role='alert'>Excluido com sucesso!</div>";
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>Erro ao excluir!</div>";
                            }

                        endif;
                        ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="page-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <a href="cadastrar_estado.php" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>UF</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($estado->findAll() as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value->id; ?></td>
                                            <td><?php echo $value->nome; ?></td>
                                            <td><?php echo $value->uf; ?></td>
                                            <td>
                                                <?php echo "<a class='btn btn-info' href='cadastrar_estado.php?acao=editar&id=" . $value->id . "'><i class='glyphicon glyphicon-edit'></i></a>"; ?>
                                            </td>
                                            <td>
                                                <?php echo "<a  class='btn btn-danger' href='lista_estados.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><b class='glyphicon glyphicon-remove'></b</a>"; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true, language: pt-br;
            });
        });
    </script>
    <?php
    include './rodape.php';
    ?>
    <!--==================RODAPE====================---->
    <script src="funcoes/estado/funcoesestado.js"></script>
</body>
</html>