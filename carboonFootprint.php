<?php
// carboonFootprint.php
session_start();
// Simulate user login status for now (in a real app, this would check a database/session)
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Calculator - Roslo Technologies</title>
    <link rel="stylesheet" href="mystyle.css">
    <style>
        form input[type="number"], form input[type="text"] {
            width: 60%;
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 8px 16px;
            cursor: pointer;
        }

        footer {
            background-color: purple;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        .contact p.address {
            text-align: right;
        }

        .calculator-section {
            padding: 20px;
            max-width: 700px;
            margin: 0 auto;
        }

        .result-box {
            margin-top: 20px;
        }

        .appointment, .advice, .booking-form {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .appointment {
            background-color: #f8d7da;
        }

        .advice {
            background-color: #d4edda;
        }

        .booking-form {
            background-color: #fff3cd;
        }
    </style>
</head>
<body>
<header>
    <div>
        <img id="logo" src="" alt="logo">
        <h1>Roslo Technologies</h1>
        <button id="login">Log in</button>
        <button id="register">Register</button>
    </div>
    <div>
        <nav>
            <ul>
                <li class="home-page">Home Page</li>
                <li class="carbon-footprint-calculator">Carbon Footprint Calculator</li>
                <li class="reviews">Reviews</li>
                <li class="menu">Menu</li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="calculator-section">
        <h2>Carbon Footprint Calculator</h2>
        <form id="carbonForm">
            <label for="electricity">Electricity Usage (kWh/month):</label><br>
            <input type="number" id="electricity" name="electricity" min="0"><br>

            <label for="miles">Miles Driven per Month:</label><br>
            <input type="number" id="miles" name="miles" min="0"><br>

            <label for="flights">Flights per Year:</label><br>
            <input type="number" id="flights" name="flights" min="0"><br><br>

            <button type="button" onclick="calculateCarbonFootprint()">Calculate</button>
        </form>

        <div id="carbonResult" class="result-box"></div>
    </section>

    <section class="contact">
        <h3>Contact us</h3>
        <p class="email">Email: Lorem ipsum dolor</p>
        <p class="phone-number">Phone Number: 092218937</p>
        <p class="address">Address: Lorem ipsum dolor sit amet</p>
        <p class="postcode">Postcode: St6213</p>
    </section>
</main>

<footer>
    <p>&copy; 2025 Roslo Technologies. All rights reserved.</p>
</footer>

<script>
    const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

    function calculateCarbonFootprint() {
        const electricity = parseFloat(document.getElementById('electricity').value);
        const miles = parseFloat(document.getElementById('miles').value);
        const flights = parseFloat(document.getElementById('flights').value);

        if (isNaN(electricity) || isNaN(miles) || isNaN(flights) || electricity < 0 || miles < 0 || flights < 0) {
            document.getElementById('carbonResult').innerHTML = '<p>Please enter valid, non-negative values.</p>';
            return;
        }

        const carbon = (electricity * 0.0004 * 12) + (miles * 0.000404 * 12) + (flights * 0.25);
        let resultHTML = `<p>Your estimated annual carbon footprint is <strong>${carbon.toFixed(2)}</strong> tons of CO2.</p>`;

        if (carbon > 10) {
            resultHTML += `
                <div class="appointment">
                    <p>Your carbon footprint is higher than average. Would you like to speak with one of our sustainability consultants?</p>
                    <button onclick="showBookingForm()">Book an Appointment</button>
                </div>
                <div id="bookingArea"></div>
            `;
        } else {
            resultHTML += `
                <div class="advice">
                    <p>Great job! Your footprint is within a reasonable range. To go even greener, consider using energy-efficient appliances and reducing unnecessary travel.</p>
                </div>
            `;
        }

        document.getElementById('carbonResult').innerHTML = resultHTML;
    }

    function showBookingForm() {
        if (!isLoggedIn) {
            alert('You need to be logged in to book an appointment.');
            return;
        }

        const formHTML = `
            <div class="booking-form">
                <h3>Book Your Appointment</h3>
                <label for="fullName">Full Name:</label><br>
                <input type="text" id="fullName" name="fullName"><br>

                <label for="date">Preferred Date:</label><br>
                <input type="text" id="date" name="date" placeholder="e.g. April 4, 2025"><br>

                <label for="contact">Contact Info:</label><br>
                <input type="text" id="contact" name="contact" placeholder="Email or Phone"><br><br>

                <button onclick="submitBooking()">Submit</button>
            </div>
        `;

        document.getElementById('bookingArea').innerHTML = formHTML;
    }

    function submitBooking() {
        alert('Thank you! Your appointment has been submitted. We’ll be in touch soon.');
    }
</script>
</body>
</html>
