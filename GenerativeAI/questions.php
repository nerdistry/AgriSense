<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grow</title>
    <style>
        /* Apply some general styling to the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            background-image: url("css/images/overlay.png"), url("/css/images/background.jpeg");
            background-blend-mode: overlay, normal;
        }

        /* Style the container */
        div {
            max-width: 800px;
            margin: 20px auto;
            /* Add margin to the top */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the loading indicator */
        #loading {
            display: none;
            text-align: center;
            font-weight: bold;
            color: #127C56;
            margin-top: 20px;
        }

        /* Style the spinner animation */
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left: 4px solid #127C56;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        /* Style the form */
        form {
            margin-bottom: 20px;
        }

        /* Style the labels */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Style the select boxes */
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style the submit button */
        button[type="submit"] {
            background-color: #127C56;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #1EE494;
        }

        /* Style the response textarea */
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
    </style>

</head>

<body>
    <div>
        <form id="questions">
            <label for="q1">What is the average temperature range in your area during the growing season?</label> <br>
            <select id="q1" style="width: 50%;" required>
                <option value="Below 10°C (Cold)">Below 10°C (Cold)</option>
                <option value="10-20°C (Cool)">10-20°C (Cool)</option>
                <option value="20-30°C (Moderate)">20-30°C (Moderate)</option>
                <option value="30-40°C (Warm)">30-40°C (Warm)</option>
                <option value="Above 40°C (Hot)">Above 40°C (Hot)</option>
            </select> <br><br>
            <label for="q2">How much rainfall does your region receive annually?</label> <br>
            <select id="q2" style="width: 50%;" required>
                <option value="Less than 500 mm annually (Arid)">Less than 500 mm annually (Arid)</option>
                <option value="500-1000 mm annually (Semi-arid)">500-1000 mm annually (Semi-arid)</option>
                <option value="1000-1500 mm annually (Sub-humid)">1000-1500 mm annually (Sub-humid)</option>
                <option value="More than 1500 mm annually (Humid)">More than 1500 mm annually (Humid)</option>
            </select><br><br>
            <label for="q3">What crops were grown on your land in the previous season?</label> <br>
            <select id="q3" style="width: 50%;" required>
                <option value="Corn (Maize)">Corn (Maize)</option>
                <option value="rice">rice</option>
                <option value="Wheat">Wheat</option>
                <option value="Potatoes">Potatoes</option>
                <option value="Tomatoes">Tomatoes</option>
                <option value="onions">Onions</option>
                <option value="Beans">Beans</option>
            </select><br><br>
            <label for="q4">What crops are currently in high demand in your local market?</label> <br>
            <select id="q4" style="width: 50%;" required>
                <option value="Corn (Maize)">Corn (Maize)</option>
                <option value="rice">rice</option>
                <option value="Wheat">Wheat</option>
                <option value="Potatoes">Potatoes</option>
                <option value="Tomatoes">Tomatoes</option>
                <option value="onions">Onions</option>
                <option value="Beans">Beans</option>
            </select><br><br>
            <label for="q5">Does your soil retain moisture well, or does it tend to dry out quickly?</label> <br>
            <select id="q5" style="width: 50%;" required>
                <option value="Poor (Dries quickly)">Poor (Dires quickly)</option>
                <option value="fair">Fair</option>
                <option value="Good (retains moisture well)">Good (Retains Moisture Well)</option>
            </select><br><br>
            <label for="q6">What is the altitude of your farming location?</label> <br>
            <select id="q6" style="width: 50%;" required>
                <option value="Below 500 meters (Plain)">Below 500 meters (Plain)</option>
                <option value="500-1000 meters (Moderate)">500-1000 meters (Moderate)</option>
                <option value="1000-1500 meters (Highland)">1000-1500 meters (Highland)</option>
                <option value="1500-2000 meters (Mountainous)">1500-2000 meters (Mountainous)</option>
                <option value="Above 2000 meters (High Alpine)">Above 2000 meters (High Alpine)</option>
            </select> <br><br>

            <button type="submit">Submit</button>
        </form>
        <div id="loading" style="display: none;">
            <div class="spinner"></div>
            <p>Loading...</p>
        </div>
        <div>
            <h2>Response</h2>
            <textarea id="response" rows="30" style="width: 80%;" readonly></textarea>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>