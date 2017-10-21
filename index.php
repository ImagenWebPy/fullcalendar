<?php
session_start();
if (empty($_SESSION['calendario']['login'])) {
    header('Location: login.php');
}
include './inc/config.php';
include './inc/Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$seleccion = '';
if (!empty($_SESSION['calendario']['marcas']))
    $seleccion = $_SESSION['calendario']['marcas'];
if ((empty($seleccion)) || ($seleccion == 'all')) {
    $events = $db->select("SELECT id, title, start, end, color, place, note, id_marca, file_pdf, file_xlsx FROM events");
} else {
    $events = $db->select("SELECT id, title, start, end, color, place, note, id_marca, file_pdf, file_xlsx FROM events where id_marca IN ($seleccion)");
}
#Marcas
$marcas = $db->select("SELECT id, descripcion, color FROM marcas where estado = 1;");
if (($seleccion == 'all') || (empty($seleccion))) {
    $selJquery = 0;
} else {
    $selJquery = $seleccion;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Calendario BTL</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- FullCalendar -->
        <link href='css/fullcalendar.css' rel='stylesheet' />
        <!-- FontAwesome -->
        <link href='font-awesome/css/font-awesome.min.css' rel='stylesheet' />
        <!-- HTML5 File upload -->
        <link href='plugins/html5fileupload/html5fileupload.css' rel='stylesheet' />
        <!-- Custom CSS -->
        <style>
            body {
                padding-top: 70px;
                /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
            }
            #calendar {
                max-width: 90%;
            }
            .col-centered{
                float: none;
                margin: 0 auto;
            }
            .pointer{cursor: pointer;}
            .pdfobject-container { height: 500px;}
            .pdfobject { border: 1px solid #666; }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Calendario BTL</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!--                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="#">Menu</a>
                                        </li>
                                    </ul>
                                </div>-->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                    <ul class="list-unstyled" style="position: fixed;">
                        <?php foreach ($marcas as $item): ?>
                            <li><i class="fa fa-square" aria-hidden="true" style="color:<?= $item['color']; ?>"></i> 
                                <input type="checkbox" name="chkMarca" value="<?= $item['id']; ?>">
                                <?= utf8_encode($item['descripcion']); ?>
                            </li>
                        <?php endforeach; ?>
                        <li><i class="fa fa-square" aria-hidden="true" style="color:"></i> <input type="checkbox" name="chkTodos" value="all">Todas</li>
                    </ul>
                </div>
                <div class="col-md-11 text-center">
                    <div id="calendar" class="col-centered">
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="addEvent.php" enctype="multipart/form-data">
                            <input type="hidden" value="" name="id_marca" id="idMarcaAdd">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Tìtulo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">Marca</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control selectAddColor" id="color">
                                            <option value="">Seleccionar</option>
                                            <?php foreach ($marcas as $item): ?>
                                                <option style="color:<?= $item['color']; ?>" data-id="<?= $item['id']; ?>" value="<?= $item['color']; ?>">&#9724; <?= utf8_encode($item['descripcion']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Lugar</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="place" class="form-control" id="place" placeholder="Lugar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Notas</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="note" class="form-control" id="note"></textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="start" class="col-sm-2 control-label">Fecha Inicio</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control" id="start" readonly>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="end" class="col-sm-2 control-label">Fecha Fin</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control" id="end" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Subir Archivo PDF</label>
                                    <div class="col-sm-10">
                                        <div class="html5fileupload demo_pdf_new" data-form="true" data-valid-extensions="pdf,PDF" style="width: 100%;">
                                            <input type="file" name="filePdf" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Subir Archivo Excel</label>
                                    <div class="col-sm-10">
                                        <div class="html5fileupload demo_xlsx_new" data-form="true" data-valid-extensions="xlsx,xls,XLSX,XLS" style="width: 100%;">
                                            <input type="file" name="fileExcel" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Agregar Evento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="editEventTitle.php">
                            <input type="hidden" value="" name="id_marca" id="idMarcaEdit">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Tìtulo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">Marca</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control selectEditColor" id="color">
                                            <option value="">Seleccionar</option>
                                            <?php foreach ($marcas as $item): ?>
                                                <option style="color:<?= $item['color']; ?>" data-id="<?= $item['id']; ?>" value="<?= $item['color']; ?>">&#9724; <?= utf8_encode($item['descripcion']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Lugar</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="place" class="form-control" id="place" placeholder="Lugar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Notas</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="note" class="form-control" id="note"></textarea>
                                    </div>
                                </div>
                                <div id="pdfViewer"></div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Subir Archivo PDF</label>
                                    <div class="col-sm-10">
                                        <div class="html5fileupload demo_pdf" data-id="" data-remove-done="true" data-autostart="true" data-valid-extensions="pdf,PDF" data-url="ajax/pdfUpload.php" style="width: 100%;">
                                            <input type="file" name="file" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"  style="display: none;" id="excelDiv">
                                    <div class="col-sm-10">
                                        <p>Archivo de Excel: <a href="#" id="excelLink"></a></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Subir Archivo Excel</label>
                                    <div class="col-sm-10">
                                        <div class="html5fileupload demo_xlsx" data-id="" data-remove-done="true" data-autostart="true" data-valid-extensions="xlsx,xls,XLSX,XLS" data-url="ajax/xlsxUpload.php" style="width: 100%;">
                                            <input type="file" name="file" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label class="text-danger"><input type="checkbox" name="delete"> Eliminar Evento</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" class="form-control" id="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- FullCalendar -->
        <script src='js/moment.min.js'></script>
        <script src='js/fullcalendar.min.js'></script>
        <!-- pdfobject -->
        <script src="plugins/pdfobject-master/pdfobject.min.js"></script>
        <!-- html5fileupload -->
        <script src="plugins/html5fileupload/html5fileupload.min.js"></script>
        <script>
            $(document).ready(function () {
                var selected = new Array();
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
//                    defaultDate: ,
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end) {
                        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalAdd').modal('show');
                    },
                    eventRender: function (event, element) {
                        element.bind('dblclick', function () {
                            $('#pdfViewer').html("");
                            $('#excelLink').html("");
                            $('#pdfViewer').removeClass();
                            $('#excelDiv').css("display", "none");
                            $('#ModalEdit #id').val(event.id);
                            $('#ModalEdit #title').val(event.title);
                            $('#ModalEdit #color').val(event.color);
                            $('#ModalEdit #place').val(event.place);
                            $('#ModalEdit #note').val(event.note);
                            $('#ModalEdit #idMarcaEdit').val(event.id_marca);
                            $('#ModalEdit').modal('show');
                            if (event.pdf.trim().length > 0) {
                                PDFObject.embed("archivos/pdf/" + event.pdf, "#pdfViewer");
                            }
                            if (event.xlsx.trim().length > 0) {
                                $('#excelDiv').css("display", "block");
                                $("#excelLink").attr("href", "archivos/xlsx/" + event.xlsx);
                                $("#excelLink").attr("download", event.xlsx);
                                $("#excelLink").html('<img src="img/logo-excel.png" class="img-responsive" style="width: 35px; display: inline-block;"> ' + event.xlsx);
                            }
                            $('.html5fileupload.demo_pdf').html5fileupload({
                                data: {id: event.id},
                                onAfterStartSuccess: function (response) {
                                    if (response['result'] == true)
                                        PDFObject.embed("archivos/pdf/" + response['filename'], "#pdfViewer");
                                }
                            });
                            $('.html5fileupload.demo_xlsx').html5fileupload({
                                data: {id: event.id},
                                onAfterStartSuccess: function (response) {
                                    $("#excelLink").attr("href", "archivos/xlsx/" + response['filename']);
                                    $("#excelLink").attr("download", response['filename']);
                                    $("#excelLink").html('<img src="img/logo-excel.png" class="img-responsive" style="width: 35px; display: inline-block;"> ' + response['filename']);
                                }
                            });
                        });
                    },
                    eventDrop: function (event, delta, revertFunc) { // si changement de position
                        edit(event);
                    },
                    eventResize: function (event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                        edit(event);
                    },
                    events: [
<?php
foreach ($events as $event):
    $start = explode(" ", $event['start']);
    $end = explode(" ", $event['end']);
    if ($start[1] == '00:00:00') {
        $start = $start[0];
    } else {
        $start = $event['start'];
    }
    if ($end[1] == '00:00:00') {
        $end = $end[0];
    } else {
        $end = $event['end'];
    }
    ?>
                            {
                                id: '<?php echo $event['id']; ?>',
                                id_marca: '<?php echo $event['id_marca']; ?>',
                                title: '<?php echo trim(utf8_encode($event['title'])); ?>',
                                place: '<?php echo trim(utf8_encode($event['place'])); ?>',
                                note: '<?php echo trim(utf8_encode($event['note'])); ?>',
                                start: '<?php echo $start; ?>',
                                end: '<?php echo $end; ?>',
                                color: '<?php echo $event['color']; ?>',
                                pdf: '<?php echo $event['file_pdf']; ?>',
                                xlsx: '<?php echo $event['file_xlsx']; ?>',
                            },
<?php endforeach; ?>
                    ]
                });
                function edit(event) {
                    start = event.start.format('YYYY-MM-DD HH:mm:ss');
                    if (event.end) {
                        end = event.end.format('YYYY-MM-DD HH:mm:ss');
                    } else {
                        end = start;
                    }

                    id = event.id;
                    Event = [];
                    Event[0] = id;
                    Event[1] = start;
                    Event[2] = end;
                    $.ajax({
                        url: 'editEventDate.php',
                        type: "POST",
                        data: {Event: Event},
                        success: function (rep) {
//                            if (rep == 'OK') {
//                                alert('Guardado');
//                            } else {
//                                alert('No se pudo guardar. Por favor vuelva a intertarlo.');
//                            }
                        }
                    });
                }

                $(document).on("change", "input[name=chkMarca]", function (e) {
                    if (e.handled !== true) // This will prevent event triggering more then once
                    {
                        $("input[name=chkMarca]:checked").each(function () {
                            selected.push($(this).val());
                        });
                        if ($('input[name="chkTodos"]').is(':checked')) {
                            $("input[name=chkMarca]:checked").each(function () {
                                $(this).prop('checked', false);
                            });
                            selected = [];
                            selected = ['all'];
                        }
                        if (selected.length != 0) {
                            $.ajax({
                                url: "ajax/seleccionarMarca.php",
                                type: "POST",
                                data: {marcas: selected},
                                dataType: "json"
                            }).done(function (data) {
                                location.reload();
                            });
                        }
                    }
                    e.handled = true;
                });
                $(document).on("change", ".selectAddColor", function (e) {
                    if (e.handled !== true) // This will prevent event triggering more then once
                    {
                        var actualValue = $("option:selected", this).attr("data-id");
                        $('#idMarcaAdd').val(actualValue);
                    }
                    e.handled = true;
                });
                $(document).on("change", ".selectEditColor", function (e) {
                    if (e.handled !== true) // This will prevent event triggering more then once
                    {
                        var actualValue = $("option:selected", this).attr("data-id");
                        $('#idMarcaEdit').val(actualValue);
                    }
                    e.handled = true;
                });
                var seleccionados = [<?= $selJquery; ?>];
                if (jQuery.inArray(0, seleccionados) != -1) {
                    $(":checkbox[value='all']").prop('checked', true);
                }
                if (jQuery.inArray(1, seleccionados) != -1) {
                    $(":checkbox[value='1']").prop('checked', true);
                }
                if (jQuery.inArray(2, seleccionados) != -1) {
                    $(":checkbox[value='2']").prop('checked', true);
                }
                if (jQuery.inArray(3, seleccionados) != -1) {
                    $(":checkbox[value='3']").prop('checked', true);
                }
                if (jQuery.inArray(4, seleccionados) != -1) {
                    $(":checkbox[value='4']").prop('checked', true);
                }
                if (jQuery.inArray(5, seleccionados) != -1) {
                    $(":checkbox[value='5']").prop('checked', true);
                }
                if (jQuery.inArray(6, seleccionados) != -1) {
                    $(":checkbox[value='6']").prop('checked', true);
                }
                if (jQuery.inArray(7, seleccionados) != -1) {
                    $(":checkbox[value='7']").prop('checked', true);
                }
                if (jQuery.inArray(8, seleccionados) != -1) {
                    $(":checkbox[value='8']").prop('checked', true);
                }
                if (jQuery.inArray(9, seleccionados) != -1) {
                    $(":checkbox[value='9']").prop('checked', true);
                }
                if (jQuery.inArray(10, seleccionados) != -1) {
                    $(":checkbox[value='10']").prop('checked', true);
                }
                if (jQuery.inArray(11, seleccionados) != -1) {
                    $(":checkbox[value='11']").prop('checked', true);
                }
                if (jQuery.inArray(12, seleccionados) != -1) {
                    $(":checkbox[value='12']").prop('checked', true);
                }
                $('.html5fileupload.demo_pdf_new').html5fileupload();
                $('.html5fileupload.demo_xlsx_new').html5fileupload();
            });
        </script>
    </body>
</html>
