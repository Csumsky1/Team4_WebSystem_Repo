<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PropertyConnect - Your Unified Real Estate Platform</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="jquery.min.js"></script>
  <script src="jsIndex.js"></script>
</head>
<body>

<header>
  <nav>
    <div>
      <a href="#about">About</a>
      <a href="#how-it-works">How It Works</a>
      <a href="#for-buyers">For Buyers</a>
      <a href="#for-sellers">For Sellers</a>
      <a href="#why-choose">Why Choose</a>
    </div>
    <div class="nav-center">
      <h1>PropertyConnect</h1>
    </div>
    <div>
      <a href="javascript:void(0);" onclick="openPopup('signin')">Sign in</a>
      <a href="javascript:void(0);" onclick="openPopup('signup')">New Account</a>
    </div>
  </nav>
</header>
<section id="home-image">
  <img src="images/home.jpg" alt="Home Image">
  <div class="overlay-text">
    <h1>Buy and Sell Homes</h1>
  </div>
</section>

<section id="about">
  <h2>About PropertyConnect</h2>
  <p>
    Our mission is to unite property buyers and sellers on a single, seamless platform, simplifying the real estate experience for everyone.
  </p>
</section>

<section id="how-it-works">
  <h2>How It Works</h2>
  <p>
    PropertyConnect connects individuals looking to buy or sell properties, providing services for a smooth real estate journey.
  </p>
</section>

<section id="for-buyers">
  <h2>For Buyers</h2>
  <p>
    Discover your dream home with personalized profiles, advanced search filters, real-time notifications, and virtual property tours.
  </p>
</section>

<section id="for-sellers">
  <h2>For Sellers</h2>
  <p>
    Sell your property easily with listing management, performance analytics, secure communication, and transaction support.
  </p>
</section>

<section id="why-choose">
  <h2>Why Choose PropertyConnect</h2>
  <p>
    - Transparent transactions<br>
    - Innovative features like virtual property tours<br>
    - Strong security measures<br>
    - Customer-centric approach and support
  </p>
</section>

<footer>
  <p>&copy; 2023 PropertyConnect. All rights reserved.</p>
</footer>

<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <div id="signin-tab" class="tab-content">
      <?php include 'signin.php'; ?>
    </div>
    <div id="signup-tab" class="tab-content">
      <?php include 'signup.php'; ?>
    </div>
  </div>
</div>

</body>
</html>
