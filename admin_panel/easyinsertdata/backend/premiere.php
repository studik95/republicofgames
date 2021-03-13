<?php

require_once '../../database/connector.php';

$id_game = (empty($_POST['game'])) ? null :  htmlspecialchars(trim($_POST['game']));
$platform = (empty($_POST['platform'])) ? null :  htmlspecialchars(trim($_POST['platform']));
$date = (empty($_POST['date'])) ? null :  htmlspecialchars(trim($_POST['date']));

try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = "INSERT INTO premiere (id_game,platform,date) VALUES (:id_game,:platform,:date);";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_game' => $id_game,':platform' => $platform,':date' => $date));
    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}