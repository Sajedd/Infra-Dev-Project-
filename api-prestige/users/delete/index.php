<?php
require ("../database/connect.php");
header("Content-Type: application/json");

try {
    $db->query("DELETE FROM `users` WHERE `userId` = " . $_GET['userId']);
    header("HTTP/1.1 200 OK");
    echo ('{"message":"User deleted"}');
} catch (\Throwable $th) {
    throw $th;
}
