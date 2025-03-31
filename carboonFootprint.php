<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Top Bar -->
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

    <!-- Navigation Bar -->
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

    <!-- Main Content -->
    <div class="main-content">
        <h1>Carbon Footprint Calculator</h1>
        <p>Use the tool below to calculate your household's carbon footprint.</p>
        <iframe width="710" height="1300" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" src="https://calculator.carbonfootprint.com/calculator.aspx"></iframe>
        Your browser does not support iframes.
        </iframe>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
        <p>&copy; 2025 Roslo Technologies. All rights reserved.</p>
    </footer>
</body>
</html>
