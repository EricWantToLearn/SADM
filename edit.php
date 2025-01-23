<?php
include 'controls/conn.php';

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();

if (!$booking) {
    header("Location: admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package_id = $_POST['package_id'];
    $booking_date = $_POST['booking_date'];
    $time_slot = $_POST['time_slot'];
    $special_requests = $_POST['special_requests'];
    $status = $_POST['status'];
    
    $sql = "UPDATE bookings SET 
            name = ?, 
            email = ?, 
            phone = ?, 
            package_id = ?, 
            booking_date = ?, 
            time_slot = ?, 
            special_requests = ?,
            status = ? 
            WHERE id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $name, $email, $phone, $package_id, $booking_date, $time_slot, $special_requests, $status, $id);
    $stmt->execute();
    
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking - DOS Studios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #FAF3E6;">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Booking</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($booking['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($booking['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone:</label>
                        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($booking['phone']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Package ID:</label>
                        <input type="text" name="package_id" class="form-control" value="<?= htmlspecialchars($booking['package_id']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Booking Date:</label>
                        <input type="date" name="booking_date" class="form-control" value="<?= htmlspecialchars($booking['booking_date']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Time Slot:</label>
                        <input type="time" name="time_slot" class="form-control" value="<?= htmlspecialchars($booking['time_slot']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Special Requests:</label>
                        <textarea name="special_requests" class="form-control"><?= htmlspecialchars($booking['special_requests']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Status:</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" <?= $booking['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="confirmed" <?= $booking['status'] == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                            <option value="cancelled" <?= $booking['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                    <a href="admin.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>