<?php
// carbon_calculator.php

// Define emission factors for UK (example values)
$emission_factors = [
  "UK" => [
    "Transportation" => 0.12,   // kgCO2/km (UK-specific average)
    "Electricity" => 0.23,       // kgCO2/kWh (UK greener grid)
    "Diet" => 1.1,               // kgCO2/meal
    "Waste" => 0.08              // kgCO2/kg
  ]
];

$transportation_emissions = 0;
$electricity_emissions = 0;
$diet_emissions = 0;
$waste_emissions = 0;
$total_emissions = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $country = $_POST['country'] ?? 'UK';
  $distance = floatval($_POST['distance'] ?? 0) * 365;
  $electricity = floatval($_POST['electricity'] ?? 0) * 12;
  $meals = intval($_POST['meals'] ?? 0) * 365;
  $waste = floatval($_POST['waste'] ?? 0) * 52;

  // Calculate emissions in tonnes
  $transportation_emissions = round(($emission_factors[$country]['Transportation'] * $distance) / 1000, 2);
  $electricity_emissions = round(($emission_factors[$country]['Electricity'] * $electricity) / 1000, 2);
  $diet_emissions = round(($emission_factors[$country]['Diet'] * $meals) / 1000, 2);
  $waste_emissions = round(($emission_factors[$country]['Waste'] * $waste) / 1000, 2);

  $total_emissions = round(
    $transportation_emissions + $electricity_emissions + $diet_emissions + $waste_emissions,
    2
  );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carbon Calculator</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="top-bar">
    <div class="logo">
      <img src="logo.png" alt="Roslo Technologies Logo">
    </div>
    <div class="title">
      Roslo Technologies
    </div>
    <div class="auth-buttons">
      <button onclick="location.href='signup.html'">Sign Up</button>
      <button onclick="location.href='login.html'">Login</button>
    </div>
  </div>
  <nav class="nav-bar">
    <a href="homepage.php">Home</a>
    <a href="carbonFootprint.php">Carbon Footprint Calculator</a>
    <a href="review.php">Reviews</a>
    <div class="dropdown">
      <button class="dropbtn">Menu</button>
      <div class="dropdown-content">
        <a href="option1.php">Option 1</a>
        <a href="option2.php">Option 2</a>
        <a href="option3.php">Option 3</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1>Personal Carbon Calculator 🌱</h1>
    <form method="POST">
      <label>Country:</label>
      <select name="country">
        <option value="UK">UK</option>
      </select>

      <label>🚗 Daily commute distance (in km):</label>
      <input type="number" name="distance" step="0.1" required />

      <label>💡 Monthly electricity consumption (kWh):</label>
      <input type="number" name="electricity" step="0.1" required />

      <label>🗑️ Waste generated per week (kg):</label>
      <input type="number" name="waste" step="0.1" required />

      <label>🍽️ Number of meals per day:</label>
      <input type="number" name="meals" required />

      <button type="submit">Calculate CO2 Emissions</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
      <div class="results">
        <h2>Results</h2>
        <div class="emissions">
          <p>🚗 Transportation: <strong><?= $transportation_emissions ?></strong> tonnes CO2/year</p>
          <p>💡 Electricity: <strong><?= $electricity_emissions ?></strong> tonnes CO2/year</p>
          <p>🍽️ Diet: <strong><?= $diet_emissions ?></strong> tonnes CO2/year</p>
          <p>🗑️ Waste: <strong><?= $waste_emissions ?></strong> tonnes CO2/year</p>
        </div>
        <div class="total">
          <h3>🌍 Total Carbon Footprint: <span><?= $total_emissions ?> tonnes CO2/year</span></h3>
          <p class="note">Note: In 2021, the UK's average per capita CO2 emission was 4.7 tonnes.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <section class="contact-us">
    <h2>Contact Us</h2>
    <div class="contact-details">
      <div class="contact-item">
        <strong>Email:</strong> contact@roslotech.com
      </div>
      <div class="contact-item">
        <strong>Address:</strong> 123 Tech Lane, Innovation City
      </div>
      <div class="contact-item">
        <strong>Phone Number:</strong> +1 (555) 123-4567
      </div>
      <div class="contact-item">
        <strong>Postcode:</strong> IC 45678
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <p>&copy; 2025 Roslo Technologies. All rights reserved.</p>
  </footer>
</body>
</html>
