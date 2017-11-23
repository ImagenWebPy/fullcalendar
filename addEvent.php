<?php

include 'inc/config.php';
include 'inc/Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])) {
    $id_marca = $_POST['id_marca'];
    $title = $_POST['title'];
    $place = $_POST['place'];
    $note = $_POST['note'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $color = $_POST['color'];
    $moneda = $_POST['moneda'];
    $monto = $_POST['monto'];
    $monto = str_replace(',', '', $monto);
    $monto = str_replace('.', '', $monto);
    $db->insert('events', array(
        'id_moneda' => $moneda,
        'title' => $title,
        'start' => $start,
        'end' => $end,
        'color' => $color,
        'place' => $place,
        'note' => $note,
        'id_marca' => $id_marca,
        'monto' => $monto,
    ));
    $idEvent = $db->lastInsertId();
    $serverdir = 'archivos/pdf/';
    if (!empty($_FILES['filePdf']['name'])) {
        $newname = $idEvent . '_' . utf8_decode($_FILES['filePdf']['name']);
        $fname = $newname;
        $contents = file_get_contents($_FILES['filePdf']['tmp_name']);
        $handle = fopen($serverdir . $fname, 'w');
        fwrite($handle, $contents);
        fclose($handle);
        $update = array(
            'file_pdf' => $fname
        );
        $db->update('events', $update, "id = $idEvent");
    }
    $serverdir = 'archivos/xlsx/';
    if (!empty($_FILES['fileExcel']['name'])) {
        $newname = $idEvent . '_' . utf8_decode($_FILES['fileExcel']['name']);
        $fname = $newname;
        $contents = file_get_contents($_FILES['fileExcel']['tmp_name']);
        $handle = fopen($serverdir . $fname, 'w');
        fwrite($handle, $contents);
        fclose($handle);
        $update = array(
            'file_xlsx' => $fname
        );
        $db->update('events', $update, "id = $idEvent");
    }
    $serverdir = 'archivos/img/';
    if (!empty($_FILES['fileImg']['name'])) {
        $newname = $idEvent . '_' . utf8_decode($_FILES['fileImg']['name']);
        $fname = $newname;
        $contents = file_get_contents($_FILES['fileImg']['tmp_name']);
        $handle = fopen($serverdir . $fname, 'w');
        fwrite($handle, $contents);
        fclose($handle);
        $update = array(
            'img' => $fname
        );
        $db->update('events', $update, "id = $idEvent");
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
