<?php
require ("database/connect.php");
header("Content-Type: application/json");

$products = $db->query("SELECT * FROM products");
while ($row = $products->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
