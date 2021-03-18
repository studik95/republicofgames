<?php
session_start();
require_once '../database/connector.php';


try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {

    $games_sql = "SELECT id_game,title FROM game;";
    $sth = $pdo->query($games_sql);
    $result = $sth->fetchAll(PDO::FETCH_OBJ);

    $games = array();
    foreach ($result as $item)
    {
        $game = (array) $item;
        array_push($games,$game);
    }

    $_SESSION['list_of_games'] = $games;

    $pdo = null;

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>
<body>

    <div class="container container--game">
        <?php require_once 'forms/game.php' ?>
        <div class="wrapper wrapper--column">
            <?php require_once 'forms/screen.php' ?>
            <?php require_once 'forms/trailer.php' ?>
        </div>
        <div class="wrapper wrapper--column">
            <?php require_once 'forms/tag.php' ?>
            <?php require_once 'forms/premiere.php' ?>
        </div>
        <div class="wrapper wrapper--column">
            <?php require_once 'forms/addition.php' ?>
            <?php require_once 'forms/continuation.php' ?>
        </div>
    </div>
    <div class="container container--user">
        <div class="wrapper wrapper--column">
            <?php require_once 'forms/user.php' ?>
        </div>
        <div class="wrapper wrapper--column">
            <?php require_once 'forms/rating.php' ?>
        </div>
        <div class="wrapper wrapper--column">
            <?php require_once 'forms/review.php' ?>
        </div>
    </div>

</body>
</html>