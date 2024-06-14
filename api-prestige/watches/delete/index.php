<?php
require ("../database/connect.php");
header("Content-Type: application/json");

try {
    $db->query("DELETE FROM `product` WHERE `ProductId` = " . $_GET['ProductId']);
    header("HTTP/1.1 200 OK");
    echo ('{"message":"product deleted"}');
} catch (\Throwable $th) {
    throw $th;
}
