<?php

require_once '../../database/connector.php';

$id_game = (empty($_POST['game'])) ? null :  htmlspecialchars(trim($_POST['game']));
$tag = (empty($_POST['tag'])) ? null :  htmlspecialchars(trim($_POST['tag']));


try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "INSERT INTO tag (id_game,tag) VALUES (:id_game,:tag);";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_game' => $id_game,':tag' => $tag));
    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}
