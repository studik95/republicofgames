<?php
require_once '../../database/connector.php';

$id_account = (empty($_POST['account'])) ? null : htmlspecialchars($_POST['account']) ;
$id_game = (empty($_POST['game'])) ? null : htmlspecialchars($_POST['game']);
$rating = (empty($_POST['rating'])) ? null : htmlspecialchars($_POST['rating']);

try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $today = date("Y-m-d");
    $sql = "INSERT INTO rating (id_account,id_game,rating,date) VALUES (:id_account,:id_game,:rating,:date);";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_account' => $id_account, ":id_game" => $id_game, ":rating" => $rating, ":date" => $today));

    $pdo = null;
    header('Location: ../easyinsertdata.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}

