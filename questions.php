<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AgriSense</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="login.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
    <link rel="stylesheet" href="indexfooter.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>

<body>
<div class="background">
    <div class="question-slider">
        <?php
        // Initialize questions and their respective answers
        $questions = array(
            "What is the average temperature range in your area during the growing season?" => array(
                "Below 10°C (Cold)",
                "10-20°C (Cool)",
                "20-30°C (Moderate)",
                "30-40°C (Warm)",
                "Above 40°C (Hot)"
            ),
            "How much rainfall does your region receive annually?" => array(
                "Less than 500 mm annually (Arid)",
                "500-1000 mm annually (Semi-arid)",
                "1000-1500 mm annually (Sub-humid)",
                "More than 1500 mm annually (Humid)"
            ),
            "What crops were grown on your land in the previous season?" => array(
                "Corn (Maize)",
                "Wheat",
                "Tea",
                "Rice",
                "Cotton",
                "Kales",
                "Coffee"
            ),
            "What crops are currently in high demand in your local market?" => array(
                "Maize (Corn)",
                "Rice",
                "Wheat",
                "Potatoes",
                "Tomatoes",
                "Onions",
                "Avocadoes",
                "Beans",
                "Fruit"
            ),
            "Does your soil retain moisture well, or does it tend to dry out quickly?" => array(
                "Poor (Dries quickly)",
                "Fair",
                "Good (Retains moisture well)"
            ),
            "What is the altitude of your farming location?" => array(
                "Below 500 meters (Plain)",
                "500-1000 meters (Moderate)",
                "1000-1500 meters (Highland)",
                "1500-2000 meters (Mountainous)",
                "Above 2000 meters (High Alpine)"
            )
        );

        // Process form submission
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // You can handle the submitted answers here
            // Access the selected answers using $_POST
            // For example: $answer1 = $_POST["question1"];
        }

        // Display questions and their respective answers
        $questionNumber = 1;
        foreach ($questions as $question => $answers) {
            echo "<div class='question" . ($questionNumber === 1 ? " active" : "") . "'>";
            echo "<h3>Question " . $questionNumber . ": " . $question . "</h3>";

            // Display dropdown menu for answers
            echo "<select name='question" . $questionNumber . "'>";
            echo "<option value=''>Select an answer</option>";
            foreach ($answers as $answer) {
                echo "<option value='" . htmlentities($answer) . "'>" . $answer . "</option>";
            }
            echo "</select>";

            // Display buttons container for Back and Next buttons
            echo "<div class='button-container'>";
            
            // Display back button for all questions except the first one
            if ($questionNumber > 1) {
                echo "<button class='back'>Back</button>";
            }

            // Display next button for all questions except the last one
            if ($questionNumber < count($questions)) {
                echo "<button class='next'>Next</button>";
            }
            
            echo "</div>"; // Close buttons container

            echo "</div>";
            $questionNumber++;
        }
        ?>
    </div>
</div>

<script>
    // JavaScript for slider functionality
    const questions = document.querySelectorAll('.question');
    const nextButtons = document.querySelectorAll('.next');
    const backButtons = document.querySelectorAll('.back');

    let currentQuestion = 0;

    // Function to show a specific question
    function showQuestion(questionIndex) {
        questions.forEach((question, index) => {
            if (index === questionIndex) {
                question.classList.add('active');
            } else {
                question.classList.remove('active');
            }
        });
    }

    // Show the first question initially
    showQuestion(currentQuestion);

    // Event listener for the next button
    nextButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                showQuestion(currentQuestion);
            }
        });
    });

    // Event listener for the back button
    backButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                showQuestion(currentQuestion);
            }
        });
    });
</script>

<form method="POST">
    <!-- Add any additional fields or form elements here if needed -->
</form>
</body>

</html>