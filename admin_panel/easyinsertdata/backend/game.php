<?php

require_once '../../database/connector.php';

//information about game
$title = (empty(htmlspecialchars(trim($_POST['title']))) ) ? null :  htmlspecialchars(trim($_POST['title']));
$title_pl = (empty(htmlspecialchars(trim($_POST['title_pl'])))) ? null : htmlspecialchars(trim($_POST['title_pl']));
$producer = (empty(htmlspecialchars(trim($_POST['producer'])))) ? null : htmlspecialchars(trim($_POST['producer']));
$publisher = (empty(htmlspecialchars(trim($_POST['publisher'])))) ? null : htmlspecialchars(trim($_POST['publisher']));
$genre = (empty(htmlspecialchars(trim($_POST['genre'])))) ? null : htmlspecialchars(trim($_POST['genre']));
$cover = (empty(htmlspecialchars(trim($_POST['cover'])))) ? null : htmlspecialchars(trim($_POST['cover']));
$continuation = (empty(htmlspecialchars(trim($_POST['continuation'])))) ? null : htmlspecialchars(trim($_POST['continuation']));
$addition = (empty(htmlspecialchars(trim($_POST['addition'])))) ? null : htmlspecialchars(trim($_POST['addition']));
//description may contain html tags like <p>,<b>,<h2>
$short_description = (empty(trim($_POST['short_description']))) ? null : trim($_POST['short_description']);
$description = (empty(trim($_POST['description']))) ? null : trim($_POST['description']);
//requirements
$os = (empty(htmlspecialchars(trim($_POST['os'])))) ? null : htmlspecialchars(trim($_POST['os']));
$minimum_processor = (empty(htmlspecialchars(trim($_POST['minimum_processor'])))) ? null : htmlspecialchars(trim($_POST['minimum_processor']));
$minimum_graphics = (empty(htmlspecialchars(trim($_POST['minimum_graphics'])))) ? null : htmlspecialchars(trim($_POST['minimum_graphics']));
$minimum_memory = empty(htmlspecialchars(trim($_POST['minimum_memory']))) ? null : htmlspecialchars(trim($_POST['minimum_memory']));
$recommended_processor = empty(htmlspecialchars(trim($_POST['recommended_processor']))) ? null : htmlspecialchars(trim($_POST['recommended_processor']));
$recommended_graphics = empty(htmlspecialchars(trim($_POST['recommended_graphics']))) ? null : htmlspecialchars(trim($_POST['recommended_graphics']));
$recommended_memory = empty(htmlspecialchars(trim($_POST['recommended_memory']))) ? null : htmlspecialchars(trim($_POST['recommended_memory']));
$storage = empty(htmlspecialchars(trim($_POST['storage']))) ? null : htmlspecialchars(trim($_POST['storage']));
$notes = empty(htmlspecialchars(trim($_POST['notes']))) ? null : htmlspecialchars(trim($_POST['notes']));

try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {

    $sql = "INSERT INTO game
            (title,title_pl,producer,publisher,genre,cover,short_description,description,os,minimum_processor,minimum_graphics,minimum_memory,recommended_processor,recommended_graphics,recommended_memory,storage,notes,continuation,addition)
            VALUES
            (:title,:title_pl,:producer,:publisher,:genre,:cover,:short_description,:description,:os,:minimum_processor,:minimum_graphics,:minimum_memory,:recommended_processor,:recommended_graphics,:recommended_memory,:storage,:notes,:continuation,:addition)";

    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':title' => $title, ':title_pl' => $title_pl, ':producer' => $producer, ':publisher' => $publisher,
        ':genre' => $genre, ':cover' => $cover, ':short_description' => $short_description, ':description' => $description,
        ':os' => $os, ':minimum_processor' => $minimum_processor, ':minimum_graphics' => $minimum_graphics, ':minimum_memory' => $minimum_memory,
        ':recommended_processor' => $recommended_processor, ':recommended_graphics' => $recommended_graphics, ':recommended_memory' => $recommended_memory,
        ':storage' => $storage, ':notes' => $notes , ':continuation' => $continuation, ':addition' => $addition ));

    $pdo = null;
    header('Location: ../../../index.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>