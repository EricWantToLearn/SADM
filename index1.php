<?php
include 'controls/conn.php';
$current_date = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>dos studios - Book Now</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900|Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="alert alert-success">
                Your booking has been submitted successfully! We will contact you shortly.
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Book Your Session</h3>
                    </div>
                    <div class="card-body">
                        <form action="submit.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Full Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email Address *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Package *</label>
                                <select name="package_id" class="form-control" required>
                                    <option value="">Choose a package...</option>
                                    <option value="1">Package 1 - Basic Photo Session - ₱1,500</option>
                                    <option value="2">Package 2 - Premium Photo Session - ₱2,500</option>
                                    <option value="3">Package 3 - Ultimate Photo Session - ₱3,500</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Preferred Date *</label>
                                <input type="date" name="booking_date" class="form-control" 
                                       min="<?php echo date('Y-m-d'); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Preferred Time Slot *</label>
                                <select name="time_slot" class="form-control" required>
                                    <option value="">Select time slot...</option>
                                    <option value="10:00">10:00 AM - 11:00 AM</option>
                                    <option value="11:00">11:00 AM - 12:00 PM</option>
                                    <option value="12:00">12:00 PM - 1:00 PM</option>
                                    <option value="13:00">1:00 PM - 2:00 PM</option>
                                    <option value="14:00">2:00 PM - 3:00 PM</option>
                                    <option value="15:00">3:00 PM - 4:00 PM</option>
                                    <option value="16:00">4:00 PM - 5:00 PM</option>
                                    <option value="17:00">5:00 PM - 6:00 PM</option>
                                    <option value="18:00">6:00 PM - 7:00 PM</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Special Requests</label>
                                <textarea name="special_requests" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Submit Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>