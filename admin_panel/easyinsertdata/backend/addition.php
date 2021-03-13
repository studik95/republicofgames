<?php

require_once '../../database/connector.php';

$addition = (empty($_POST['addition'])) ? null :  htmlspecialchars(trim($_POST['addition']));
$id_game = (empty($_POST['game'])) ? null :  htmlspecialchars(trim($_POST['game']));



try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "UPDATE game SET addition = :id_game WHERE id_game = :addition;";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_game' => $id_game, ':addition' => $addition));
    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}

