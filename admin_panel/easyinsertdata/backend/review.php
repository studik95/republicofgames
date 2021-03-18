<?php
require_once '../../database/connector.php';

$id_account = (empty($_POST['account'])) ? null : htmlspecialchars($_POST['account']) ;
$id_game = (empty($_POST['game'])) ? null : htmlspecialchars($_POST['game']);
$review = (empty($_POST['review'])) ? null : htmlspecialchars($_POST['review']);

try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $today = date("Y-m-d");
    $sql = "INSERT INTO review (id_account,id_game,review,date) VALUES (:id_account,:id_game,:review,:date);";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_account' => $id_account, ":id_game" => $id_game, ":review" => $review, ":date" => $today));

    $pdo = null;
    header('Location: ../easyinsertdata.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}

