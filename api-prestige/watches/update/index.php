<?php
require("../database/connect.php");
header("Content-Type: application/json");
$product = $db->query("SELECT * FROM products WHERE ProductId = " . $_GET['ProductId'])->fetch_assoc();
$name = (isset($_POST['name'])) ? $_POST['name'] : $product['name'];
$price = (isset($_POST['price'])) ? $_POST['price'] : $product['price'];
$category = (isset($_POST['category'])) ? $_POST['category'] : $product['category'];
$description = (isset($_POST['description'])) ? $_POST['description'] : $product['description'];
$vendor = (isset($_POST['vendor'])) ? $_POST['vendor'] : $product['vendor'];
$quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : $product['quantity'];
$userId = (isset($_POST['userId'])) ? $_POST['userId'] : $product['userId'];


$query = $db->prepare("UPDATE `products` SET `Name` = ?, `Price` = ?, `Category` = ?, `Description` = ?, `Vendor` = ?, `Quantity` = ?, `UserId` = ? WHERE `ProductId` = ?");
if (gettype($query) === "boolean") {
    printf("Message d'erreur : %s\n", $db->error);
    die();
}
$query->bind_param("sssssssii", $name, $price, $category, $description, $vendor, $quantity, $userId,  $_GET['ProductId']);

try {
    $query->execute();
    header("HTTP/1.1 200 OK");
    echo ('{"message":"product modified"}');
} catch (\Throwable $th) {
    throw $th;
}
