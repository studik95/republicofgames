<?php

require_once '../../database/connector.php';

//information about game
$title = (empty($_POST['title'])) ? null :  htmlspecialchars(trim($_POST['title']));
$title_pl = (empty($_POST['title_pl'])) ? null : htmlspecialchars(trim($_POST['title_pl']));
$producer = (empty($_POST['producer'])) ? null : htmlspecialchars(trim($_POST['producer']));
$publisher = (empty($_POST['publisher'])) ? null : htmlspecialchars(trim($_POST['publisher']));
$genre = (empty($_POST['genre'])) ? null : htmlspecialchars(trim($_POST['genre']));
$cover = (empty($_POST['cover'])) ? null : htmlspecialchars(trim($_POST['cover']));
$continuation = ($_POST['continuation'] == 0) ? null : htmlspecialchars(trim($_POST['continuation']));
$addition = ($_POST['addition'] == 0) ? null : htmlspecialchars(trim($_POST['addition']));
//description may contain html tags like <p>,<b>,<h2>
$short_description = (empty($_POST['short_description'])) ? null : trim($_POST['short_description']);
$description = (empty($_POST['description'])) ? null : trim($_POST['description']);
//requirements
$os = (empty($_POST['os'])) ? null : htmlspecialchars(trim($_POST['os']));
$minimum_processor = (empty($_POST['minimum_processor'])) ? null : htmlspecialchars(trim($_POST['minimum_processor']));
$minimum_graphics = (empty($_POST['minimum_graphics'])) ? null : htmlspecialchars(trim($_POST['minimum_graphics']));
$minimum_memory = (empty($_POST['minimum_memory'])) ? null : htmlspecialchars(trim($_POST['minimum_memory']));
$recommended_processor = (empty($_POST['recommended_processor'])) ? null : htmlspecialchars(trim($_POST['recommended_processor']));
$recommended_graphics = (empty($_POST['recommended_graphics'])) ? null : htmlspecialchars(trim($_POST['recommended_graphics']));
$recommended_memory = (empty($_POST['recommended_memory'])) ? null : htmlspecialchars(trim($_POST['recommended_memory']));
$storage = (empty($_POST['storage'])) ? null : htmlspecialchars(trim($_POST['storage']));
$notes = (empty($_POST['notes'])) ? null : htmlspecialchars(trim($_POST['notes']));

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
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>