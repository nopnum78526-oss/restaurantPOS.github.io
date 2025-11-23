<?php
require_once 'config/db.php';

// 1. Add category column if it doesn't exist
$check_col = $conn->query("SHOW COLUMNS FROM menu LIKE 'category'");
if ($check_col->num_rows == 0) {
    $conn->query("ALTER TABLE menu ADD COLUMN category VARCHAR(50) NOT NULL DEFAULT 'Main Course' AFTER name");
    echo "Added 'category' column.<br>";
}

// 2. Clear existing menu items to ensure clean sample data
$conn->query("DELETE FROM menu");
$conn->query("ALTER TABLE menu AUTO_INCREMENT = 1");
echo "Cleared existing menu items.<br>";

// 3. Insert Sample Data
$sql = "INSERT INTO menu (name, category, price, description, image, status) VALUES 
-- Appetizers
('French Fries', 'Appetizers', 59.00, 'Crispy golden french fries', 'https://images.unsplash.com/photo-1630384060421-cb20d0e0649d?auto=format&fit=crop&w=500&q=60', 1),
('Spring Rolls', 'Appetizers', 79.00, 'Vegetable spring rolls with sweet chili sauce', 'https://images.unsplash.com/photo-1544510808-91bcbee1df55?auto=format&fit=crop&w=500&q=60', 1),
('Chicken Wings', 'Appetizers', 129.00, 'Spicy fried chicken wings', 'https://images.unsplash.com/photo-1567620832903-9fc6debc209f?auto=format&fit=crop&w=500&q=60', 1),

-- Main Course
('Pad Thai', 'Main Course', 89.00, 'Classic Thai stir-fried noodles', 'https://images.unsplash.com/photo-1559314809-0d155014e29e?auto=format&fit=crop&w=500&q=60', 1),
('Tom Yum Kung', 'Main Course', 150.00, 'Spicy prawn soup with herbs', 'https://images.unsplash.com/photo-1548943487-a2e4e43b485c?auto=format&fit=crop&w=500&q=60', 1),
('Green Curry', 'Main Course', 120.00, 'Thai green curry with chicken', 'https://images.unsplash.com/photo-1626804475297-411dbe631dad?auto=format&fit=crop&w=500&q=60', 1),

-- Desserts
('Mango Sticky Rice', 'Desserts', 99.00, 'Sweet sticky rice with ripe mango', 'https://images.unsplash.com/photo-1629186665022-c9172671524f?auto=format&fit=crop&w=500&q=60', 1),
('Chocolate Cake', 'Desserts', 85.00, 'Rich chocolate cake slice', 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=500&q=60', 1),
('Ice Cream', 'Desserts', 49.00, 'Vanilla ice cream scoop', 'https://images.unsplash.com/photo-1560008581-09826d1de69e?auto=format&fit=crop&w=500&q=60', 1),

-- Drinks
('Iced Tea', 'Drinks', 40.00, 'Refreshing thai iced tea', 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=500&q=60', 1),
('Cola', 'Drinks', 30.00, 'Chilled cola soft drink', 'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?auto=format&fit=crop&w=500&q=60', 1),
('Water', 'Drinks', 15.00, 'Mineral water bottle', 'https://images.unsplash.com/photo-1564419320461-6870880221ad?auto=format&fit=crop&w=500&q=60', 1);
";

if ($conn->multi_query($sql)) {
    echo "Sample menu items inserted successfully.";
} else {
    echo "Error inserting items: " . $conn->error;
}
