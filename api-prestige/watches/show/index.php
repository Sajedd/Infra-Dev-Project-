<?php
require ("../database/connect.php");
header("Content-Type: application/json");
$product = $db->query("SELECT * FROM products WHERE ProductId = ".$_GET['id']);
echo json_encode($product->fetch_assoc());
