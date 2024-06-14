<?php
require("../database/connect.php");
// header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $vendor = $_POST['vendor'];
    $quantity = $_POST['quantity'];
    $userId = $_POST['userId'];

    $postQuery = $db->prepare("INSERT INTO `products` (`Name`, `Price`, `Category`, `Description`, `Vendor`, `Quantity`, `UserId`) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $postQuery->bind_param("ssssssi", $name, $price, $category, $description, $vendor, $quantity, $userId);
    try {
        $postQuery->execute();
        // header("HTTP/1.1 200 OK");
        echo ('{"message":"product added"}');
    } catch (Exception $e) {
        throw $e;
    }
} else {
    echo "Field missing";
}
