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

$user_id = $_SESSION['user_id'];

// Get user's bookings
$sql = "SELECT b.*, t.tour_name, t.region, t.price_range, t.duration 
        FROM bookings b 
        JOIN tours t ON b.tour_id = t.id 
        WHERE b.user_id = '$user_id' 
        ORDER BY b.booking_date DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings - Pearl Cultural Hub</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #f0f0f0; }
        .navbar { background: #1a6fc4; padding: 15px 30px; color: white; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }
        .navbar a:hover { color: #ff6600; }
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #1a6fc4; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #1a6fc4; color: white; }
        .status-pending { color: orange; font-weight: bold; }
        .status-confirmed { color: green; font-weight: bold; }
        .status-cancelled { color: red; font-weight: bold; }
        .no-bookings { text-align: center; padding: 40px; color: #666; }
        .back-btn { display: inline-block; margin-top: 20px; color: #1a6fc4; text-decoration: none; }
    </style>
</head>
<body>
    <div class="navbar">
        <h2><img src="images/Pearl logo.png"  alt="site logo" width="100" height="80"></h2>
        <div>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="book_tour.php">Book a Tour</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <h2>My Bookings</h2>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <tr>
                    <th>Tour</th>
                    <th>Region</th>
                    <th>Booking Date</th>
                    <th>Duration</th>
                    <th>Price_Range</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['tour_name']); ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td>$<?php echo $row['price_range']; ?></td>
                    <td class="status-<?php echo $row['status']; ?>"><?php echo ucfirst($row['status']); ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <div class="no-bookings">
                <p>You haven't booked any tours yet.</p>
                <a href="book_tour.php" style="color: #ff6600;">Book your first tour now →</a>
            </div>
        <?php endif; ?>
        
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
    </div>
</body>
</html>