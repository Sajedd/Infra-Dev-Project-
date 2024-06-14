<?php
require("../database/connect.php");
// header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    $postQuery = $db->prepare("INSERT INTO `users` (`Email`, `FirstName`, `LastName`, `Passwd`) VALUES (?,?,?,?);");
    $postQuery->bind_param("ssss", $email, $firstname, $lastname, $password);
    file_put_contents("log.txt", "Query : INSERT INTO `users` (`Email`, `FirstName`, `LastName`, `Passwd`) VALUES (" . $email . "," . $firstname . "," . $lastname . "," . $password . ");");

    try {
        $postQuery->execute();
        // header("HTTP/1.1 200 OK");
        echo ('{"message":"User added"}');
    } catch (Exception $e) {
        die($e);
        header("HTTP/1.1 500 error");
        file_put_contents("log.txt", $e);
    }
} else {
    echo "Field missing";
    // file_put_contents("log.txt", "Field missing");
}
