<?php

require_once '../../database/connector.php';

$first_name = (empty($_POST['first_name'])) ? null :  htmlspecialchars(trim($_POST['first_name']));
$last_name = (empty($_POST['last_name'])) ? null :  htmlspecialchars(trim($_POST['last_name']));
$email = (empty($_POST['email'])) ? null :  htmlspecialchars(trim($_POST['email']));
$login = (empty($_POST['login'])) ? null :  htmlspecialchars(trim($_POST['login']));
$password = (empty($_POST['password'])) ? null :  htmlspecialchars(trim($_POST['password']));
$status = (empty($_POST['status'])) ? null :  htmlspecialchars(trim($_POST['status']));

try {
    //dsn variable comes from ../../database/connector.php  file
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {

    $sql = "INSERT INTO person (first_name,last_name,email) VALUES (:first_name,:last_name,:email)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':first_name' => $first_name, ':last_name' => $last_name,':email' => $email));

    $id_person_sql = "SELECT id_person FROM person WHERE email LIKE '$email'";
    $sth = $pdo->query($id_person_sql);
    $sth = $sth->fetch(PDO::FETCH_OBJ);
    $id_person = $sth->id_person;

} catch (PDOException $e) {
    echo $e->getMessage();
}

try {

    $sql = "INSERT INTO account (id_person,login,password,status) VALUES (:id_person,:login,:password,:status)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':id_person' => $id_person, ':login' => $login,':password' => $password,':status' => $status));

    $pdo = null;
    header('Location: ../easyinsertdata.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}

