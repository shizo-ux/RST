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
    <div class="calculator">
        <h2>Calculate Your Carbon Footprint</h2>
        
        <label>Monthly Electricity Usage (kWh):</label>
        <input type="number" id="electricity">
        
        <label>Natural Gas Usage (therms/month):</label>
        <input type="number" id="gas">
        
        <label>Vehicle Miles Driven Monthly:</label>
        <input type="number" id="miles">
        
        <label>Vehicle Type:</label>
        <select id="vehicleType">
            <option value="gasoline">Gasoline Car</option>
            <option value="hybrid">Hybrid</option>
            <option value="electric">Electric Vehicle</option>
        </select>
        
        <label>Flights (hours flown annually):</label>
        <input type="number" id="flights">
        
        <button onclick="calculateFootprint()">Calculate</button>
        <button onclick="resetForm()">Reset</button>
        
        <h3>Annual Carbon Footprint: <span id="result">0</span> lbs CO₂</h3>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
        <p>&copy; 2025 Roslo Technologies. All rights reserved.</p>
    </footer>
    <script>
        // Emission factors from EPA GHG Equivalencies Calculator
        const EMISSION_FACTORS = {
            electricity: 1.37, // lbs CO2 per kWh
            gas: 13.46,        // lbs CO2 per therm
            vehicle: {
                gasoline: 0.916, // lbs CO2 per mile
                hybrid: 0.614,
                electric: 0.297
            },
            flights: 53.3       // lbs CO2 per flight hour
        };

        function calculateFootprint() {
            const electricity = parseFloat(document.getElementById('electricity').value) || 0;
            const gas = parseFloat(document.getElementById('gas').value) || 0;
            const miles = parseFloat(document.getElementById('miles').value) || 0;
            const vehicleType = document.getElementById('vehicleType').value;
            const flights = parseFloat(document.getElementById('flights').value) || 0;

            // Calculations
            const elecFootprint = electricity * EMISSION_FACTORS.electricity * 12;
            const gasFootprint = gas * EMISSION_FACTORS.gas * 12;
            const vehicleFootprint = miles * EMISSION_FACTORS.vehicle[vehicleType] * 12;
            const flightFootprint = flights * EMISSION_FACTORS.flights;

            const total = elecFootprint + gasFootprint + vehicleFootprint + flightFootprint;
            
            document.getElementById('result').textContent = total.toFixed(2);
            document.getElementById('advice').style.display = total > 16000 ? 'block' : 'none';
        }

        function resetForm() {
            document.querySelectorAll('.calculator input').forEach(input => input.value = '');
            document.getElementById('result').textContent = '0';
            document.getElementById('advice').style.display = 'none';
        }
    </script>
</body>
</html>
