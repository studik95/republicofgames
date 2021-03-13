<?php

require_once '../../database/connector.php';

$id_game = (empty($_POST['game'])) ? null :  htmlspecialchars(trim($_POST['game']));
$trailer = (empty($_POST['trailer'])) ? null :  htmlspecialchars(trim($_POST['trailer']));


try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "INSERT INTO trailer (id_game,trailer) VALUES (:id_game,:trailer);";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_game' => $id_game,':trailer' => $trailer));
    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}

