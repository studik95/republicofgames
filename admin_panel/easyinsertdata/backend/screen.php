<?php

require_once '../../database/connector.php';

$id_game = (empty($_POST['game'])) ? null :  htmlspecialchars(trim($_POST['game']));
$screen = (empty($_POST['screen'])) ? null :  htmlspecialchars(trim($_POST['screen']));


try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "INSERT INTO screen (id_game,screen) VALUES (:id_game,:screen);";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_game' => $id_game,':screen' => $screen));
    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}
