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
      <?php
      session_start();
      if (isset($_SESSION['email'])) {
          echo "<span>Welcome, " . $_SESSION['user_name'] . "!</span>";
          echo '<div class="dropdown">
                  <div class="dropdown-icon" onclick="toggleDropdown()">⚙️</div>
                  <div class="dropdown-content" id="logoutDropdown">';
          if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
              echo '<a href="adminDash.php">Admin Dashboard</a>';
          }
          echo '<a href="logout.php">Logout</a>';
          echo '</div></div>';
      } else {
          echo '<a href="javascript:void(0);" onclick="openPopup(\'signin\')">Sign in</a>';
      }
      ?>
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
    <h2>Welcome to PropertyConnect</h2>
      <p>
        <a href="javascript:void(0);" onclick="showTab('signin-tab')" class="active">Sign in</a>
        <a href="javascript:void(0);" onclick="showTab('signup-tab')">New Account</a>
        <span class="tab-divider"></span>
      </p>

      <div id="success-message" class="success"></div>
      <div id="loginErrorMessage" class="error"></div>

      <form action="" method="post" onsubmit="login(event)">
        <label for="email2">Email</label>
        <br>
        <input type="email" id="email2" name="email" placeholder="Enter Email" required>
        <br><br>
        <label for="password2">Password</label>
        <br>
        <input type="password" id="password2" name="password" placeholder="Enter Password" required>
        <br><br>
        <button type="submit">Sign in</button>
      </form>
    </div>
    <div id="signup-tab" class="tab-content">
    <h2>Create a New Account</h2>
      <p>
        <a href="javascript:void(0);" onclick="showTab('signin-tab')">Sign in</a>
        <a href="javascript:void(0);" onclick="showTab('signup-tab')" class="active">New Account</a>
        <span class="tab-divider"></span>
      </p>
      <div id="error-message" class="error"></div>
      <form action="" method="post" onsubmit="submitForm(event)">
        <label for="first-name">First Name</label>
        <br>
        <input type="text" id="first-name" name="first_name" placeholder="Enter First Name" required>
        <br><br>
        <label for="last-name">Last Name</label>
        <br>
        <input type="text" id="last-name" name="last_name" placeholder="Enter Last Name" required>
        <br><br>
        <label for="email1">Email</label>
        <br>
        <input type="email" id="email1" name="email" placeholder="Enter Email" required>
        <br><br>
        <label for="username">Username</label>
        <br>
        <input type="text" id="username" name="username" placeholder="Enter Username" required>
        <br><br>
        <label for="password1">Password</label>
        <br>
        <input type="password" id="password1" name="password" placeholder="Enter Password" required>
        <br><br>
        <label for="account-type">Account Type</label>
        <br>
        <select id="account-type" name="account_type" required>
          <option value="" disabled selected>Select Account Type</option>
          <option value="buyer">Buyer</option>
          <option value="seller">Seller</option>
          <option value="admin">Admin</option>
        </select>
        <br><br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
