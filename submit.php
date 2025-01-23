<?php
require_once 'controls/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $package_id = (int)$_POST['package_id'];
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $time_slot = mysqli_real_escape_string($conn, $_POST['time_slot']);
    $special_requests = mysqli_real_escape_string($conn, $_POST['special_requests']);

    // Insert booking into database
    $sql = "INSERT INTO bookings (name, email, phone, package_id, booking_date, time_slot, special_requests) 
            VALUES ('$name', '$email', '$phone', $package_id, '$booking_date', '$time_slot', '$special_requests')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to index with success message
        header("Location: index.php?success=1");
        exit();
    } else {
        // Redirect back with error
        echo "Error: " . $sql . "<br>" . $conn->error;  // Added error reporting
        // header("Location: index.php?error=1");
        // exit();
    }
} else {
    // If not POST request, redirect to index
    header("Location: index.php");
    exit();
}
?>