<?php

require_once '../../database/connector.php';

$continuation = (empty($_POST['continuation'])) ? null :  htmlspecialchars(trim($_POST['continuation']));
$id_game = (empty($_POST['game'])) ? null :  htmlspecialchars(trim($_POST['game']));



try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "UPDATE game SET continuation = :id_game WHERE id_game = :continuation;";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_game' => $id_game,':continuation' => $continuation));
    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}

