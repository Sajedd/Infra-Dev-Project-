<?php
require ("database/connect.php");
header("Content-Type: application/json");

$users = $db->query("SELECT * FROM users");
while ($row = $users->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
