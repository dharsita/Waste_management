<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eco Waste Management Portal</title>

  <!-- Font Awesome & AOS -->
   <!-- Add this in your <head> if not already included -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    /* Reset & Base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;4
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #E3F2FD, #E8F5E9);
      background-image:url('https://cdn.dribbble.com/users/2090760/screenshots/5599559/media/4cac0c95122554a58c0cb7a525765424.gif');
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #04364A;
      padding: 1rem 2rem;
      color: white;
      position: sticky;
      top: 0;
      z-index: 999;
    }

    .navbar .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    .nav-links li a {
      text-decoration: none;
      color: white;
      font-weight: 500;
      transition: color 0.3s;
    }

    .nav-links li a:hover {
      color: #27ae60;
    }

    /* Header */
    header {
      text-align: center;
      padding: 2rem 1rem;
    }

    header h1 {
      font-size: 2.5rem;
      color: #04364A;
      margin-bottom: 1rem;
    }

    /* Buttons */
    .auth-buttons {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .auth-buttons button {
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 40px;
      font-size: 1rem;
      cursor: pointer;
      background-image: linear-gradient(to bottom right, #07119d, #ffffff);
      color: #04364A;
      font-weight: bold;
      transition: transform 0.3s ease;
    }

    .auth-buttons button:hover {
      transform: scale(1.05);
    }

    /* Cards */
    .card-section {
      padding: 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .card-section h2 {
      text-align: center;
      color: #04364A;
      margin-bottom: 2rem;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2rem;
    }

    .card {
      background: white;
      border-radius: 16px;
      padding: 2rem;
      text-align: center;
      width: 180px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .card i {
      font-size: 2rem;
      color: #04364A;
      margin-bottom: 1rem;
    }

    .card h3 {
      font-size: 1.1rem;
    }

    /* Info Text */
    #infoContainer, #info, #infoo {
      text-align: center;
      margin-top: 1.5rem;
      font-weight: bold;
      color: #222;
    }

    /* Footer */
    footer {
      background: #04364A;
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: 12rem;
    }

    /* Scroll Top Button */
    #scrollTopBtn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #04364A;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 50%;
      cursor: pointer;
      display: none;
      font-size: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      .card-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">♻️ Eco Waste Portal</div>
    <ul class="nav-links">
      <li><a href="#">Home</a></li>
      <li><a href="feature.html">Features</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="signup.php">Register</a></li>
      <li><a href="queries.php">Queries</a></li>
    </ul>
  </nav>

  <!-- Header -->
  <header>
    <h1>Eco Waste Management Portal</h1>
    <div class="auth-buttons">
      <form action="login.php"><button type="submit">Login</button></form>
      <form action="signup.php"><button type="submit">Register</button></form>
    </div>
  </header>

  <!-- Cards Section -->
  <section class="card-section" id="features">
    <h2>Explore Features</h2>
    <div class="card-container">
      <div class="card" onclick="showWorkers()" data-aos="fade-up">
        <i class="fas fa-user"></i>
        <h3>Workers</h3>
      </div>
      <div class="card" onclick="showDustbins()" data-aos="fade-up" data-aos-delay="100">
        <i class="fas fa-trash"></i>
        <h3>Dustbins</h3>
      </div>
      <div class="card" onclick="showTrucks()" data-aos="fade-up" data-aos-delay="200">
      <a href="https://www.google.com/android/find/"><i class="fas fa-truck"></i>
        <h3>Trucks</h3>
      </div>
      <div class="card" onclick="showDevelopers()" data-aos="fade-up" data-aos-delay="300">
        <i class="fa fa-laptop"></i>
        <h3>Developers</h3>
      </div>
    </div>

    <!-- Info Containers -->
    <div id="infoContainer"></div>
    <div id="info"></div>
    <div id="infoo"></div>
  </section>

  <!-- Scroll-to-Top Button -->
  <button id="scrollTopBtn" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">⬆️</button>

  <!-- Footer -->
  <footer>
    &copy; 2025 Eco Waste Management Portal | All Rights Reserved.
  </footer>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();

    window.onscroll = function () {
      document.getElementById('scrollTopBtn').style.display =
        window.scrollY > 200 ? 'block' : 'none';
    };

    function showWorkers() {
      window.location.href = 'workers.php';
    }



    function showDustbins() {
      window.location.href = 'dustbins.php';
    }

    // Utility function for fade-in animation
function fadeIn(element) {
  element.style.opacity = 0;
  element.style.display = "block";
  let opacity = 0;
  const interval = setInterval(() => {
    if (opacity >= 1) clearInterval(interval);
    element.style.opacity = opacity;
    opacity += 0.1;
  }, 30);
}

function showTrucks() {
  const infoContainer = document.getElementById('infoContainer');
  infoContainer.innerHTML = `
    <div style="
      padding: 20px; 
      border-radius: 10px; 
      background: linear-gradient(to right, #e8f5e9, #f1f8e9); 
      border-left: 6px solid #43a047;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      font-family: 'Segoe UI', sans-serif;
    ">
      <i class="fas fa-truck" style="font-size: 22px; color: #388e3c;"></i> 
      <strong style="margin-left: 8px; color: #2e7d32;">Truck Status:</strong>
      <p style="margin-top: 8px;">Waste collection trucks are <strong>on schedule</strong>. Real-time tracking is active. Stay tuned for route and timing updates!</p>
    </div>
  `;
  document.getElementById('info').innerHTML = '';
  document.getElementById('infoo').innerHTML = '';
  fadeIn(infoContainer);
}

function showDevelopers() {
  const infoContainer = document.getElementById('infoContainer');
  infoContainer.innerHTML = `
    <div style="
      padding: 20px;
      border-radius: 10px; 
      background: linear-gradient(to right, #e3f2fd, #e1f5fe); 
      border-left: 6px solid #1976d2;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      font-family: 'Segoe UI', sans-serif;
    ">
      <i class="fas fa-user-cog" style="font-size: 22px; color: #1565c0;"></i>
      <strong style="margin-left: 8px; color: #0d47a1;">Developer Contact:</strong>
      <p style="margin-top: 8px;">
        📞 <strong>+91-9876543210</strong><br>
        📧 <strong>support@ecowasteportal.in</strong><br>
        💼 <strong>Eco Waste Dev Team</strong>
      </p>
    </div>
  `;
  document.getElementById('info').innerHTML = '';
  document.getElementById('infoo').innerHTML = '';
  fadeIn(infoContainer);
}

  </script>

</body>
</html>
