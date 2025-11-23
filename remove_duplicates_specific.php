<?php
require_once 'config/db.php';

// Mapping Old ID -> New ID
$mapping = [
    1 => 8,  // Pad Thai
    3 => 9,  // Tom Yum Kung
    4 => 10  // Green Curry
];

foreach ($mapping as $old_id => $new_id) {
    // 1. Update order_items to point to new_id
    $sql_update = "UPDATE order_items SET menu_id = $new_id WHERE menu_id = $old_id";
    if ($conn->query($sql_update)) {
        echo "Updated order_items for menu_id $old_id to $new_id.<br>";

        // 2. Delete the old menu item
        $sql_delete = "DELETE FROM menu WHERE menu_id = $old_id";
        if ($conn->query($sql_delete)) {
            echo "Deleted menu item ID $old_id.<br>";
        } else {
            echo "Error deleting menu item ID $old_id: " . $conn->error . "<br>";
        }
    } else {
        echo "Error updating order_items for menu_id $old_id: " . $conn->error . "<br>";
    }
}
