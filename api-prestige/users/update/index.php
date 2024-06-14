<?php
require ("../database/connect.php");
header("Content-Type: application/json");
$user = $db->query("SELECT * FROM user WHERE userId = " . $_GET['userId'])->fetch_assoc();
$lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : $user['lastname'];
$firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : $user['firstname'];
$email = (isset($_POST['email'])) ? $_POST['email'] : $user['email'];
$password = (isset($_POST['password'])) ? $_POST['password'] : $user['password'];


$query = $db->prepare("UPDATE `users` SET `lastname` = ?, `firstname` = ?, `email` = ?, `password` = ? WHERE `userId` = ?");
if (gettype($query) === "boolean" ) {
    printf("Message d'erreur : %s\n", $db->error);
    die();
}
$query->bind_param("ssssi", $lastname, $firstname, $email, $password,$_GET['userId']);

try {
    $query->execute();
    header("HTTP/1.1 200 OK");
    echo ('{"message":"user modified"}');
} catch (\Throwable $th) {
    throw $th;
}
