<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Pearl Cultural Hub</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background: #f0f0f0;
        }
        
        .navbar {
            background: #1a6fc4;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        
        .navbar h2 {
            font-size: 20px;
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        
        .navbar a:hover {
            color: #ff6600;
        }
        
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #1a6fc4;
            margin-bottom: 20px;
        }
        
        .welcome {
            font-size: 18px;
            margin-bottom: 20px;
            padding: 15px;
            background: #e6f3ff;
            border-radius: 5px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        
        .btn:hover {
            background: #e65c00;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2> <img src="images/Pearl logo.png"  alt="site logo" width="100" height="80"></h2>
        <div>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['user_name']; ?>!</h1>
        
        <div class="welcome">
            <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
            <p><strong>Account created:</strong> You are now logged in to Pearl Cultural Hub.</p>
        </div>
        
        <h3>What would you like to do?</h3>
        <a href="book_tour.php" class="btn">Book a Cultural Tour</a>
        <a href="my_bookings.php" class="btn">View My Bookings</a>

    </div>
</body>
</html>