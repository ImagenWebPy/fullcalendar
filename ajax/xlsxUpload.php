<?php

include '../inc/config.php';
include '../inc/Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
if (!empty($_POST)) {
    $id = $_POST['data']['id'];
    $error = false;
    $dir = '../archivos/xlsx/';
    $serverdir = $dir;
    $tmp = explode(',', $_POST['file']);
    $file = base64_decode($tmp[1]);
    $ext = explode('.', $_POST['filename']);
    $extension = strtolower(end($ext));
    $filename = $id . '_' . $_POST['name'] . '.' . $extension;
    $filename = utf8_decode($filename);
    $handle = fopen($serverdir . $filename, 'w');
    fwrite($handle, $file);
    fclose($handle);
    $response = array(
        "result" => true,
        "filename" => $filename
    );
    $update = array(
        'file_xlsx' => $filename
    );
    $db->update('events', $update, "id = $id");
    echo json_encode($response);
}
?>