<?php

session_start();
if (!empty($_POST)) {
    $marcas = $_POST['marcas'];
    $marcas = implode(',', $marcas);
    $_SESSION['calendario']['marcas'] = $marcas;
}
header('Content-type: application/json; charset=utf-8');
echo json_encode(TRUE);
