<?php

require("db.php");

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store responses
    $responses = array();

    // Loop through each question to get the selected answers
    foreach ($_POST as $key => $value) {
        // Check if the field name starts with "question" (indicating a question response)
        if (strpos($key, 'question') === 0) {
            $question = substr($key, 8); // Remove "question" prefix to get the question text
            $answer = $value; // Get the selected answer

            // Store the question and answer in the responses array
            $responses[$question] = $answer;
        }
    }

    // Convert the responses array to JSON format for storage in the database
    $responses_json = json_encode($responses);

    // Insert the responses into the database
    $sql = "INSERT INTO responses (user_id, responses_json)
            VALUES ('$user_id', '$responses_json')"; // Replace 'user_id' with the actual user identifier

    if ($conn->query($sql) === TRUE) {
        // Successfully saved the responses
        echo "Responses saved successfully!";
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
