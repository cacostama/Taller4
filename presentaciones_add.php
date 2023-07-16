<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/lp3/favicon.ico">
    <title>Taller4</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
    session_start();/*Reanudar sesion*/
    require 'menu/css_lte.ctp'; ?>
    <!--ARCHIVOS CSS-->

</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <?php require 'menu/header_lte.ctp'; ?>
        <!--CABECERA PRINCIPAL-->
        <?php require 'menu/toolbar_lte.ctp'; ?>
        <!--MENU PRINCIPAL-->
        <div class="content-wrapper">1
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-plus"></i>
                                <h3 class="box-title">Agregar Presentacion</h3>
                                <div class="box-tools">
                                    <a href="Presentaciones_index.php" class="btn btn-primary btn-sm" data-title="Volver" rel="tooltip">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <form action="presentaciones_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="1" />
                                        <input type="hidden" name="vpre_id" value="0" />
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Cod. Presentacion:</label>
                                        <div class="col-lg-4 col-md-5 col-sm-5">
                                            <input type="text" name="vpre_id" class="form-control" required="" autofocus="" />
                                        </div>
                                    </div>

                                    <!-- AGREGAR LISTA DESPLEGABLE Medida -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Medidas:</label>
                                        <div class="col-lg-5 col-md-5 col-sm-5">
                                            <div class="input-group">
                                                <?php $medidas = consultas::get_datos("select * from medidas order by med_descri"); ?>
                                                <select class="form-control select2" name="vmed_id" required="">
                                                    <option value="">Seleccione una marca</option>
                                                    <?php foreach ($medidas as $medida) { ?>
                                                        <option value="<?php echo $medida['med_id']; ?>"><?php echo $medida['med_descri']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="input-group-btn btn-flat">
                                                    <a class="btn btn-primary" data-title="Agregar Medida" rel="tooltip" data-placement="top" data-toggle="modal" data-target="#registrar">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIN LISTA DESPLEGABLE Medida -->



                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Descripción:</label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" name="vart_descri" class="form-control" required="" />
                                        </div>
                                    </div>


                                    <!--div class="form-group">
                                        <label class="control-label col-sm-2">Precio Costo:</label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="number" name="vart_precioc" class="form-control" min="0" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Precio Venta:</label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="number" name="vart_preciov" class="form-control" min="0" />
                                        </div>
                                    </div-->



                                    <!-- AGREGAR LISTA DESPLEGABLE IMPUESTO -->
                                    <!--div class="form-group">
                                        <label class="control-label col-lg-2">Impuesto:</label>
                                        <div class="col-lg-5 col-md-5 col-sm-5">
                                            <div class="input-group">
                                                <?php $tipos = consultas::get_datos("select * from tipo_impuesto order by tipo_cod"); ?>
                                                <select class="form-control select2" name="vtipo_cod" required="">
                                                    <option value="">Seleccione un impuesto</option>
                                                    <?php foreach ($tipos as $tipo) { ?>
                                                        <option value="<?php echo $tipo['tipo_cod']; ?>"><?php echo $tipo['tipo_descri']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="input-group-btn btn-flat">
                                                    <a class="btn btn-primary" data-title="Agregar Impuesto " rel="tooltip" data-placement="top" data-toggle="modal" data-target="#registrar2">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div-->
                                    <!-- FIN LISTA DESPLEGABLE MARCA -->
                                </div>
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default" data-title="Cancelar" rel="tooltip">
                                        <i class="fa fa-remove"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-primary pull-right" data-title="Guardar" rel="tooltip">
                                        <i class="fa fa-floppy-o"></i> Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'menu/footer_lte.ctp'; ?>
        <!--ARCHIVOS JS-->

        <!-- MODAL REGISTRAR -->
        <div class="modal fade" id="registrar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">x</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> <strong>Registrar Marca</strong></h4>
                    </div>
                    <form action="marca_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                        <input type="hidden" name="accion" value="4">
                        <input type="hidden" name="vmar_cod" value="0">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="vmar_descri" class="form-control" required="" autofocus="" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" data-dismiss="modal" class="btn btn-default pull-left">
                                <i class="fa fa-remove"></i> Cerrar</button>
                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fa fa-floppy-o"></i> Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FIN MODAL REGISTRAR -->
    </div>
    <?php require 'menu/js_lte.ctp'; ?>
    <!--ARCHIVOS JS-->
</body>

</html>