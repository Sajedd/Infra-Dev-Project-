<?php
require ("../database/connect.php");
header("Content-Type: application/json");
$user = $db->query("SELECT * FROM users WHERE userId = ".$_GET['id']);
echo json_encode($user->fetch_assoc());
