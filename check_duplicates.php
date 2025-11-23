<?php
require_once 'config/db.php';

$result = $conn->query("SELECT * FROM menu ORDER BY name");
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['menu_id'] . " - Name: " . $row['name'] . " - Category: " . $row['category'] . "<br>";
}
