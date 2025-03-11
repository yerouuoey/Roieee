<?php
// Database configuration
$servername = "sql310.infinityfree.com";
$username = "if0_37529224"; // Change to your database username
$password = "TNtpETTqBQSJj";     // Change to your database password
$dbname = "if0_37529224_timetable"; // Change to your database name

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON data sent from the client
$data = file_get_contents('php://input');
$classes = json_decode($data, true);

if (!empty($classes)) {
    // Prepare the SQL statement with the new teacher column
    $stmt = $conn->prepare("INSERT INTO timetable (subject, day, time, teacher) VALUES (?, ?, ?, ?)");

    foreach ($classes as $class) {
        $subject = $class['subject'];
        $day = $class['day'];
        $time = $class['time'];
        $teacher = $class['teacher'];

        // Bind the parameters to the prepared statement
        $stmt->bind_param("ssss", $subject, $day, $time, $teacher);

        // Execute the statement
        if (!$stmt->execute()) {
            // Return an error message if the execution fails
            echo json_encode(['status' => 'error', 'message' => 'Error inserting data: ' . $stmt->error]);
            exit;
        }
    }

    // Close the prepared statement
    $stmt->close();

    // Return a success message
    echo json_encode(['status' => 'success', 'message' => 'Data saved successfully!']);
} else {
    // Return an error message if no data is received
    echo json_encode(['status' => 'error', 'message' => 'No data received!']);
}

// Close the database connection
$conn->close();
?>