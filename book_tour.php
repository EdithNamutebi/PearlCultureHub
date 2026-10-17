<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$host = "localhost:3308";
$user = "root";
$password = "";
$database = "pearlculturehub";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get all tours
$tours_sql = "SELECT * FROM tours ORDER BY region, tour_name";
$tours_result = mysqli_query($conn, $tours_sql);

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tour_id = $_POST['tour_id'];
    $booking_date = $_POST['booking_date'];
    $user_id = $_SESSION['user_id'];
    
    $sql = "INSERT INTO bookings (user_id, tour_id, booking_date, status) 
            VALUES ('$user_id', '$tour_id', '$booking_date', 'pending')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "✅ Booking successful! Your request is pending confirmation.";
        $message_type = 'success';
    } else {
        $message = "❌ Booking failed: " . mysqli_error($conn);
        $message_type = 'error';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book a Tour - Pearl Cultural Hub</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #f0f0f0; }
        .navbar { background: #1a6fc4; padding: 15px 30px; color: white; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }
        .navbar a:hover { color: #ff6600; }
        .container { max-width: 1000px; margin: 30px auto; padding: 20px; }
        h2 { color: #1a6fc4; margin-bottom: 20px; }
        .message { padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .tour-card { background: white; padding: 20px; margin-bottom: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .tour-card h3 { color: #1a6fc4; margin-bottom: 10px; }
        .tour-card .region { display: inline-block; background: #ff6600; color: white; padding: 3px 10px; border-radius: 15px; font-size: 12px; margin-bottom: 10px; }
        .tour-card .price { font-size: 20px; font-weight: bold; color: #ff6600; margin: 10px 0; }
        .tour-card .duration { color: #666; margin-bottom: 10px; }
        form { margin-top: 15px; }
        input[type="date"] { padding: 8px; margin-right: 10px; border: 1px solid #ddd; border-radius: 5px; }
        button { background: #ff6600; color: white; padding: 8px 20px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #e65c00; }
        .back-btn { display: inline-block; margin-top: 20px; color: #1a6fc4; text-decoration: none; }
    </style>
</head>
<body>
    <div class="navbar">
        <h2><img src="images/Pearl logo.png"  alt="site logo" width="100" height="80"></h2>
        <div>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="my_bookings.php">My Bookings</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <h2>Book a Cultural Tour</h2>
        
        <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php while ($tour = mysqli_fetch_assoc($tours_result)): ?>
            <div class="tour-card">
                <span class="region"><?php echo $tour['region']; ?></span>
                <h3><?php echo htmlspecialchars($tour['tour_name']); ?></h3>
                <p><?php echo htmlspecialchars($tour['description']); ?></p>
                <div class="price_range">$<?php echo $tour['price_range']; ?></div>
                <div class="duration">⏱️ Duration: <?php echo $tour['duration']; ?></div>
                <form method="POST">
                    <input type="hidden" name="tour_id" value="<?php echo $tour['id']; ?>">
                    <label>Select Date: </label>
                    <input type="date" name="booking_date" required min="<?php echo date('Y-m-d'); ?>">
                    <button type="submit">Book Now</button>
                </form>
            </div>
        <?php endwhile; ?>
        
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
    </div>
</body>
</html>