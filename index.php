<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pearl Culture Hub</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- this is the navigation bar section -->
 <nav>
    <header>
        <img src="images/Pearl logo.png"  alt="site logo" width="120" height="90">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="Service.html">Services</a></li>
            <li><a href="Regions.html">Regions</a></li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>
        <div class="auth-links">
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="dashboard.php">Welcome, <?php echo $_SESSION['user_name']; ?></a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</div>
    </header>
 </nav>

 <!-- Welcoming remarks -->
<h3><button id="theme-toggle">🌞</button><b>Welcome to Pearl Culture Hub</b></h3>
<p>Your home and comfort away from home where every visitor is a family and every story is treasured. Discover authentic cultural experiences, handcraftful treasures and vibrant traditions from across the pearl of Africa.<br>Whether you are seeking a learn, explore, or connect, we invite you to a journey with us through Uganda's living heritage.</p>
<p><img src="images/pearl of Africa.jpg" width="500" height="540" align="left"><h3>Discover the heart of Uganda's heritage</h3>"where culture lives and breathes"<br>From the rythms of Busoga to the kingdom of Buganda, we invite you to explore authentic cultural experiences;<br>Handcraft treasures and stories passed down through generations<br><img src="images/Uganda 🇺🇬.jpg" height="419" width="500"></p>
   <div style="clear:both;"></div><hr>

   <h3><b>Core services/ what we offer</b></h3> 
   <div class="services-two-column">
        <div class="services-left">
        <ul class="services-list">
            <li><b>Cultural tours</b></li>
            <li>Dance and music workshops</li>
            <li>Story telling sessions</li>
            <li>Craft workshops</li>
            <li>Authentic craft</li>
            <li>Meals</li>
        </ul>
        <button id="learn-btn"><a href="Service.html">Learn more>>></a></button>
    </div>
     <div class="services-right">
        <ul class="regions-list">
            <li>Regions</li>
            <li>Central Region</li>
            <li>Eastern Region</li>
            <li>Northern Region</li>
            <li>Western Region</li>
        </ul>
        <button id="see-btn"><a href="Service.html">See>>></a></button>
    </div>
   </div>
    
      <!-- Footer section -->
       <div class="Footer">
        <div class="Footer-item">
            <h3>Contact Infor</h3>
            <p><i class="fas fa-map-marker-alt"></i>Kyambogo-Hill<br>Kampala-Uganda</p>
            <p><i class="fas fa-phone"></i>+256-703-813-289<br>+256-767-370-856</p>
            <p><i class="fas fa-envelope"></i>infor@pearlculturehub.com</p>
        </div>
        <div class="Footer-item">
            <h3>Quick links</h3>
            <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="Service.html">Services</a></li>
            <li><a href="Regions.html">Regions</a></li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>
        </div>
        <div class="Footer-item">
            <h3>Social Media</h3>
            <p>follow us through our social media platforms as follows</p>
            <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>            
        </div>
       </div>
           <div class="footer-bottom">
        <p>&copy; <span id="year"></span> Pearl Culture Hub. All rights reserved.</p>
    </div>
     <script src="script.js"></script>
</body>
</html>