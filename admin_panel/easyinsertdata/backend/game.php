<?php

//information about game
$title =  htmlspecialchars(trim($_POST['title']));
$title_pl = htmlspecialchars(trim($_POST['title_pl']));
$producer = htmlspecialchars(trim($_POST['producer']));
$publisher = htmlspecialchars(trim($_POST['publisher']));
$cover = htmlspecialchars(trim($_POST['cover']));
$continuation = htmlspecialchars(trim($_POST['continuation']));
$addition = htmlspecialchars(trim($_POST['addition']));
$short_description = trim($_POST['short_description']);
$description = trim($_POST['description']);
//requirements
$os = htmlspecialchars(trim($_POST['os']));
$minimum_processor = htmlspecialchars(trim($_POST['minimum_processor']));
$minimum_graphics = htmlspecialchars(trim($_POST['minimum_graphics']));
$minimum_memory = htmlspecialchars(trim($_POST['minimum_memory']));
$recommended_processor = htmlspecialchars(trim($_POST['recommended_processor']));
$recommended_graphics = htmlspecialchars(trim($_POST['recommended_graphics']));
$recommended_memory = htmlspecialchars(trim($_POST['recommended_memory']));
$storage = htmlspecialchars(trim($_POST['storage']));
$notes = htmlspecialchars(trim($_POST['notes']));


?>