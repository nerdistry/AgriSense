
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
                session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user's information from the form
    $name = $_POST["name"]; // Replace with the actual field name
    $email = $_POST["email"]; // Replace with the actual field name

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

    // Initialize an array to store responses
    $responses = array();

    // Loop through each question to get the selected answers
    foreach ($questions as $question => $answers) {
        $selected_answer = $_POST["question_" . $question]; // Replace with the actual field name

        // Store the question and selected answer in the responses array
        $responses[] = array(
            'question' => $question,
            'answer' => $selected_answer
        );
    }

      // Convert responses to JSON format
      $responses_json = json_encode($responses);
    
      // Insert user's information and responses into the database
      $sql = "INSERT INTO responses (name, email, responses_json) VALUES ('$name', '$email', '$responses_json')";
      
      if (mysqli_query($conn, $sql)) {
          // Successfully saved the responses to the database
          echo "Responses saved successfully!";
      } else {
          // Error handling
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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