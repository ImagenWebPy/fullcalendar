<?php

require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM events WHERE id = $id";
    $query = $bdd->prepare($sql);
    if ($query == false) {
        print_r($bdd->errorInfo());
        die('Erreur prepare');
    }
    $res = $query->execute();
    if ($res == false) {
        print_r($query->errorInfo());
        die('Erreur execute');
    }
} elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $id_marca = $_POST['id_marca'];
    $title = $_POST['title'];
    $place = $_POST['place'];
    $note = $_POST['note'];
    $color = $_POST['color'];
    $monto = $_POST['monto'];
    $monto = str_replace(',', '', $monto);
    $monto = str_replace('.', '', $monto);
    $sql = "UPDATE events SET  title = '$title', color = '$color', place = '$place', note = '$note', id_marca = '$id_marca', monto = '$monto' WHERE id = $id ";
    $query = $bdd->prepare($sql);
    if ($query == false) {
        print_r($bdd->errorInfo());
        die('Erreur prepare');
    }
    $sth = $query->execute();
    if ($sth == false) {
        print_r($query->errorInfo());
        die('Erreur execute');
    }
}
header('Location: index.php');
?>
