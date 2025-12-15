<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "lechon_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$customer_name    = $conn->real_escape_string($_POST['customer_name']);
$contact_number   = $conn->real_escape_string($_POST['contact_number']);
$product_type     = $conn->real_escape_string($_POST['product_type']);
$size_or_quantity = $conn->real_escape_string($_POST['size_or_quantity']);
$delivery_date    = $_POST['delivery_date'];
$delivery_time    = $_POST['delivery_time'];
$delivery_address = $conn->real_escape_string($_POST['delivery_address']);

// Insert data into orders table
$sql = "INSERT INTO orders (customer_name, contact_number, product_type, size_or_quantity, delivery_date, delivery_time, delivery_address) 
        VALUES ('$customer_name', '$contact_number', '$product_type', '$size_or_quantity', '$delivery_date', '$delivery_time', '$delivery_address')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Order saved successfully!</h2>";
    echo "<a href='../order.html'>Back to Order Page</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
